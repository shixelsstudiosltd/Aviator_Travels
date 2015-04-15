<div class="col-md-6">
    <h3>Flight booking confirmation</h3>
    <p>Sign in to your account or register below as a new user to continue your booking</p>
    <form action="lin" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Email</label>
                    <input name="l_email" class="form-control" type="text" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Phone Number</label>
                    <input name="l_pass" class="form-control" type="password" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type='hidden' name='dologin' value="1"/>
                    <input type='hidden' name='returnurl' value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; //curPageURL();    ?>"/>
                    &nbsp; &nbsp; &nbsp;<a href="" style="font-size: 12px;" id="forgetplink">Forgot password?</a>
                    <!--<a class="btn btn-primary">Sign me in!</a>-->
                    <button type="submit" class="btn btn-primary"><i class="fa fa-angle-double-right fa-lg"></i> Let me in!</button>
                </div>
            </div>
        </div>
    </form>
    <div class="gap gap-small"></div>
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
                                    <input type="checkbox" id="create_acc_check"/>Create account
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type='hidden' name='doregister' value="1"/>
                            <input type='hidden' name='returnurl' value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; //curPageURL();    ?>"/>
                            <!--&nbsp; &nbsp; &nbsp;<a href="" style="font-size: 12px;" id="forgetplink">Forgot password?</a>-->
                            <!--<a class="btn btn-primary">Sign me in!</a>-->
                            <button type="submit" class="btn btn-primary disabled" id="reg_btn"><i class="fa fa-angle-double-right fa-lg" ></i> Create my account!</button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </form>
    <div class="gap gap-small"></div>
</div>