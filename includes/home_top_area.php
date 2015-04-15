<div class="top-area show-onload">
    <div class="bg-holder full">
        <div class="bg-mask"></div>
        <?php shuffle($array_home_bg) ?>
        <div class="bg-parallax" style="background-image:url(img/<?php echo $array_home_bg[0]['string']?>.jpg);"></div>
        <div class="bg-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="search-tabs search-tabs-bg mt50">
                            <h1>We've only got one thing: making your travels fun!</h1>
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li><a href="#tab-1" data-toggle="tab"><i class="fa fa-building-o"></i> <span >Hotels</span></a>
                                    </li>
                                    <li  class="active"><a href="#tab-2" data-toggle="tab"><i class="fa fa-plane"></i> <span >Flights</span></a>
                                    </li>
                                    <li><a href="#tab-3" data-toggle="tab"><i class="fa fa-home"></i> <span >Flights + Hotels</span></a>
                                    </li>
                                    <!--<li><a href="#tab-4" data-toggle="tab"><i class="fa fa-car"></i> <span >Cars</span></a>-->
                                    <!--</li>-->
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="tab-1">
                                        <h2>Search and Save on Hotels</h2>
                                        <?php include_once 'includes/hotel_form.php';?>
                                    </div>
                                    <div class="tab-pane fade in active" id="tab-2">
                                        <h2>Search for Cheap Flights</h2>
                                        <?php include_once 'includes/flight_form.php';?>
                                    </div>
                                    <div class="tab-pane fade" id="tab-3">
                                        <h2>Search for Cheap Flights</h2>
                                        <?php include_once 'includes/flight_hotel_form.php';?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="loc-info text-right hidden-xs hidden-sm">
                            
                            <h3 class="loc-info-title"><img src="img/flags/32/<?php  echo $array_home_bg[0]['flag']; ?>.png" alt="Image Alternative text" title="Image Title" /><?php echo $array_home_bg[0]['place'];?></h3>
                            <p class="loc-info-weather"><span class="loc-info-weather-num">+35</span><i class="im im-sun loc-info-weather-icon"></i>
                            </p>
                            <ul class="loc-info-list">
                                <li><a href="#"><i class="fa fa-building-o"></i> 102 Hotels from $38/night</a>
                                </li>
<!--                                <li><a href="#"><i class="fa fa-home"></i> 291 Rentals from $32/night</a>
                                </li>
                                <li><a href="#"><i class="fa fa-car"></i> 244 Car Offers from $46/day</a>
                                </li>
                                <li><a href="#"><i class="fa fa-bolt"></i> 188 Activities this Week</a>-->
                                </li>
                            <!--</ul><a class="btn btn-white btn-ghost mt10" href="#"><i class="fa fa-angle-right"></i> Explore</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="width:100%;height: 400px;background: white;">
        
    </div>
    <!--asdfghkjlk./-->
    <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row row-wrap" data-gutter="120">
                        <div class="col-md-6">
                            <div class="mb30 thumb"><i class="fa fa-dollar box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                                <div class="thumb-caption">
                                    <h4 class="thumb-title">Save more with us</h4>
                                    <p class="thumb-desc">Making your travel arrangements with Aviator saves you a lot of coin. We go a long way in finding the most cost-effective route to make your travels possible without compromising your convenience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb30 thumb"><i class="fa fa-check box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                                <div class="thumb-caption">
                                    <h4 class="thumb-title">Good customer relation</h4>
                                    <p class="thumb-desc">We believe <em>A single customer well treated is worth more than a million coin spent on advertisement</em>. For this, we put you first in all we do; after all, your patronage is what keeps us going.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb30 thumb"><i class="fa fa-send box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                                <div class="thumb-caption">
                                    <h4 class="thumb-title">Bundled packages</h4>
                                    <p class="thumb-desc">Should you need a special arrangement for honeymoons, pilgrimages, schools, and more, we've helped you thought of it and you can count on us. Just contact us and you'd be glad you did!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb30 thumb"><i class="fa fa-thumbs-o-up box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                                <div class="thumb-caption">
                                    <h4 class="thumb-title">Better servicee assured</h4>
                                    <p class="thumb-desc">We've counted a couple of years in the industry; our knowledge of operation increases by the day. You can count on our wealth of experience for better service delivery.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<!--                                    <div class="tab-pane fade" id="tab-4">
                                        <h2>Search for Cheap Rental Cars</h2>
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                                                        <label>Pick-up Location</label>
                                                        <input class="typeahead form-control" placeholder="City, Airport, U.S. Zip" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                                                        <label>Drop-off Location</label>
                                                        <input class="typeahead form-control" placeholder="City, Airport, U.S. Zip" type="text" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-daterange" data-date-format="M d, D">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>Pick-up Date</label>
                                                            <input class="form-control" name="start" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                            <label>Pick-up Time</label>
                                                            <input class="time-pick form-control" value="12:00 AM" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>Drop-off Date</label>
                                                            <input class="form-control" name="end" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                            <label>Drop-off Time</label>
                                                            <input class="time-pick form-control" value="12:00 AM" type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-lg" type="submit">Search for Rental Cars</button>
                                        </form>
                                    </div>-->
<!--                                    <div class="tab-pane fade" id="tab-5">
                                        <h2>Search for Activities</h2>
                                        <form>
                                            <div class="input-daterange" data-date-format="M d, D">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                                                            <label>Where are you going?</label>
                                                            <input class="typeahead form-control" placeholder="City, Airport, Point of Interest or U.S. Zip Code" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>From</label>
                                                            <input class="form-control" name="start" type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                            <label>To</label>
                                                            <input class="form-control" name="end" type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-lg" type="submit">Search for Activities</button>
                                        </form>
                                    </div>-->