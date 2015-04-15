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
            
            <div class="booking-item-details">
                <header class="booking-item-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h2 class="lh1em">Central Park Trip</h2>
                            <p class="lh1em text-small"><i class="fa fa-map-marker"></i> 6782 Sarasea Circle, Siesta Key, FL 34242</p>
<!--                            <ul class="list list-inline text-small">
                                <li><a href="#"><i class="fa fa-envelope"></i> Owner E-mail</a>
                                </li>
                                <li><a href="#"><i class="fa fa-home"></i> Owner Website</a>
                                </li>
                                <li><i class="fa fa-phone"></i> +1 (572) 426-3323</li>
                            </ul>-->
                        </div>
                        
                    </div>
                </header>
                <div class="row">
                    <div class="col-md-7">
                        <div class="tabbable booking-details-tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-camera"></i>Photos</a>
                                </li>
                                <li><a href="#google-map-tab" data-toggle="tab"><i class="fa fa-map-marker"></i>On the Map</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-1">
                                    <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs">
                                        <img src="img/800x600.png" alt="Image Alternative text" title="Upper Lake in New York Central Park" />
                                        <img src="img/800x600.png" alt="Image Alternative text" title="new york at an angle" />
                                        <img src="img/800x600.png" alt="Image Alternative text" title="Pictures at the museum" />
                                        <img src="img/800x600.png" alt="Image Alternative text" title="Plunklock live in Cologne" />
                                        <img src="img/800x600.png" alt="Image Alternative text" title="AMaze" />
                                        <img src="img/800x600.png" alt="Image Alternative text" title="Old No7" />
                                        <img src="img/800x600.png" alt="Image Alternative text" title="The Big Showoff-Take 2" />
                                        <img src="img/800x600.png" alt="Image Alternative text" title="4 Strokes of Fun" />
                                        <img src="img/800x600.png" alt="Image Alternative text" title="Me with the Uke" />
                                        <img src="img/800x600.png" alt="Image Alternative text" title="Trebbiano Ristorante - japenese breakfast" />
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="google-map-tab">
                                    <div id="map-canvas" style="width:100%; height:500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="booking-item-meta">
                            <h2 class="lh1em mt40">Exeptional!</h2>
                            <h3>97% <small >of guests recommend</small></h3>
                            <div class="booking-item-rating">
                                <ul class="icon-list icon-group booking-item-rating-stars">
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                </ul><span class="booking-item-rating-number"><b >4.7</b> of 5 <small class="text-smaller">guest rating</small></span>
                                <p><a class="text-default" href="#">based on 1535 reviews</a>
                                </p>
                            </div>
                        </div>
                        <div class="gap gap-small">
                            <h3>Owner description</h3>
                            <p>Lacus odio porttitor sagittis netus nullam dictumst varius ultricies volutpat fringilla erat rutrum dis eleifend vestibulum a dui magna rutrum ut massa dictumst ultricies justo ante ullamcorper congue scelerisque fames risus nam ultrices enim himenaeos volutpat conubia habitasse ridiculus nullam erat nec nibh dictum pellentesque imperdiet ultrices tellus dictum quisque</p>
                        </div>
                        <a href="#" class="btn btn-primary btn-lg">Add to Trip</a>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
            
            <div class="gap gap-small"></div>
        </div>
<?php include_once './includes/footer.php';?>
        <?php include_once './includes/base_script.php';?>
    </div>
</body>

</html>


