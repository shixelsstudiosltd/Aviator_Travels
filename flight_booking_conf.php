<?php // die($theId);    ?>
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
            <div class="gap"></div>


            <div class="container">
                 <?php
            if (isset($_SESSION['aviator_user']['error']) && $_SESSION['aviator_user']['error']) {
                $headmsg = 'Error!';
                switch ($_SESSION['aviator_user']['up_status']) {
                    case 'invalid_pass': $msg = "Incorrect email/password combination!";
                        break;
                    case 'verify_error': $msg = "Email verifaction error. Please retry later!";
                        break;
                    case 'verify_already': $msg = "Email already verified! You only need to login!";
                        break;
                    case 'unsucc_reg': $msg = "Registration unsuccessful. Please try again!";
                        break;
                    case 'no_suc_user': $msg = "No such user found with the provided credentials!";
                        break;
                    case 'login_error': $msg = "Login error!";
                        break;
                    case 'general_error': $msg = "Your credentials could not be verified at the moment! Please retry later";
                        break;
                    case 'invalid_verify_token': $msg = "Invalid email verification token supplied!";
                        break;
                    case 'already_register': $msg = "This email is already in our record. Try recover your password!";
                        break;
                    case 'reset_link': $msg = "Password reset email could not be sent. Retry with a restered email!";
                        break;
                    case 'reset_email_invalid': $msg = "No record found matching the provided email. Password reset email not sent!";
                        break;
                    case 'unverified_email': $msg = "Account not verified. Click the verification link in the email sent to you to verify your account!"
                                . "<br><br>OR<br><br><a href='resend' style='text-decoration:underline;'>Resend verification email</a>";
                        break;
                }
                printNotice($headmsg, $msg, TRUE);
                if (isset($_SESSION['aviator_user']['error']))
                    unset($_SESSION['aviator_user']['error']);
            } elseif (isset($_SESSION['ushop_user']['succ']) && $_SESSION['ushop_user']['up_status']) {
                $headmsg = 'Success!';
                switch ($_SESSION['aviator_user']['up_status']) {
                    case 'reset_link_sent': $msg = "Password reset info has been sent to your email. Follow the instructions in the email to reset your password!";
                        break;
                    case 'pass_reset_succ': $msg = "Password modification successful. Your password has been modified to a new one!";
                        break;
                    default:
                        break;
                }
                printNotice($headmsg, $msg);
                unset($_SESSION['aviator_user']['succ']);
            }
            ?>
                <div class="row">
                    <?php
                    if (!isset($_SESSION['aviator_user']['auth'])) {
                        include_once './confirm_in_form.php';
                    } else {
                        include_once './confirm_info.php';
                    }
                    ?>

                    <div class="col-md-6">
                        <div class="booking-item-payment">
                            <header class="clearfix">
                                <h5 class="mb0"><?php echo $origin; ?> - <?php echo $destin; ?></h5>
                            </header>
                            <ul class="booking-item-payment-details">
                                <li>
                                    <h5>Flight Details</h5>
                                    <div class="booking-item-payment-flight">
                                        <?php
                                        $g_departure_time = $_SESSION['goingChunk'][$theId][0]['DepartureTime']; // 1 instead of using itinanery number since it is the origin and 0  as well
                                        list($g_ddate, $g_dtime) = explode('T', $g_departure_time);
                                        $g_dtime = substr($g_dtime, 0, 5);

                                        $g_arrival = $_SESSION['goingChunk'][$theId][count($_SESSION['goingChunk'][$theId]) - 1]; //get arrival details of first going itinanery
                                        $g_arrival_time = $g_arrival['ArrivalTime']; //$_SESSION['goingChunk'][1][count($_SESSION['goingChunk'][1])-1];//get arrival details of first going itinanery
                                        list($g_arrival_ddate, $g_arrival_dtime) = explode('T', $g_arrival_time);
                                        $g_arrival_dtime = substr($g_arrival_dtime, 0, 5);

                                        //start of return flight presentation
                                        $r_departure_time = $_SESSION['returnChunk'][$theId][0]['DepartureTime']; // 1 instead of using itinanery number since it is the origin and 0  as well
