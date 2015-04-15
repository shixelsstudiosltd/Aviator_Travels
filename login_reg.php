<!DOCTYPE HTML>
<?php
@session_start();
if (isset($_SESSION['aviator_user']['auth'])) {
    header('Location:dashboard');
    exit();
}
?>
<html>
    <head>
        <?php include_once './includes/head.php'; ?>
    </head>

    <body>

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
            <?php include_once './includes/header.php'; ?>

            <div class="container">
                <h1 class="page-title">Login/Register on Aviator</h1>
            </div>
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
                <div class="row" data-gutter="60">
                    <div class="col-md-4">
                        <h3>Sign in</h3>
                        <p>Log in to your account</p>
                        <form method="POST" action="lin">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="l_email" class="form-control" type="text" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Passphrase</label>
                                        <input name="l_pass" class="form-control" type="password" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type='hidden' name='dologin' value="1"/>
                                        <!--&nbsp; &nbsp; &nbsp;<a href="" style="font-size: 12px;" id="forgetplink">Forgot password?</a>-->
                                        <!--<a class="btn btn-primary">Sign me in!</a>-->
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-angle-double-right fa-lg"></i> Let me in!</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-8">

                        <h3>Or register as a new user</h3>
                        <form action="lin" method="POST" id="register-form">
                            <ul class="list booking-item-passengers">
                                <li>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name*</label>
                                                <input type="text" name="u_fname" id="u_fname" placeholder="First name" class="validate[required] form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Name*</label>
                                                <input type="text" name="u_lname" id="u_lname" placeholder="Last name" class="validate[required] form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile Number*</label>
                                                <input  type="text" name="u_mobile_num" id="u_mobile_num" placeholder="Mobile number, example 2347037478791" class="validate[required,custom[integer],minSize[7],maxSize[15] form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Valid Email</label>
                                                <input  type="text" name="u_email" id="u_email" placeholder="Email address" class="validate[required,custom[email]] form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Passphrase</label>
                                                <input type="password" name="u_pass" id="u_pass" placeholder="Choose a passphrase" class="validate[required],minSize[8] form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Confirm Passphrase</label>
                                                <input type="password" name="u_con_pass" id="u_con_pass" placeholder="Retype your passphrase" class="validate[required,equals[u_pass]] form-control" data-errormessage="Minimum of 8 characters and same as 'passphrase'"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select name="u_country" id="u_country" onchange='print_state("u_state", this.selectedIndex);' class="validate[required] form-control">
                                                    <script language="javascript">print_country("u_country");</script>
                                                </select>
                        <!--                        <select name="country" class="form-control">
                                                    <option value="1"></option>
                                                </select>-->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <select name="u_state" id="u_state" class="validate[required] form-control"></select>
                                            </div>
                                        </div>
                                        <!--                    <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Something</label>
                                                                    <input class="form-control" type="text" />
                                                                </div>
                                                            </div>-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="u_address" id='u_address' placeholder="Full address" class="validate[required] form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-0">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" id="create_acc_check" style="height: 15px;width: 15px;"/>I agree with Aviator Terms, Create my account!
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type='hidden' name='doregister' value="1"/>
                                               
                                                <!--&nbsp; &nbsp; &nbsp;<a href="" style="font-size: 12px;" id="forgetplink">Forgot password?</a>-->
                                                <!--<a class="btn btn-primary">Sign me in!</a>-->
                                                <button type="submit" class="btn btn-primary disabled" style="float: right;" id="reg_btn"><i class="fa fa-angle-double-right fa-lg"></i>Create my account!</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
                        <div class="gap gap-small"></div>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
            <?php include_once './includes/footer.php'; ?>
            <?php include_once './includes/base_script.php'; ?>
        </div>
    </body>

</html>


