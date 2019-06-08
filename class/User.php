<?php 
class User
{
	function __construct($conn)
	{
		$this->db = $conn;
	}

	//Registration
	public function registration($FIRSTNAME, $LASTNAME, $EMAIL, $USERNAME, $PASSWORD, $PASSWORD2, $BIRTHDAY, $IP)
	{
		//See if Username is not already taken
		$statement = $this->db->prepare('SELECT USERNAME FROM users WHERE USERNAME = :username');
		$statement->bindParam(':username', $USERNAME, PDO::PARAM_STR);
		$statement->execute();
		//See if email is not already taken
		$statement2 = $this->db->prepare('SELECT EMAIL FROM users WHERE EMAIL =:EMAIL');
		$statement2->bindParam(':EMAIL', $EMAIL, PDO::PARAM_STR);
		if($PASSWORD != $PASSWORD2)
		{
			return false;
		}
		//For username
		if($statement->rowCount() > 0)
		{
			echo 'Username is already taken!';
			return false;
		}
		//For email
		if($statement2->rowCount() > 0)
		{
			echo 'Email is already taken!';
			return false;
		}
		else
		{
			$stmt = $this->db->prepare('INSERT INTO users (FIRSTNAME, LASTNAME, EMAIL, USERNAME, PASSWORD, BIRTHDAY, IP) VALUES (:FIRSTNAME, :LASTNAME, :EMAIL, :USERNAME, :PASSWORD, :BIRTHDAY, :IP)');
			$stmt->bindParam(':FIRSTNAME', $FIRSTNAME, PDO::PARAM_STR);
			$stmt->bindParam(':LASTNAME', $LASTNAME, PDO::PARAM_STR);
			$stmt->bindParam(':EMAIL', $EMAIL, PDO::PARAM_STR);
			$stmt->bindParam(':USERNAME', $USERNAME, PDO::PARAM_STR);
			$hashPassword = password_hash($PASSWORD, PASSWORD_DEFAULT);
			$stmt->bindParam(':PASSWORD', $hashPassword, PDO::PARAM_STR);
			$stmt->bindParam(':BIRTHDAY', $BIRTHDAY, PDO::PARAM_STR);
			$stmt->bindParam(':IP', $IP, PDO::PARAM_STR);
			$stmt->execute();
			echo '<script>alert("Success!");</script>';
		}
	}

	//Login
	public function login($username, $password)
	{
		try
		{
			$statement = $this->db->prepare("SELECT * FROM users WHERE USERNAME=:username OR EMAIL=:username");
			$statement->bindParam(":username", $username, PDO::PARAM_STR);
			$statement->execute();
			$row=$statement->fetch(PDO::FETCH_ASSOC);
			if($statement->rowCount() > 0)
			{
				if(password_verify($password, $row['PASSWORD']))
				{
					$_SESSION['user'] = $row['ID'];
					//if it's returned true, update row
					$statement2 = $this->db->prepare('UPDATE users SET LOGGEDIN = 1 WHERE USERNAME = :username or EMAIL = :username');
					$statement2->bindParam(':username', $username, PDO::PARAM_STR);
					$statement2->execute();
					return true;
				}
				else 
				{
					echo "<script>alert('Incorrect password!');</script>";
					return false;
				}

			}


		}catch(PDOException $e)
		{
     	 echo $e->getMessage();
    	}
    }

	//If the user is logged in
	public function is_loggedin()
	{
		if(isset($_SESSION['user']))
		    {
		    	return true;
		}
	}

