<?php 
include '../conn.php'; 
if(!$user->is_loggedin()!="")
{
  $user->redirect('/socialsportblog/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Social Sport Blog</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">DP <span class="lite">Admin Panel</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
          <li id="mail_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important"><?php echo $user->unreadmsCounting(); ?></span>
                        </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have <?php echo $user->unreadmsCountinge(); ?> new messages</p>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Greg  Martin</span>
                                    <span class="time">1 min</span>
                                    </span>
                                    <span class="message">
                                        I really like this admin panel.
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Bob   Mckenzie</span>
                                    <span class="time">5 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, What is next project plan?
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Phillip   Park</span>
                                    <span class="time">2 hrs</span>
                                    </span>
                                    <span class="message">
                                        I am like to buy this Admin Template.
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="./img/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Ray   Munoz</span>
                                    <span class="time">1 day</span>
                                    </span>
                                    <span class="message">
                                        Icon fonts are great.
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox notificatoin end -->
          <!-- alert notification start-->
          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important"><?php echo $user->unreadNotification(); ?></span>
                        </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have <?php echo $user->unreadNotification2(); ?> new notifications</p>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span>
                                    Friend Request
                                    <span class="small italic pull-right">5 mins</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>
                                    John location.
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-danger"><i class="icon_book_alt"></i></span>
                                    Project 3 Completed.
                                    <span class="small italic pull-right">1 hr</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-success"><i class="icon_like"></i></span>
                                    Mick appreciated your work.
                                    <span class="small italic pull-right"> Today</span>
                                </a>
              </li>
              <li>
                <a href="#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"><?php echo $user->adminFL(); ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              <li>
                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
              </li>
              <li>
                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
              </li>
              <li>
                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              <li>
                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
              </li>
              <li>
                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.html">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forms</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="form_component.html">Form Elements</a></li>
              <li><a class="" href="form_validation.html">Form Validation</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>UI Fitures</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="general.html">Elements</a></li>
              <li><a class="" href="buttons.html">Buttons</a></li>
              <li><a class="" href="grids.html">Grids</a></li>
            </ul>
          </li>
          <li>
            <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>Widgets</span>
                      </a>
          </li>
          <li>
            <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Charts</span>

                      </a>

          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Tables</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="basic_table.html">Basic Table</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="profile.html">Profile</a></li>
              <li><a class="" href="login.html"><span>Login Page</span></a></li>
              <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
              <li><a class="" href="blank.html">Blank Page</a></li>
              <li><a class="" href="404.html">404 Error</a></li>
            </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <a href="totalusers.php">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-child"></i>
              <div class="count"><?php echo $user->userCounting(); ?></div>
              <div class="title">Total Users</div>
            </div>
            <!--/.info-box-->
          </div>
        </a>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-rss"></i>
              <div class="count">Y</div>
              <div class="title">Online Right Now</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-comment"></i>
              <div class="count"><?php echo $user->commentsCounting(); ?></div>
              <div class="title">Total Comments</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-inbox"></i>
              <div class="count"><?php echo $user->tichetCounting(); ?></div>
              <div class="title">Unresolved Tickets</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->


        


        <!-- Today status end -->



        <div class="row">

          <div class="container">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Pending Users (<?php echo $user->pendingUserCounting(); ?>)</strong></h2>
              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th><center>ID#</center></th>
                      <th><center>FULLNAME</center></th>
                      <th><center>IP</center></th>
                      <th><center>ONLINE</center></th>
                      <th><center>ACTION</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = 'SELECT * FROM users WHERE ADMIN=0 AND ACTIVATED = 0';
                    $users = $conn->query($sql);
                    foreach($users as $row)
                    {


                    ?>
                    <tr>
                      <td><center><?php echo $row['ID']; ?></center></td>
                      <td><center><?php echo $row['FIRSTNAME'] . ' ' . $row['LASTNAME']; ?></center></td>
                      <td><center><?php echo $row['IP']; ?></center></td>
                      <td><center><?php if($row['ISONLINE'] == 0) { echo 'NO'; } else { echo 'YES'; }?></center></td>
                      <td>
                        <center>
                          <form action="" method="POST">
                        <?php if($row['BLOCKED'] == 0) { ?><button type="submit" name="BLOCK<?php echo $row['ID']; ?>" id='block<?php echo $row['ID']; ?>' class="btn btn-danger">BLOCK</button><?php } else { ?><button type="submit" name="UNBLOCK<?php echo $row['ID']; ?>" id='unblock<?php echo $row['ID']; ?>' class="btn btn-danger">UNBLOCK</button><?php } ?> | <button type="button" id='showinfo<?php echo $row['ID']; ?>' class="btn btn-info">SHOW INFO</button> | <button type="submit" name="ACTIVATE<?php echo $row['ID']; ?>" class="btn btn-success">ACTIVATE</button></form>
                      </center>
                      </td>
                    </tr>
                    <?php 
                    $page = 'index.php';
                    if(isset($_POST['BLOCK'.$row['ID']]))
                    {
                      $user->blockUser($row['ID'], $page);
                    }
                    if(isset($_POST['UNBLOCK'.$row['ID']]))
                    {
                      $user->unblockUser($row['ID'], $page);
                    }
                    if(isset($_POST['ACTIVATE'.$row['ID']]))
                    {
                      $user->activateUser($row['ID'], $page);
                    }
                  } //Foreach
                    ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>
          <div class="container">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Activated Users (<?php echo $user->activatedUserCounting(); ?>)</strong></h2>
              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th><center>ID#</center></th>
                      <th><center>FULLNAME</center></th>
                      <th><center>IP</center></th>
                      <th><center>ONLINE</center></th>
                      <th><center>ACTION</center></th>
                      <th><center>STATUS</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = 'SELECT * FROM users WHERE ADMIN=0 AND ACTIVATED = 1';
                    $users = $conn->query($sql);
                    foreach($users as $row)
                    {


                    ?>
                    <tr>
                      <td><center><?php echo $row['ID']; ?></center></td>
                      <td><center><?php echo $row['FIRSTNAME'] . ' ' . $row['LASTNAME']; ?></center></td>
                      <td><center><?php echo $row['IP']; ?></center></td>
                      <td><center><?php if($row['ISONLINE'] == 0) { echo 'NO'; } else { echo 'YES'; }?></center></td>
                      <td>
                        <center>
                          <form action="" method="POST">
                        <?php if($row['BLOCKED'] == 0) { ?><button type="submit" name="BLOCK<?php echo $row['ID']; ?>" id='block<?php echo $row['ID']; ?>' class="btn btn-danger">BLOCK</button><?php } else { ?><button type="submit" name="UNBLOCK<?php echo $row['ID']; ?>" id='unblock<?php echo $row['ID']; ?>' class="btn btn-danger">UNBLOCK</button><?php } ?> | <button type="button" id='showinfo<?php echo $row['ID']; ?>' class="btn btn-info">SHOW INFO</button></form>
                      </center>
                      </td>
                      <td>
                        <center><button type="button" disabled class="btn btn-success"><?php echo $user->statusUser($row['ID']); ?></button></center>
                      </td>
                    </tr>
                    <?php 
                    $page = 'index.php';
                    if(isset($_POST['BLOCK'.$row['ID']]))
                    {
                      $user->blockUser($row['ID'], $page);
                    }
                    if(isset($_POST['UNBLOCK'.$row['ID']]))
                    {
                      if($user->unblockUser($row['ID'], $page))
                      {
                        $user->redirect('index.php');
                        exit();
                      }
                    }
                  } //Foreach
                    ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>
          <div class="container">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Blocked Users (<?php echo $user->blockedUserCounting(); ?>)</strong></h2>
              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th><center>ID#</center></th>
                      <th><center>FULLNAME</center></th>
                      <th><center>IP</center></th>
                      <th><center>ONLINE</center></th>
                      <th><center>ACTION</center></th>
                      <th><center>STATUS</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = 'SELECT * FROM users WHERE ADMIN=0 AND BLOCKED = 1';
                    $users = $conn->query($sql);
                    foreach($users as $row)
                    {


                    ?>
                    <tr>
                      <td><center><?php echo $row['ID']; ?></center></td>
                      <td><center><?php echo $row['FIRSTNAME'] . ' ' . $row['LASTNAME']; ?></center></td>
                      <td><center><?php echo $row['IP']; ?></center></td>
                      <td><center><?php if($row['ISONLINE'] == 0) { echo 'NO'; } else { echo 'YES'; }?></center></td>
                      <td>
                        <center>
                          <form action="" method="POST">
                        <?php if($row['BLOCKED'] == 0) { ?><button type="submit" name="BLOCK<?php echo $row['ID']; ?>" id='block<?php echo $row['ID']; ?>' class="btn btn-danger">BLOCK</button><?php } else { ?><button type="submit" name="UNBLOCK<?php echo $row['ID']; ?>" id='unblock<?php echo $row['ID']; ?>' class="btn btn-danger">UNBLOCK</button><?php } ?> | <button type="button" id='showinfo<?php echo $row['ID']; ?>' class="btn btn-info">SHOW INFO</button></form>
                      </center>
                      </td>
                      <td><center><button type="button" class="btn btn-danger" disabled>BLOCKED</button></center></td>
                    </tr>
                    <?php 
                    $page = 'index.php';
                    if(isset($_POST['BLOCK'.$row['ID']]))
                    {
                      $user->blockUser($row['ID'], $page);
                    }
                    if(isset($_POST['UNBLOCK'.$row['ID']]))
                    {
                      if($user->unblockUser($row['ID'], $page))
                      {
                        $user->redirect('index.php');
                        exit();
                      }
                    }
                  } //Foreach
                    ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>
           <div class="container">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-bullhorn red"></i><strong>New Blog Posts</strong></h2>
              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th><center>ID#</center></th>
                      <th><center>TITLE</center></th>
                      <th><center>AUTHOR</center></th>
                      <th><center>DATE</center></th>
                      <th><center>PUBLISHED</center></th>
                      <th><center>ACTION</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><center>1</center></td>
                      <td><center>Lorem Ipsum</center></td>
                      <td><center>Stefan Despot</center></td>
                      <td><center>20.08.2018</center></td>
                      <td><center>NO</center></td>
                      <td>
                        <center>
                        <input type="submit" name="remove" value="REMOVE" class="btn btn-danger"> | <input type="submit" name="showpost" value="SHOW POST" class="btn btn-info"> 
                      </center>
                      </td>
                    </tr>
                   
                    
                    
                    
                  </tbody>
                </table>
              </div>

            </div>

          </div>

 
          <!--/col-->

        </div>



        <!-- statics end -->




        

         

        <!-- project team & activity end -->

      </section>

    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
