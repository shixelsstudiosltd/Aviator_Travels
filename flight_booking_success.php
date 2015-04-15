<?php // die($theId);      ?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php include_once './includes/head.php'; ?>
    </head>
    <?php
    if (session_id() == '') {
        session_start();
    }
    if (!isset($_SESSION['arrRef1']) && !isset($_SESSION['goingFlight']) && !isset($_SESSION['returnFlight'])) {
        header('Location:' . APP_BASE_URL);
    }
    if (isset($_SESSION['aviator_user']['auth']) && $_SESSION['aviator_user']['auth']) {
        $info = $_SESSION['aviator_user']['info'];
    }
    $flight = 'Flight (Inbound & outbound)';
    $origin = $_SESSION['arrRef1'][$_SESSION['DEPART_CODE']]['description'] . ', ' . $_SESSION['arrRef1'][$_SESSION['DEPART_CODE']]['country'] . ' [' . $_SESSION['DEPART_CODE'] . '] - ' . $_SESSION['START'];
    $destin = $_SESSION['arrRef1'][$_SESSION['DESTIN_CODE']]['description'] . ', ' . $_SESSION['arrRef1'][$_SESSION['DESTIN_CODE']]['country'] . ' [' . $_SESSION['DESTIN_CODE'] . ']';
    $passengers = $_SESSION['PASSENGERS'];
    ?>

    <style>
        .going-plane{
            color: #3FADAA;
        }
        .return_plane{
            color: #ed8323;
        }
        //
    </style>
    <body>

        <!-- FACEBOOK WIDGET -->

        <!-- /FACEBOOK WIDGET -->
        <div class="global-wrap">
            <?php include_once './includes/header.php'; ?>
            <!--<div class="gap"></div>-->


            <div class="container">
                <div class="row">
                    <center>
                        <div class="col-md-6 col-md-offset-0" style="margin-top:10px;padding:25px;margin-left:20%;width: 60%;height: auto;border: 1px #ccc solid;border-radius: 5px;" align="center">
                            <center><img src="img/success.gif" style="max-height: 300px;width: auto;"/></center>
                            <div class="gap"></div>
                            <h3 style="color: #41E0D0;">Success! Your flight booking has been saved. We shall send a confirmation email message detailing next steps to you shortly.
                            </h3>
                            <hr>
                            <div class="form-group">
                                <a class="btn btn-primary" href="dashboard">Continue to my Dashboard!</a>
                            </div>
                        </div>
                    </center>
                </div>
                <hr>
                <!--<center>-->
                <!--<div class="col-md-6">-->
<!--                <div class="form-group" style="float:right;">
                    <a class="btn btn-primary" href="do_flight_booking_<?php echo $theId; ?>">Continue to my Dashboard!</a>
                </div>-->
                <!--</div>-->
                <!--</center>-->
<!--                <center>
                <button type="submit" class="btn btn-primary" style="margin-bottom: 13px;">
                    <i class="fa fa-angle-double-right fa-lg"></i>Continue to my Dashboard!
                </button>
            </center>-->
            </div>
            <?php include_once './includes/footer.php'; ?>
            <?php include_once './includes/base_script.php'; ?>
        </div>
    </body>

</html>


