<!DOCTYPE HTML>
<html>

<head>
   <?php include_once './includes/head.php'; ?>
</head>

<body>

    <!-- FACEBOOK WIDGET -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- /FACEBOOK WIDGET -->
    <div class="global-wrap">
        <?php include_once './includes/header.php'; ?>
        <div class="container">
            <h1 class="page-title">Contact Us</h1>
        </div>




        <div class="container">
        </div>
        <div id="map-canvas" style="height:400px;"></div>
        <div class="container">
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-7">
                    <p>Inceptos hac sagittis sit elit primis iaculis arcu quam justo per primis tempus ad iaculis cursus condimentum nullam pretium dui id sit lacus duis dignissim primis potenti aliquam malesuada ullamcorper</p>
                    <p>Euismod volutpat risus luctus id varius volutpat adipiscing porttitor egestas nisl nunc luctus phasellus nibh tristique lacinia penatibus justo urna</p>
                    <form class="mt30">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Send Message" />
                    </form>
                </div>
                <div class="col-md-4">
                    <aside class="sidebar-right">
                        <ul class="address-list list">
                            <li>
                                <h5>Email</h5><a href="#">info@aviatortravelsng.com </a>
                            </li>
                            <li>
                                <h5>Phone Number</h5><a href="#">+(234) 01-8968885, 01-8425905, 07098118073, 01 77546117</a>
                            </li>
                            <li>
                                <h5>Address</h5><address>Traveler Ltd.<br />138, Lewis Street, By Moloney Street. <br />Lagos, 23401<br />Nigeria<br /></address>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
            <div class="gap"></div>
        </div>
        <?php include_once './includes/footer.php';?>
        <?php include_once './includes/base_script.php';?>
    </div>
</body>

</html>


