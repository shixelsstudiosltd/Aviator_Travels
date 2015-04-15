<!DOCTYPE HTML>
<html>

<head>
 <?php include_once './includes/head.php'; ?>
</head>

<body style="background: url(img/london_2048x1310.jpg) no-repeat;background-size: cover;">

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
            <h1 class="page-title">Search for Hotels</h1>
        </div>




        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar-left">
                        <form>
                            <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                <label>Where</label>
                                <input class="typeahead form-control" placeholder="City, Hotel Name or U.S. Zip Code" type="text" />
                            </div>
                            <div class="input-daterange" data-date-format="MM d, D">
                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                    <label>Check in</label>
                                    <input class="form-control" name="start" type="text" />
                                </div>
                                <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                    <label>Check out</label>
                                    <input class="form-control" name="end" type="text" />
                                </div>
                            </div>
                            <div class="form-group form-group- form-group-select-plus">
                                <label>Guests</label>
                                <div class="btn-group btn-group-select-num" data-toggle="buttons">
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />1</label>
                                    <label class="btn btn-primary active">
                                        <input type="radio" name="options" />2</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />3</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />4</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />4+</label>
                                </div>
                                <select class="form-control hidden">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option selected="selected">5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                </select>
                            </div>
                            <div class="form-group form-group-select-plus">
                                <label>Rooms</label>
                                <div class="btn-group btn-group-select-num" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" name="options" />1</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />2</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />3</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />4</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />4+</label>
                                </div>
                                <select class="form-control hidden">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option selected="selected">5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                </select>
                            </div>
                            <input class="btn btn-primary mt10" type="submit" value="Search for Hotels" />
                        </form>
                    </aside>
                </div>
                <div class="col-md-9">
                    <h3 class="mb20">Hotels in Popular Destinations</h3>
                    <div style="padding: 5px;border: 1px #ccc solid;margin-bottom: 2px;">
                        <img src="img/hotel_img.jpg"/>
                    </div>
                    <div class="row row-wrap">
                        <?php
                        include_once './includes/set.php';
                        shuffle($array_site);
                        $array_sit = array_slice($array_site, 0,  9);
                        foreach ($array_sit as $key => $value) { ?>
                        <div class="col-md-4">
                            <div class="thumb">
                                <a class="hover-img" href="#">
                                    <img src="img/sample_trips/<?php echo $value['string'] . '.jpg'; ?>" alt="Image Alternative text" title="Viva Las Vegas" />
                                    <div class="hover-inner hover-inner-block hover-inner-bottom hover-inner-bg-black hover-hold">
                                        <div class="text-small">
                                            <h5><?php echo $value['place'] ?></h5>
                                            <p class="mb0"><?php echo 'Over '.$value['hotels'] ?> hotels from</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="gap"></div>
                    <h3 class="mb20">Top Deals</h3>
                    <div class="row row-wrap">
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a class="hover-img" href="#">
                                        <img src="img/800x600.png" alt="Image Alternative text" title="hotel PORTO BAY LIBERDADE" />
                                        <h5 class="hover-title-center">Book Now</h5>
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <ul class="icon-group text-tiny text-color">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-half-empty"></i>
                                        </li>
                                    </ul>
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Holiday Inn Express Kennedy</a></h5>
                                    <p class="mb0"><small><i class="fa fa-map-marker"></i> Flushing, NY (LaGuardia Airport (LGA))</small>
                                    </p>
                                    <p class="mb0 text-darken"><span class="text-lg lh1em text-color">$176</span><small> avg/night</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a class="hover-img" href="#">
                                        <img src="img/800x600.png" alt="Image Alternative text" title="hotel THE CLIFF BAY spa suite" />
                                        <h5 class="hover-title-center">Book Now</h5>
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <ul class="icon-group text-tiny text-color">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-o"></i>
                                        </li>
                                    </ul>
                                    <h5 class="thumb-title"><a class="text-darken" href="#">Wellington Hotel</a></h5>
                                    <p class="mb0"><small><i class="fa fa-map-marker"></i> Ozone Park, NY (Kennedy Airport (JFK))</small>
                                    </p>
                                    <p class="mb0 text-darken"><span class="text-lg lh1em text-color">$470</span><small> avg/night</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a class="hover-img" href="#">
                                        <img src="img/800x600.png" alt="Image Alternative text" title="hotel 1" />
                                        <h5 class="hover-title-center">Book Now</h5>
                                    </a>
                                </header>
                                <div class="thumb-caption">
                                    <ul class="icon-group text-tiny text-color">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-half-empty"></i>
                                        </li>
                                    </ul>
                                    <h5 class="thumb-title"><a class="text-darken" href="#">InterContinental New York B...</a></h5>
                                    <p class="mb0"><small><i class="fa fa-map-marker"></i> Long Island City, NY (Long Island City - Astoria)</small>
                                    </p>
                                    <p class="mb0 text-darken"><span class="text-lg lh1em text-color">$283</span><small> avg/night</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="gap gap-small"></div>
                </div>
            </div>
        </div>
        <?php include_once './includes/footer.php';?>
        <?php include_once './includes/base_script.php';?>
    </div>
</body>

</html>


