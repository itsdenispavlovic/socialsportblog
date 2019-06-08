<?php
include 'conn.php';
$uid = $_SESSION['user'];
if($user->ifisadmin($uid))
{
	$user->redirect('/socialsportblog/adminpanel/index.php');
}
if(!$user->is_loggedin()!="")
{
	$user->redirect('index.php');
}
if(isset($_POST['postcomment']))
{
  $postid = @$_POST['userpostid'];
  $user->postComment($_SESSION['user'], @$postid, $_POST['commentcontent']);
}
$like = @$_POST['likepostid'];
if(isset($_POST['likesubmit' . $like]))
{
  $like = @$_POST['likepostid'];
    //check if the user has not already likes that post
    try
    {
      $statementS = $conn->prepare('SELECT * FROM likes WHERE postid=:postid AND userid=:userid');
      $statementS->bindParam(':postid', $like, PDO::PARAM_STR);
      $statementS->bindParam(':userid', $_SESSION['user'], PDO::PARAM_STR);
      $statementS->execute();
      $row=$statementS->fetch(PDO::FETCH_ASSOC);
      //If yes
      if($statementS->rowCount() > 0)
      {
        $deleteS = $conn->prepare('DELETE FROM likes WHERE postid = :postid AND userid = :userid');
        $deleteS->bindParam(':userid', $_SESSION['user'], PDO::PARAM_STR);
        $deleteS->bindParam(':postid', $like, PDO::PARAM_STR);
        $deleteS->execute();
      }
      //if no
      else
      {
        $insertS = $conn->prepare('INSERT INTO likes(userid, postid) VALUES(:userid, :postid)');
        $insertS->bindParam(':userid', $_SESSION['user'], PDO::PARAM_STR);
        $insertS->bindParam(':postid', $like, PDO::PARAM_STR);
        $insertS->execute();
      }
    } catch(PDOException $e)
    {
      echo $e->getMessage();
    }
}
if(isset($_POST['editpost']))
{
  //id lu post
  $postidedit = @$_POST['postidedit'];
  //continut
  $continut = @$_POST['postcontinut'];
  try
  {
    $statement = $conn->prepare('UPDATE posts SET content = :content WHERE uid=:uid AND id = :postid');
    $statement->bindParam(':content', $continut, PDO::PARAM_STR);
    $statement->bindParam(':uid', $_SESSION['user'], PDO::PARAM_STR);
    $statement->bindParam(':postid', $postidedit, PDO::PARAM_STR);
    $statement->execute();
    if($statement)
    {
      $st = $conn->prepare('INSERT INTO history_edited_post (uid, postid) VALUES(:uid, :postid)');
      $st->bindParam(':uid', $_SESSION['user'], PDO::PARAM_STR);
      $st->bindParam(':postid', $postidedit, PDO::PARAM_STR);
      $st->execute();
    }
  } catch(PDOException $e)
  {
    echo $e->getMessage();
  }
}