	//If is admin
	public function ifisadmin($uid)
	{
		$statement = $this->db->prepare('SELECT * FROM users WHERE ID=:uid');
		$statement->bindParam(':uid', $uid, PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		if($row['ADMIN'] == 1)
		{
			return true;
		}
	}

	//Block an user via admin panel
	public function blockUser($id, $url)
	{
		$statement = $this->db->prepare('UPDATE users SET BLOCKED = 1 WHERE ID = :id');
		$statement->bindParam(':id', $id, PDO::PARAM_STR);
		$statement->execute();
		echo '<script> location.replace("'.$url.'"); </script>';
		exit();
	}

	//Unblock user via Admin Panel
	public function unblockUser($id, $url)
	{
		$statement = $this->db->prepare('UPDATE users SET BLOCKED = 0 WHERE ID = :id');
		$statement->bindParam(':id', $id, PDO::PARAM_STR);
		$statement->execute();
		echo '<script> location.replace("'.$url.'"); </script>';
		exit();
	}

	//Activate a user via Admin Panel
	public function activateUser($id, $url)
	{
		$statement = $this->db->prepare('UPDATE users SET ACTIVATED = 1 WHERE ID = :id');
		$statement->bindParam(':id', $id, PDO::PARAM_STR);
		$statement->execute();
		echo '<script> location.replace("'.$url.'"); </script>';
		exit();
	}

	//Echo Status from a User in Admin Panel
	public function statusUser($id)
	{
		$statement = $this->db->prepare('SELECT * FROM users WHERE ID = :id');
		$statement->bindParam(':id', $id, PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		if($row['ACTIVATED'] == 1)
		{
			return 'ACTIVATED';
		}
		else
		{
			return 'DISABLED';
		}
	}

	//Pending User Counting
	public function pendingUserCounting()
	{
		$statement = $this->db->prepare('SELECT COUNT(*) FROM users WHERE ACTIVATED=0 AND ADMIN = 0');
		$statement->execute();
		$count = $statement->fetchColumn();
		return $count;
	}

	//Blocked User Counting
	public function blockedUserCounting()
	{
		$statement = $this->db->prepare('SELECT COUNT(*) FROM users WHERE BLOCKED=1 AND ADMIN = 0');
		$statement->execute();
		$count = $statement->fetchColumn();
		return $count;
	}

	//Activated User Counting
	public function activatedUserCounting()
	{
		$statement = $this->db->prepare('SELECT COUNT(*) FROM users WHERE ACTIVATED=1 AND ADMIN=0');
		$statement->execute();
		$count = $statement->fetchColumn();
		return $count;
	}

	//User Counting
	public function userCounting()
	{
		$statement = $this->db->prepare('SELECT COUNT(*) FROM users WHERE ADMIN=0');
		$statement->execute();
		$numara = $statement->fetchColumn();
		return $numara;
	}

	//Tichete nerezolvate counter
	public function tichetCounting()
	{
		$statement = $this->db->prepare('SELECT COUNT(*) FROM tickets WHERE RESOLVED = 0');
		$statement->execute();
		$numara = $statement->fetchColumn();
		return $numara;
	}

	//Total Comments
	public function commentsCounting()
	{
		$statement = $this->db->prepare('SELECT COUNT(*) FROM comments WHERE REMOVED = 0');
		$statement->execute();
		$numara = $statement->fetchColumn();
		return $numara;
	}

	//Count unread messaging
	public function unreadmsCounting()
	{
		$statement = $this->db->prepare('SELECT COUNT(*) FROM messages WHERE ms_read = 0');
		$statement->execute();
		$numara = $statement->fetchColumn();
		if($numara == 0)
		{
			//Do nothing
			return '';
		}
		else
		{
			return $numara;
		}
	}

	public function unreadmsCountinge()
	{
		$statement = $this->db->prepare('SELECT COUNT(*) FROM messages WHERE ms_read = 0');
		$statement->execute();
		$numara = $statement->fetchColumn();
		return $numara;
	}

	public function unreadNotification()
	{
		$statement = $this->db->prepare('SELECT COUNT(*) FROM notification WHERE open = 0');
		$statement->execute();
		$numara = $statement->fetchColumn();
		if($numara == 0)
		{
			return '';
		}
		else
		{
			return $numara;
		}
	}

	public function unreadNotification2()
	{
		$statement = $this->db->prepare('SELECT COUNT(*) FROM notification WHERE open = 0');
		$statement->execute();
		$numara = $statement->fetchColumn();
		return $numara;
	}

	//Get Firstname and lastname from me Denis Pavlovic(By Username)
	public function adminFL()
	{
		$statement = $this->db->prepare('SELECT * FROM users WHERE USERNAME = "denistheboss"');
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$Firstname = $row['FIRSTNAME'];
		$LASTNAME = $row['LASTNAME'];
		return $Firstname . " " . $LASTNAME;
	}

	//Get users Firstname
	public function getFirstname($uid)
	{
		$statement = $this->db->prepare('SELECT * FROM users WHERE ID=:ID');
		$statement->bindParam(':ID', $uid, PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$Firstname = $row['FIRSTNAME'];
		$lastname = $row['LASTNAME'];
		return $Firstname . ' ' . $lastname;
	}

	//Redirect
	public function redirect($url)
	{
		header('Location: ' . $url);
	}

	//Logout
	public function logout($uid)
	{
		try
		{
			$statement = $this->db->prepare('UPDATE users SET LOGGEDIN = 0 WHERE ID = :ID');
			$statement->bindParam(':ID', $uid, PDO::PARAM_STR);
			$statement->execute();
		} catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		session_destroy();
		unset($_SESSION['user']);
		return true;
	}

	//If is online or offline
	

	//Echo if a user is logged in or not
	public function loggedinY($ID)
	{
		try
		{
			$statement = $this->db->prepare('SELECT * FROM users WHERE ID=:ID');
			$statement->bindParam(':ID', $ID, PDO::PARAM_STR);
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			if($row['LOGGEDIN'] == 0)
			{
				return 'NO';
			}
			else
			{
				return 'YES';
			}
		} catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	//Postcomment
	public function postComment($uid, $postid, $content)
	{
		try
		{
			$statement = $this->db->prepare('INSERT INTO comments(userid, postid, content) VALUES(:userid, :postid, :content)');
			$statement->bindParam(':userid', $uid, PDO::PARAM_STR);
			$statement->bindParam(':postid', $postid, PDO::PARAM_STR);
			$statement->bindParam(':content', $content, PDO::PARAM_STR);
			$statement->execute();
		} catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	//Get profile information
	//Full name
	public function fullname($uid)
	{
		try
		{
			$statement = $this->db->prepare('SELECT * FROM users WHERE ID=:ID');
			$statement->bindParam(':ID', $uid, PDO::PARAM_STR);
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			if($statement->rowCount() > 0)
			{
				$firstname = $row['FIRSTNAME'];
				$lastname = $row['LASTNAME'];
				return $firstname . ' ' . $lastname;
			}
		} catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function getBirthday($uid)
	{
		try
		{
			$statement = $this->db->prepare('SELECT * FROM users WHERE ID=:ID');
			$statement->bindParam(':ID', $uid, PDO::PARAM_STR);
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			if($statement->rowCount() > 0)
			{
				$BIRTHDAY = $row['BIRTHDAY'];

				return $BIRTHDAY;
			}
		} catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	//Post Content
	public function postContent($uid, $content)
	{
		try
		{
			$statement = $this->db->prepare('INSERT INTO posts (uid, content) VALUES(:uid, :content)');
			$statement->bindParam(':uid', $uid, PDO::PARAM_STR);
			$statement->bindParam(':content', $content, PDO::PARAM_STR);
			$statement->execute();
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}