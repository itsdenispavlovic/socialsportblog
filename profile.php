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
include 'headeruser.inc.php';
?>
<style type="text/css">
  .img-rounded
  {
    border-radius: 50%;
  }
  #profilep ul {
    padding:0;
    list-style-type: none;
  }
  #profilep img {
      width:260px;
      height:260px;
      border:1px solid black;
      border-radius:7px;
      background:black;
  }
  #profilep li a {
      display:inline-block;
      color:white;
      position:absolute;
      left: 0;
      right: 0;
      margin: 0 auto;
      margin-left: 20%;
      margin-right: 20%;
      bottom: 18px;
      padding:10px 68px;
      background-color:gray;
      visibility: hidden;
  }
  #profilep img:hover
  {
    opacity: 0.8;
  }
  #profilep li:hover a {
      visibility: visible;
  }

    .listNav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    width: 40%;
    right: 0;
      left: 0;
      margin: 0 auto;
    }

    .listNav li {
        float: left;
      text-align: center;

    }

    .listNav li a {
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .listNav li a:hover {
      background-color: gray;
      color: white;
    }

    .actives
    {
      background-color: gray;
      color: white;
    }
    .listNav
    {
      border: 1px solid black;
      position: relative;
    }
    .bn .col
    {
      position: relative;
    }
    .bn h3
    {
      position: absolute;
      bottom: 18px;
      left: 0;
    }
    .titlebild
    {
      margin-bottom: -15%;
      position: relative;
      width: auto;
    }
    .titlebild img
    {
      height: 500px;
    }
    .titlebild img:hover
    {
     opacity: 0.6;
    }
    .titlebild li a {
      display:inline-block;
      color:white;
      position:absolute;
      text-align: center;
      right: 50px;
      width: 10%;
      margin-left: 20%;
      margin-right: 20%;
      padding:10px;
      background-color:gray;
      visibility: hidden;
  }
  .titlebild ul {
    padding:0;
    list-style-type: none;
  }
  .titlebild li:hover a {
      visibility: visible;
  }
</style>
<!-- Page Content -->
    <div class="container-fluid" style="padding-left: 50px; padding-right: 50px;">

      <div class="row">

      	<div class="col">
      		{{NAVIGATION}}
      	</div>

        <!-- Post Content Column -->
        <div class="col-lg-8">
        	<div class="container titlebild">
            <ul>
              <li>
        		<img src="img/defaulttitlebild.jpg" width="100%;"></li>
        	</div>
        	<div class="container">
          <div class="row">
            <div class="col">
              <center>
                <?php
                try
                {
                  $st = $conn->prepare('SELECT * FROM users WHERE id = :uid');
                  $st->bindParam(':uid', $_SESSION['user'], PDO::PARAM_STR);
                  $st->execute();
                  $row = $st->fetch(PDO::FETCH_ASSOC);
                  $gimage = $row['profilepic'];
                } catch(PDOException $e)
                {
                  echo $e->getMessage();
                } 
?>
                <div id="profilep">
                <ul>
              <li><img src="<?php echo $gimage;?>" width="200px;" alt="<?php echo $user->fullname($_SESSION['user']); ?>" class="img-responsive img-rounded"><a href="#">Edit</a></li></ul></div></center>
            </div>
            <div class="col">
              <div class="bn">
                <h3><?php echo $user->fullname($_SESSION['user']); ?></h3>
              </div>
              
            </div>
            <div class="col">
            </div>
          </div>
          </div>
          <div class="listNav">
            <ul>
              <li><a href="#">Posts</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Photos</a></li>
              <li><a href="#">Health</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </div>

           <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">What are you thinking about?</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Write something.."></textarea>
                </div>
                <button style="float: right;" type="submit" class="btn btn-primary">Post</button>
              </form>
            </div>
          </div>

          <hr>

          <!-- Date/Time -->
          <p style="text-align: right;">Posted on {{DATETIME}}</p>

          <hr>
          <center>
            <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
          </center>
          <hr>

          <p>{{CONTENT}}</p>

          <hr>
          <a href="index.php?like=20">Like (X)</a> | <a href="#!">Comment</a>
          <hr>

          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

          <!-- Comment with nested comments -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

            </div>
          </div>

        </div>

        <!-- Sidebar Widgets Column -->
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

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php include 'footeruser.inc.php'; ?>