include 'headeruser.inc.php';
?>
 <!-- Page Content -->
    <div class="container-fluid" style="padding-left: 50px; padding-right: 50px;">

      <div class="row">

      	<div class="col">
      		<!-- Search Widget -->
          <div class="card my-4">
            <ul class="list-group">
            	<li class="list-group-item"><?php echo $user->getFirstname($_SESSION['user']); ?></li>
            	<li class="list-group-item"><a href="profile.php">Profile</a></li>
            	<li class="list-group-item"><a href="#">Settings</a></li>
            	<li class="list-group-item"><center><a class="btn btn-danger" href="logout.php">Logout</a></center></li>
            </ul>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Links</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>
      	</div>

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <h1 class="mt-4">Newsfeed</h1>

          <p class="lead">
            Welcome back <?php echo $user->getFirstname($_SESSION['user']); ?>
          </p>

          <hr>
          <?php 
          if(isset($_POST['postcontent']))
          {
            $contentPost = @$_POST['contentPost'];
            $user->postContent($_SESSION['user'], $contentPost);
          }
          ?>
           <!-- Comments Form -->
           <form action="" method="POST">
          <div class="card my-4">
            <h5 class="card-header">What are you thinking about?</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" name="contentPost" rows="3" placeholder="Write something.."></textarea>
                </div>
                <button style="float: right;" type="submit" name="postcontent" class="btn btn-primary">Post</button>
              </form>
            </div>
          </div>
        </form>
        <?php 
          $statement = $conn->prepare('SELECT * FROM posts WHERE uid=:uid ORDER BY id DESC');
          $statement->bindParam(':uid', $_SESSION['user'], PDO::PARAM_STR);
          $statement->execute();
          $UserPost = $statement->fetchAll();
          foreach($UserPost as $UserPosts)
          {
            //postid
            $postid = $UserPosts['id'];
            
        ?>
        <div class="Newsfeed">
          <hr>
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $user->fullname($UserPosts['uid']); ?></h5>
              <hr>
              <p style="text-align: right;">Posted on <?php echo $UserPosts['date']; ?></p>
              <?php if($UserPosts['uid'] == $_SESSION['user'])
              {
              ?>
                <form method="POST" action="">
                  <input type="text" name="editpostid" readonly hidden="">
                  <button type="button" onclick="toggle_edit('contentp<?php echo $UserPosts['id'];?>'); show_edit('editpostc<?php echo $UserPosts['id'];?>');" name="editpost<?php echo $UserPosts['id'];?>" style="float: left;" class="btn btn-info">Edit</button><button type="button" onclick="remove('');" style="position: relative; float: right;" class="btn btn-danger">X</button>
                </form>
              <?php 
              }
              ?>
            </div> <!-- Media body-->
            </div> <!--Media mb-4-->
          <!-- Date/Time -->
          

          <!--
          <center>
            <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
          </center>
          <hr>
        -->
          <style type="text/css">
            .posts::-webkit-scrollbar {
              display: none;
            }
          </style>
          <div class="postContent" style="padding: 20px; width: 80%; margin: 0 auto; left: 0; right: 0; margin-bottom: 20px;">
            <form action="" method="POST">
            <input type="text" name="postidedit" hidden readonly value="<?php echo $UserPosts['id'];?>">
            <textarea spellcheck="false" name="postcontinut" id="contentp<?php echo $UserPosts['id'];?>" class="posts" style="width: 100%; resize: none;" cols="40" rows="10" readonly><?php echo $UserPosts['content'];?></textarea>
            <input type="submit" class="btn btn-secondary" value="Edit Post" name="editpost" id="editpostc<?php echo $UserPosts['id'];?>" style="display: none;">
            </form>
          </div><form id="likeform<?php echo $UserPosts['id'];?>" method="POST" action="">
          <input type="text" name="likepostid" value="<?php echo $UserPosts['id'];?>" readonly hidden>
          <input type="submit" class="btn btn-success" name="likesubmit<?php echo $UserPosts['id'];?>" value="LIKE"/> | <a href="#!" onclick="toggle_visibility('commentsection<?php echo $UserPosts['id'];?>');" class="btn btn-info">Comment (<span id="commentcount<?php echo $UserPosts['id']; ?>"></span>)</a><br><span id="likecount<?php echo $UserPosts['id'];?>"></span></form>
          <div id="commentsection<?php echo $UserPosts['id']; ?>" style="display: none;">
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form method="POST" action="">
                <div class="form-group">
                  <input type="text" name="userpostid" value="<?php echo $UserPosts['id'];?>" readonly hidden>
                  <textarea placeholder="Write something..." name="commentcontent" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="postcomment" class="btn btn-primary">Post</button>
              </form>
            </div>
          </div>
          <script type="text/javascript">
            $(document).ready(function() {
              $('#anchorlike<?php echo $UserPosts['id'];?>').click(function(){
                $('#likeform<?php echo $UserPosts['id'];?>').submit()
              });
            });
          </script>

          <!-- Single Comment -->
          
            
            <?php

              $statementCom = $conn->prepare('SELECT * FROM comments WHERE userid=:uid AND postid=:postid ORDER BY id DESC');
              $statementCom->bindParam(':uid', $_SESSION['user'], PDO::PARAM_STR);
              $statementCom->bindParam(':postid', $UserPosts['id'], PDO::PARAM_STR);
              $statementCom->execute();
              if(!($statementCom->rowCount() > 0))
              {
                echo "No comments!";
              }
              else
              {
              $UserPostCom = $statementCom->fetchAll();
              foreach($UserPostCom as $UserPostsCom)
              {
            ?>
            <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $user->fullname($UserPostsCom['userid']); ?></h5>
              <?php echo $UserPostsCom['content'];?>
            </div> <!-- Media body-->
            </div> <!--Media mb-4-->
            <hr>
            <?php 
          } //Foreach comment
          
        }
            ?>
          
        </div>
        </div><!--Newsfeed-->
        <!-- AJAX -->
        <script type="text/javascript">
        $(document).ready(function() {
          setInterval(function() {
            $('#likecount<?php echo $UserPosts['id']; ?>').load('getlike.php?cc=<?php echo $UserPosts['id'];?>')
          }, 100);
         });
       </script>
       <script type="text/javascript">
        $(document).ready(function() {
          setInterval(function() {
            $('#commentcount<?php echo $UserPosts['id']; ?>').load('getcomments.php?cc=<?php echo $UserPosts['id'];?>')
          }, 100);
         });
        </script>
        <script type="text/javascript">
          function toggle_edit(id)
          {
            var n = document.getElementById(id);
            if(n.readOnly == false)
            {
              n.readOnly = true;
            }
            else
            {
              n.readOnly = false;
            }
          }
          function show_edit(id)
          {
            var e = document.getElementById(id);
            if(e.style.display == 'none')
            {
              e.style.display = 'block';
            }
            else
            {
              e.style.display ='none';
            }
          }
          function toggle_visibility(id) {
            var e = document.getElementById(id);
            if(e.style.display == 'none')
            {
              e.style.display = 'block';
            }
            else
            {
              e.style.display ='none';
            }
          }
        </script>
        <?php 
          } //Foreach
          
         
        ?>
          <hr>
          

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php include 'footeruser.inc.php'; ?>