//                                            $r_departure_time = $r_departure_time['DepartureTime'];// 1 instead of using itinanery number since it is the origin and 0  as well
                                        list($r_ddate, $r_dtime) = explode('T', $r_departure_time);
                                        $r_dtime = substr($r_dtime, 0, 5);
////                                        
                                        $r_arrival = $_SESSION['returnChunk'][$theId][count($_SESSION['returnChunk'][$theId]) - 1]; //get arrival details of first going itinanery
                                        $r_arrival_time = $r_arrival['ArrivalTime']; //$_SESSION['goingChunk'][1][count($_SESSION['goingChunk'][1])-1];//get arrival details of first going itinanery
                                        list($r_arrival_ddate, $r_arrival_dtime) = explode('T', $r_arrival_time);
                                        $r_arrival_dtime = substr($r_arrival_dtime, 0, 5);
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12"><!-- return_plane-->
                                                <div class="booking-item-flight-details">
                                                    <?php // print_r($_SESSION['returnFlight']);?>
                                                    <div class="booking-item-departure"><i class="fa fa-plane going-plane"></i>
                                                        <h5><?php echo$g_dtime; ?></h5>
                                                        <p class="booking-item-date"><?php echo date_format(new DateTime($g_ddate), 'j l\, F'); ?></p>
                                                        <p class="booking-item-destination"><?php echo $origin; ?></p>
                                                    </div>
                                                    <!--....-->
                                                    <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical going-plane"></i>
                                                        <h5><?php echo $g_arrival_dtime; ?></h5>
                                                        <p class="booking-item-date"><?php echo date_format(new DateTime($g_arrival_ddate), 'j l\, F'); ?></p>
                                                        <p class="booking-item-destination"><?php echo $destin; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>&nbsp;</p>
                                        <!--<p>&nbsp;</p>-->
                                        <div class="row">
                                            <div class="col-md-12"><!-- return_plane-->
                                                <div class="booking-item-flight-details">
                                                    <?php // print_r($_SESSION['returnFlight']);?>
                                                    <div class="booking-item-departure"><i class="fa fa-plane going-plane"></i>
                                                        <h5><?php echo $r_dtime; ?></h5>
                                                        <p class="booking-item-date"><?php echo date_format(new DateTime($r_ddate), 'j l\, F'); ?></p>
                                                        <p class="booking-item-destination"><?php echo $destin; ?></p>
                                                    </div>
                                                    <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical going-plane"></i>
                                                        <h5><?php echo $r_arrival_dtime; ?></h5>
                                                        <p class="booking-item-date"><?php echo date_format(new DateTime($r_arrival_ddate), 'j l\, F'); ?></p>
                                                        <p class="booking-item-destination"><?php echo $origin; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--                                            <div class="col-md-3">
                                                                                            <div class="booking-item-flight-duration">
                                                                                                <p>Duration</p>
                                                                                                <h5>10h</h5>
                                                                                            </div>
                                                                                        </div>-->
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <h5>Passengers: <?php echo $passengers; ?></h5>
                                    <ul class="booking-item-payment-price">
                                        <li>
                                            <!--<p class="booking-item-payment-price-title">2 Passengers</p>-->
                                            <!--<p class="booking-item-payment-price-amount">$178<small>/per passnger</small>-->
                                            </p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <p style='padding:4px;'>Total price: <span>To be sent via email</span>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php if (isset($_SESSION['aviator_user']['auth'])) { ?>

                        <div class="col-md-8 col-md-offset-0">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" checked/>Create Traveler account <small>(password will be send to your e-mail)</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <form style="float:right" action="do_flight_booking" method="POST">
                                <input type="hidden" name="conFlight" value="1"/>
                                <input type="hidden" name="flightId" value="<?php echo $theId; ?>"/>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-angle-double-right fa-lg"></i> Yes, Confirm my booking!</button>
                            </form>
                        </div>
                    <?php } ?>

                </div>
                <div class="gap"></div>
            </div>
            <?php include_once './includes/footer.php'; ?>
            <?php include_once './includes/base_script.php'; ?>
        </div>
    </body>

</html>


