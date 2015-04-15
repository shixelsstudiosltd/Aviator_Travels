<?php // die(print_r($_GET));?>
<!DOCTYPE HTML>
<html class="full">

    <head>
        <?php include_once './includes/head.php'; ?>
    </head>

    <body class="full">

        <!-- FACEBOOK WIDGET -->
        <div id="fb-root"></div>
        <script>
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <!-- /FACEBOOK WIDGET -->
        <div class="global-wrap">

            <div class="full-page">
                <div class="bg-holder full">
                    <div class="bg-mask"></div>
                    <div class="bg-blur" style="background-image:url(img/ny.jpg);"></div>
                    <div class="bg-holder-content full text-white">
                        <a class="logo-holder" href="<?php echo APP_BASE_URL;?>">
                            <img src="img/logo-white.png" alt="Image Alternative text" title="Image Title" />
                        </a>
                        <div class="full-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <p class="text-hero">404</p>
                                        <h1>Page is not found</h1>
                                        <p>Sorry, but the page you requested could not be found. Please check back later or contact us through our support form on 'Contact us' page. </p><a class="btn btn-white btn-ghost btn-lg mt5" href="<?php echo APP_BASE_URL;?>"><i class="fa fa-long-arrow-left"></i> to Homepage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="footer-links">
                            <li><a href="contactus">Contact us</a>
                            </li>
                            <li><a href="operations">How it works</a></li>
                            <li><a href="operations">Terms & Policy</a>
                            </li>
                            <li><a href="operations">Frequently Asked Questions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

<?php // include_once './includes/footer.php';?>
        <?php include_once './includes/base_script.php';?>
        </div>
    </body>

</html>


