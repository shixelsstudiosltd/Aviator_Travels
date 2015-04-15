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
            <h1 class="page-title">Search for Rental Cars</h1>
        </div>




        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar-left">
                        <form>
                            <div class="input-daterange" data-date-format="m/d">
                                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                    <label>Pickup Location</label>
                                    <input class="typeahead form-control" placeholder="City or Airport" type="text" />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                            <label>Check in</label>
                                            <input class="form-control" name="start" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-hightlight"></i>
                                            <label>Time</label>
                                            <input class="time-pick form-control" value="12:00 AM" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                    <label>Drop off Location</label>
                                    <input class="typeahead form-control" value="Same as pickup" placeholder="City or Airport" type="text" />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                            <label>Check out</label>
                                            <input class="form-control" name="end" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-hightlight"></i>
                                            <label>Time</label>
                                            <input class="time-pick form-control" value="12:00 AM" type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-primary mt10" type="submit" value="Search for Rental Cars" />
                        </form>
                    </aside>
                </div>
                <div class="col-md-9">
<!--                    <h3 class="mb20">Cars in Popuplar Destinations</h3>
                    <div class="row row-wrap">
                        <div class="col-md-4">
                            <div class="thumb">
                                <a class="hover-img" href="#">
                                    <img src="img/400x300.png" alt="Image Alternative text" title="the journey home" />
                                    <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">
                                        <div class="text-small">
                                            <h5>Seattle Hotels</h5>
                                            <p>77272 reviews</p>
                                            <p class="mb0">691 offers from $86</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <a class="hover-img" href="#">
                                    <img src="img/800x600.png" alt="Image Alternative text" title="lack of blue depresses me" />
                                    <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">
                                        <div class="text-small">
                                            <h5>Miami Hotels</h5>
                                            <p>59605 reviews</p>
                                            <p class="mb0">290 offers from $80</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <a class="hover-img" href="#">
                                    <img src="img/800x600.png" alt="Image Alternative text" title="Sydney Harbour" />
                                    <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">
                                        <div class="text-small">
                                            <h5>Sydney Hotels</h5>
                                            <p>50247 reviews</p>
                                            <p class="mb0">824 offers from $68</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <a class="hover-img" href="#">
                                    <img src="img/800x600.png" alt="Image Alternative text" title="new york at an angle" />
                                    <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">
                                        <div class="text-small">
                                            <h5>Boston</h5>
                                            <p>74113 reviews</p>
                                            <p class="mb0">997 offers from $65</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <a class="hover-img" href="#">
                                    <img src="img/800x600.png" alt="Image Alternative text" title="Street" />
                                    <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">
                                        <div class="text-small">
                                            <h5>Disney World Hotels</h5>
                                            <p>50449 reviews</p>
                                            <p class="mb0">952 offers from $73</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <a class="hover-img" href="#">
                                    <img src="img/800x600.png" alt="Image Alternative text" title="196_365" />
                                    <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">
                                        <div class="text-small">
                                            <h5>Paris</h5>
                                            <p>66372 reviews</p>
                                            <p class="mb0">251 offers from $97</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <a class="hover-img" href="#">
                                    <img src="img/800x600.png" alt="Image Alternative text" title="Gaviota en el Top" />
                                    <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">
                                        <div class="text-small">
                                            <h5>New York City Hotels</h5>
                                            <p>76021 reviews</p>
                                            <p class="mb0">317 offers from $64</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <a class="hover-img" href="#">
                                    <img src="img/800x600.png" alt="Image Alternative text" title="the best mode of transport here in maldives" />
                                    <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">
                                        <div class="text-small">
                                            <h5>Virginia Beach Hotels</h5>
                                            <p>73047 reviews</p>
                                            <p class="mb0">961 offers from $59</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <a class="hover-img" href="#">
                                    <img src="img/800x600.png" alt="Image Alternative text" title="Upper Lake in New York Central Park" />
                                    <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">
                                        <div class="text-small">
                                            <h5>Atlantic City Hotels</h5>
                                            <p>78277 reviews</p>
                                            <p class="mb0">294 offers from $84</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>-->
                    <!--<div class="gap"></div>-->
                    <h3 class="mb20">Top Deals</h3>
                    <div class="row row-wrap">
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a href="#">
                                        <img src="img/Maserati-GranTurismo-Sport-facelift.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Maserati GranTurismo</a></h5><small>Luxury</small>
                                    <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">
                                        <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 3</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 2</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 1</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Hybrid Vehicle"><i class="im im-diesel"></i><span class="booking-item-feature-sign">hybrid</span>
                                        </li>
                                    </ul>
                                    <p class="text-darken mb0 text-color">$31<small> /day</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a href="#">
                                        <img src="img/Porsche-Cayenne-Turbo-S.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Porsche Cayenne</a></h5><small>SUV</small>
                                    <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">
                                        <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 4</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 4</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 2</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Manual Transmission"><i class="im im-shift"></i><span class="booking-item-feature-sign">manual</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Electric Vehicle"><i class="im im-electric"></i>
                                        </li>
                                    </ul>
                                    <p class="text-darken mb0 text-color">$34<small> /day</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a href="#">
                                        <img src="img/Toyota-Prius-Plus.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Toyota Prius Plus</a></h5><small>Compact</small>
                                    <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">
                                        <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 6</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 2</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 3</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Electric Vehicle"><i class="im im-electric"></i>
                                        </li>
                                    </ul>
                                    <p class="text-darken mb0 text-color">$68<small> /day</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a href="#">
                                        <img src="img/Volkswagen-Touareg-Edition-X.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Volkswagen Touareg</a></h5><small>Crossover</small>
                                    <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">
                                        <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 2</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 3</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 4</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Gas Vehicle"><i class="im im-diesel"></i><span class="booking-item-feature-sign">gas</span>
                                        </li>
                                    </ul>
                                    <p class="text-darken mb0 text-color">$54<small> /day</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a href="#">
                                        <img src="img/Lamborghini-Mansory-Aventador.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Lamborghini Aventador</a></h5><small>Luxury</small>
                                    <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">
                                        <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 4</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 5</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 3</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Diesel Vehicle"><i class="im im-diesel"></i><span class="booking-item-feature-sign">diesel</span>
                                        </li>
                                    </ul>
                                    <p class="text-darken mb0 text-color">$45<small> /day</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a href="#">
                                        <img src="img/BMW-X6-facelift.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">BMW X6</a></h5><small>Crossover</small>
                                    <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">
                                        <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 4</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 4</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 2</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Hybrid Vehicle"><i class="im im-diesel"></i><span class="booking-item-feature-sign">hybrid</span>
                                        </li>
                                    </ul>
                                    <p class="text-darken mb0 text-color">$67<small> /day</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a href="#">
                                        <img src="img/Volkswagen-Polo-BlueGT.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Volkswagen Polo</a></h5><small>Economy</small>
                                    <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">
                                        <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 6</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 5</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 5</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Electric Vehicle"><i class="im im-electric"></i>
                                        </li>
                                    </ul>
                                    <p class="text-darken mb0 text-color">$39<small> /day</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a href="#">
                                        <img src="img/Nissan-GT-R.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Nissan GT R</a></h5><small>Premium</small>
                                    <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">
                                        <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 2</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 4</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 3</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Diesel Vehicle"><i class="im im-diesel"></i><span class="booking-item-feature-sign">diesel</span>
                                        </li>
                                    </ul>
                                    <p class="text-darken mb0 text-color">$54<small> /day</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a href="#">
                                        <img src="img/Honda-Civic.png" alt="Image Alternative text" title="Image Title" />
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Honda Civic</a></h5><small>Economy</small>
                                    <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt5">
                                        <li rel="tooltip" data-placement="top" title="Passengers"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 4</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Doors"><i class="im im-car-doors"></i><span class="booking-item-feature-sign">x 2</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Baggage Quantity"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x 1</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Automatic Transmission"><i class="im im-shift-auto"></i><span class="booking-item-feature-sign">auto</span>
                                        </li>
                                        <li rel="tooltip" data-placement="top" title="Hybrid Vehicle"><i class="im im-diesel"></i><span class="booking-item-feature-sign">hybrid</span>
                                        </li>
                                    </ul>
                                    <p class="text-darken mb0 text-color">$59<small> /day</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap gap-small"></div>
                </div>
            </div>
        </div>



        <footer id="main-footer">
            <div class="container">
                <div class="row row-wrap">
                    <div class="col-md-3">
                        <a class="logo" href="index.html">
                            <img src="img/logo-invert.png" alt="Image Alternative text" title="Image Title" />
                        </a>
                        <p class="mb20">Booking, reviews and advices on hotels, resorts, flights, vacation rentals, travel packages, and lots more!</p>
                        <ul class="list list-horizontal list-space">
                            <li>
                                <a class="fa fa-facebook box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-twitter box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-google-plus box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-linkedin box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-pinterest box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h4>Newsletter</h4>
                        <form>
                            <label>Enter your E-mail Address</label>
                            <input type="text" class="form-control">
                            <p class="mt5"><small>*We Never Send Spam</small>
                            </p>
                            <input type="submit" class="btn btn-primary" value="Subscribe">
                        </form>
                    </div>
                    <div class="col-md-2">
                        <ul class="list list-footer">
                            <li><a href="#">About US</a>
                            </li>
                            <li><a href="#">Press Centre</a>
                            </li>
                            <li><a href="#">Best Price Guarantee</a>
                            </li>
                            <li><a href="#">Travel News</a>
                            </li>
                            <li><a href="#">Jobs</a>
                            </li>
                            <li><a href="#">Privacy Policy</a>
                            </li>
                            <li><a href="#">Terms of Use</a>
                            </li>
                            <li><a href="#">Feedback</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Have Questions?</h4>
                        <h4 class="text-color">+1-202-555-0173</h4>
                        <h4><a href="#" class="text-color">support@traveler.com</a></h4>
                        <p>24/7 Dedicated Customer Support</p>
                    </div>

                </div>
            </div>
        </footer>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/slimmenu.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/bootstrap-timepicker.js"></script>
        <script src="js/nicescroll.js"></script>
        <script src="js/dropit.js"></script>
        <script src="js/ionrangeslider.js"></script>
        <script src="js/icheck.js"></script>
        <script src="js/fotorama.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script src="js/typeahead.js"></script>
        <script src="js/card-payment.js"></script>
        <script src="js/magnific.js"></script>
        <script src="js/owl-carousel.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/tweet.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/gridrotator.js"></script>
        <script src="js/custom.js"></script>
    </div>
</body>

</html>


