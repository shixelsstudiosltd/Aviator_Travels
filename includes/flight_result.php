<style>
    .fl_arrow{
        float: left;width: 20px;height: 20px;padding:2px;margin: 2px;
    }
    .f_ar{
        background: url(img/f_arrow.gif) no-repeat center;
    }
    .d_ar{
        background: url(img/d_arrow.gif) no-repeat center;
    }
    .d_arrow1{
        background: url(img/d_arrow.gif) no-repeat center;
    }
    .going-btn{
        background: #3FADAA;
        border: 1px solid #3FADAA;
    }
    .going-plane{
        color: #3FADAA;
    }
    .return_plane{
        color: #ed8323;
    }going-plane return_plane
</style>
<div class="col-md-9">
    <?php $itenary = 0; ?>
    <ul class="booking-list">
        <?php
        if (!$flight_error) {//if no error
            $flight_str = "";
            $arrayFlights = array();
            foreach ($arrGoing as $itenary => $val) {
                $style = ($itenary > 1) ? 'display:none' : '';
                ?>
                <li class="accord_hold" rel="<?php echo $itenary; ?>" style="border:1px #ccc solid;height: 26px;cursor: pointer;margin-bottom: 5px;">
                    <div class="booking-item-container accord_hold" style="padding:auto;">
                        <span class="arr_images">
                            <div style="" class="fl_arrow <?php echo ($itenary > 1) ? 'f_ar' : 'd_ar'; ?>"></div>
                        </span>
                        &nbsp;<span style="color:#ed8323;font-weight:bold;margin:-4px;"><?php echo 'Itinerary - ' . $itenary ?></span>
                    </div>
                </li>
                <li class='accord_body' id='accord_body-<?php echo $itenary; ?>' style="<?php echo $style; ?>">
                    <ul class="booking-list">
                        <?php
                        foreach ($val as $nums => $flight) {
                            list($ddate, $dtime) = explode('T', $flight['DepartureTime']);
                            $dtime = substr($dtime, 0, 5);
                            list($adate, $atime) = explode('T', $flight['ArrivalTime']);
                            $atime = substr($atime, 0, 5); //
                            $full_origin = printWell($flight['Origin'], $arrRef1, 'description', ' ', ', ') . printWell($flight['Origin'], $arrRef1, 'country', '', '') . ', [' . $flight['Origin'] . ']';
                            $full_destin = printWell($flight['Destination'], $arrRef1, 'description', ' ', ', ') . printWell($flight['Destination'], $arrRef1, 'country', '', '') . ', [' . $flight['Destination'] . ']';
                            ?>
                            <li style="margin-bottom: 2px;">
                                <div class="booking-item-container">
                                    <div class="booking-item" style="border: 1px solid #3FADAA">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="booking-item-airline-logo">
                                                    <img src="img/small_logo.png" title="Image Title" />
                                                    <p><?php echo $flight['Carrier'] . '-' . $flight['FlightNumber']; ?></p>
                                                    <p class="going-plane"><?php // echo $trip_count;?>Outbound >></p>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="booking-item-flight-details">
                                                    <div class="booking-item-departure"><i class="fa fa-plane going-plane"></i>
                                                        <h5><?php echo $dtime; ?></h5>
                                                        <p class="booking-item-date"><?php echo date_format(new DateTime($ddate), 'j l\, F'); ?></p>
                                                        <p class="booking-item-destination"><?php echo $full_origin; ?></p>
                                                    </div>
                                                    <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical going-plane"></i>
                                                        <h5><?php echo $atime; ?></h5>
                                                        <p class="booking-item-date"><?php echo date_format(new DateTime($adate), 'j l\, F'); ?></p>
                                                        <p class="booking-item-destination"><?php echo $full_destin; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <h5 style="font-size: 14px;"><?php echo printFlightTime($flight['FlightTime']); ?></h5>
                                                <p>non-stop</p>
                                            </div>
                                            <div class="col-md-3"><span class="booking-item-price" style="font-size:28px;">Price</span><span>/person</span>
                                                <p class="booking-item-flight-class">Not available</p>
                                                <a class="btn btn-primary btn-select going-btn" href="#">See details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="booking-item-details">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h5 class="list-title"><?php echo "$full_origin to $full_destin"; ?></h5>
                                                <ul class="list">
                                                    <li><?php echo $flight['Carrier'] . '-' . $flight['FlightNumber']; ?></li>
                                                    <li>Coach Class: <?php echo $flight['AvailabilityDisplayType'] . ', ' . $flight['Equipment']; ?></li>
                                                    <li>Depart: <?php echo $dtime; ?> </li>
                                                    <li>Arrive: <?php echo $atime; ?> </li>
                                                    <li>Duration: <?php echo printFlightTime($flight['FlightTime']); ?> </li>
                                                    <li>Total trip time:  <?php echo printFlightTime($flight['FlightTime']); ?></li>                                                  
                                                </ul>
                                                <p style="font-weight: bold;">Price/person: Currently unavailable. To be sent through email shortly after booking. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>

                    <ul class="booking-list" style="margin-top:-26px;">
                        <?php
                        if (isset($arrReturn[$itenary]) && $trip_count == 2) {// there is return flight element
                            $val = $arrReturn[$itenary];
                            foreach ($val as $nums => $flight) {
                                list($ddate, $dtime) = explode('T', $flight['DepartureTime']);
                                $dtime = substr($dtime, 0, 5);
                                list($adate, $atime) = explode('T', $flight['ArrivalTime']);
                                $atime = substr($atime, 0, 5); //
                                $full_origin = printWell($flight['Origin'], $arrRef1, 'description', ' ', ', ') . printWell($flight['Origin'], $arrRef1, 'country', '', '') . ', [' . $flight['Origin'] . ']';
                                $full_destin = printWell($flight['Destination'], $arrRef1, 'description', ' ', ', ') . printWell($flight['Destination'], $arrRef1, 'country', '', '') . ', [' . $flight['Destination'] . ']';
                                ?>
                                <li style="margin-bottom: 2px;">
                                    <div class="booking-item-container">
                                        <div class="booking-item" style="border: 1px #e27513 solid;">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="booking-item-airline-logo">
                                                        <img src="img/small_logo.png" alt="Image Alternative text" title="Image Title" />
                                                        <p><?php echo $flight['Carrier'] . '-' . $flight['FlightNumber']; ?></p>
                                                        <p class="return_plane"><< Inbound</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="booking-item-flight-details">
                                                        <div class="booking-item-departure"><i class="fa fa-plane return_plane"></i>
                                                            <h5><?php echo $dtime; ?></h5>
                                                            <p class="booking-item-date"><?php echo date_format(new DateTime($ddate), 'j l\, F'); ?></p>
                                                            <p class="booking-item-destination"><?php echo $full_origin; ?></p>
                                                        </div>
                                                        <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical return_plane"></i>
                                                            <h5><?php echo $atime; ?></h5>
                                                            <p class="booking-item-date"><?php echo date_format(new DateTime($adate), 'j l\, F'); ?></p>
                                                            <p class="booking-item-destination"><?php echo $full_destin; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <h5 style="font-size: 14px;"><?php echo printFlightTime($flight['FlightTime']); ?></h5>
                                                    <p>non-stop</p>
                                                </div>
                                                <div class="col-md-3"><span class="booking-item-price" style="font-size:28px;">Price</span><span>/person</span>
                                                    <p class="booking-item-flight-class">Not available</p>
                                                    <a class="btn btn-primary btn-select" href="#">See details</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="booking-item-details">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="list-title"><?php echo "$full_origin to $full_destin"; ?></h5>
                                                    <ul class="list">
                                                        <li><?php echo $flight['Carrier'] . '-' . $flight['FlightNumber']; ?></li>
                                                        <li>Coach Class: <?php echo $flight['AvailabilityDisplayType'] . ', ' . $flight['Equipment']; ?></li>
                                                        <li>Depart: <?php echo $dtime; ?> </li>
                                                        <li>Arrive: <?php echo $atime; ?> </li>
                                                        <li>Duration: <?php echo printFlightTime($flight['FlightTime']); ?> </li>
                                                        <li>Total trip time:  <?php echo printFlightTime($flight['FlightTime']); ?></li>                                                  
                                                    </ul>
                                                    <p style="font-weight: bold;">Price/person: Currently unavailable. To be sent through email shortly after booking. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php }
                        } ?>
                        <li style="right: 0;text-align: right;"><a class="btn btn-primary" href="flight_booking_confirm-<?php echo $itenary; ?>" style="">Book this flight!</a></li>
                    </ul>
                </li>

            <?php
            }
        } else {
            ?>
            <li style="right: 0;text-align: right;">
                <div class="details" align="center" style="text-align: center;border: 1px #FF9966 solid;border-radius: 5px;">
                    <h3 style="color: #FF9966;text-align: center;">Sorry! But no flight schedule record could be found for your search criteria!</h3>
                    <img src="img/plane_no_flight.gif" style="margin: 10px auto;height: 350px;width: 350px;"/>
                    <h3 style="color: #FF9966;text-align: center;">Please retry at a later time...</h3><p>&nbsp;</p>
                </div> 
            </li>
<?php } ?>
    </ul>
    <p class="text-right">Not what you're looking for? <a class="popup-text" href="#search-dialog" data-effect="mfp-zoom-out">Try your search again</a>
    </p>
</div>
<?php // print_r($goingFlight)?>