<?php 
@session_start();
if(!isset($_SESSION['aviator_user']['auth'])) {?>
<header id="main-header" style='background: white;'>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a class="logo" href="home">
                        <img src="img/logo-invert.png" alt="Image Alternative text" title="Image Title" />
                    </a>
                </div>
                <div class="col-md-3 col-md-offset-2">
                    <form class="main-header-search">
                        <div class="form-group form-group-icon-left">
<!--                            <i class="fa fa-search input-icon"></i>
                            <input type="text" class="form-control">-->
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="top-user-area clearfix">
                        <ul class="top-user-area-list list list-horizontal list-border">
                            <li><a href="login_reg">Signup</a>
                            <li><a href="login_reg">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="nav">
            <ul class="slimmenu" id="slimmenu">
                <?php if(strstr($pagelink, 'login_reg')) {?>  <li class="active"><a>Login - Registration</a></li> <?php } ?>
                <li class="<?php echo ($pagelink == '' || $pagelink == 'home') ? 'active' : ''; ?>"><a href="home">Home</a></li>
                <li class="<?php echo ($pagelink == 'aboutus') ? 'active' : ''; ?>"><a href="aboutus">About Us</a>
                    <ul>
                        <li><a href="aboutus">Our World</a>
                        </li>
                        <li><a href="aboutus">Board</a>
                        </li>
                        <li><a href="aboutus">Management</a></li>
                    </ul>
                </li>
                <li class="<?php echo ($pagelink == 'booking') ? 'active' : ''; ?>"><a href="booking">Booking</a>
                    <ul>
                        <li><a href="booking">Flight</a></li>
                        <li><a href="booking">Hotels</a></li>
                    </ul>
                </li>
<!--                <li class="<?php // echo ($pagelink == 'hotel') ? 'active' : ''; ?>"><a href="hotel">Hotels</a></li>
                <li class="<?php // echo ($pagelink == 'flight') ? 'active' : ''; ?>"><a href="flight">Flights</a>-->
                </li>  </ul>
        </div>
    </div>
</header>
<?php } else {
      if (isset($_SESSION['aviator_user']['auth']) && $_SESSION['aviator_user']['auth']) {
        $info = $_SESSION['aviator_user']['info'];
    }?>
  <header id="main-header" style='background: white;'>
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <a class="logo" href="dashboard">
                                    <img src="img/logo-invert.png" alt="Image Alternative text" title="Image Title" />
                                </a>
                            </div>
                            <div class="col-md-3 col-md-offset-2">
                                <form class="main-header-search">
                                    <div class="form-group form-group-icon-left">
            <!--                            <i class="fa fa-search input-icon"></i>
                                        <input type="text" class="form-control">-->
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <div class="top-user-area clearfix">
                                    <ul class="top-user-area-list list list-horizontal list-border">
                                        <li class="top-user-area-avatar">
                                            <a href="user-profile.html">
                                                <img class="origin round" src="img/40x40.png" alt="Image Alternative text" title="AMaze" />Hi, <?php echo $info['u_fname']?></a>
                                        </li>
                                        <li><a href="">[<?php echo $info['u_email']?>]</a>
<!--                                        <li><a href="login_reg">Log out</a>-->
                                        <!--</li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="nav">
                        <ul class="slimmenu" id="slimmenu">
                            <?php if(strstr($pagelink, 'flight_booking_confirm')) {?>  <li class="active"><a>Confirm booking</a></li> <?php } ?>
                            <?php if(strstr($pagelink, 'do_flight_booking')) {?>  <li class="active"><a>Booking success</a></li> <?php } ?>
                            <li class="<?php echo ($pagelink == '' || $pagelink == 'dashboard') ? 'active' : ''; ?>"><a href="dashboard">My Dashboard</a></li>
<!--                            <li class="<?php echo ($pagelink == 'hotel') ? 'active' : ''; ?>"><a href="hotel">Hotels</a></li>-->
                            <li class="<?php echo ($pagelink == 'booking') ? 'active' : ''; ?>"><a href="booking">Booking</a>
                            </li>
                        </ul>
                        <a href="logout"style="float: right;margin-top:-30px;"><li class="fa fa-tag"></li>&nbsp;Log out</a>
                    </div>
                </div>
            </header>
<?php } ?>