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
            <h1 class="page-title">Search for Flights</h1>
        </div>




        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar-left">
                        <form>
                            <div class="tabbable">
                                <ul class="nav nav-pills nav-sm nav-no-br mb10" id="myTab">
                                    <li class="active"><a href="#flight-search-1" data-toggle="tab">Round Trip</a>
                                    </li>
                                    <li><a href="#flight-search-2" data-toggle="tab">One Way</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="flight-search-1">
                                        <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                            <label>From</label>
                                            <input class="typeahead form-control" placeholder="City, Hotel Name or U.S. Zip Code" type="text" />
                                        </div>
                                        <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                            <label>To</label>
                                            <input class="typeahead form-control" placeholder="City, Hotel Name or U.S. Zip Code" type="text" />
                                        </div>
                                        <div class="input-daterange" data-date-format="MM d, D">
                                            <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                                <label>Departing</label>
                                                <input class="form-control" name="start" type="text" />
                                            </div>
                                            <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                                <label>Returning</label>
                                                <input class="form-control" name="end" type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="flight-search-2">
                                        <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                            <label>To</label>
                                            <input class="typeahead form-control" placeholder="City, Hotel Name or U.S. Zip Code" type="text" />
                                        </div>
                                        <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                            <label>Departing</label>
                                            <input class="date-pick form-control" data-date-format="MM d, D" type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-select-plus">
                                <label>Passengers</label>
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
                                        <input type="radio" name="options" />5</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />5+</label>
                                </div>
                                <select class="form-control hidden">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option selected="selected">6</option>
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
                            <input class="btn btn-primary mt10" type="submit" value="Search for Flights" />
                        </form>
                    </aside>
                </div>
                <div class="col-md-9">
                    <h3 class="mb20">Popular Flight Destinations</h3>
                    <div style="padding: 5px;border: 1px #ccc solid;margin-bottom: 2px;">
                        <img src="img/flight_img.jpg"/>
                    </div>
                    
                    <div class="row row-wrap">
                        <?php
                        include_once './includes/set.php';
                        shuffle($array_site);
                        $array_sit = array_slice($array_site, 3,  9);
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
                </div>
            </div>
        </div>

        <?php include_once './includes/footer.php';?>
        <?php include_once './includes/base_script.php';?>
    </div>
</body>

</html>


