<?php

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>DirEngine - Free Bootstrap 4 Template by Colorlib</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">-->

        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">

        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">

        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/ionicons.min.css">

        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">


        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/style.css">
        
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
      <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <script src="geoson.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="index.html">dirEngine.</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="tour.html" class="nav-link">Tour</a></li>
                        <li class="nav-item"><a href="hotel.html" class="nav-link">Hotels</a></li>
                        <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                        <li class="nav-item cta"><a href="contact.html" class="nav-link"><span>Add listing</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->

        <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <!--<h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Explore <br></strong> your amazing city</h1>-->
                        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Моя будущая работа</p>
                        <div class="block-17 my-4">
                            <form action="" method="post" class="d-block d-flex">
                                <div class="fields d-block d-flex">
                                    <div class="textfield-search one-third">
                                        <input type="text" class="form-control" placeholder="Ex: food, service, hotel">
                                    </div>
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control" placeholder="Keyword search">
                                            <option value="">Where</option>
                                            <option value="">San Francisco USA</option>
                                            <option value="">Berlin Germany</option>
                                            <option value="">Lodon United Kingdom</option>
                                            <option value="">Paris Italy</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" class="search-submit btn btn-primary" value="Search">  
                            </form>
                        </div>
                        <p>или поискать по</p>
                        <p class="browse d-md-flex">
                            <!--<span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-fork"></i>Restaurant</a></span>-->
                            <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-hotel"></i>Государственной</a></span> 
                            <!--<span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-meeting-point"></i>Places</a></span>--> 
                            <span class="d-flex justify-content-md-center align-items-md-	center"><a href="#"><i class="flaticon-shopping-bag"></i>Частной</a></span>
                        </p>
                    </div>
                    <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div  id = "map" style = "height: 450px;"></div>
<script>
         // Creating map options
        var mapOptions = {
           center: [42.31298,69.72328],
           zoom: 4
        };
         
         // Creating a map object
        var map = new L.map('map', mapOptions);
         
         // Creating a Layer object
        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         // Adding layer to the map
        map.addLayer(layer);
        
        // L.geoJson(myGeoson).addTo(map);
        var marker = L.marker([48.038,70.789]);    // Creating a Marker
        //
        // Adding popup to the marker
         marker.bindPopup('<b>Карагандинская область</b>').openPopup();
         marker.addTo(map); // Adding marker to the map
         
         marker = L.marker([42.340782, 69.596329]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Шымкент</b>').openPopup();
         marker.addTo(map);
         
         marker = L.marker([51.0883143, 71.4461454]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Нур-Султан</b>').openPopup();
         marker.addTo(map);
         
         marker = L.marker([43.25654, 76.92848]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Алматы</b>').openPopup();
         marker.addTo(map);
         
         
         marker = L.marker([52.164,71.691]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Акмолинская область</b>').openPopup();
         marker.addTo(map);
         
         marker = L.marker([50.2833333333, 57.1666666667]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Актюбинская область</b>').openPopup();
         marker.addTo(map);
//         
         marker = L.marker([43.41667, 78.38333]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Алматинская область</b>').openPopup();
         marker.addTo(map);
//         
         marker = L.marker([47.63530685, 51.6639453241291]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Атырауская область</b>').openPopup();
         marker.addTo(map);
//         
         marker = L.marker([49.95649,82.611923]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Восточно-Казахстанская область</b>').openPopup();
         marker.addTo(map);
//         
         marker = L.marker([42.948381,71.410217]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Жамбылская область</b>').openPopup();
         marker.addTo(map);
//         
         marker = L.marker([51.222382,51.373421]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Западно-Казахстанская</b>').openPopup();
         marker.addTo(map);
//         
         
//         
         marker = L.marker([52.949,63.146]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Костанайская область‎</b>').openPopup();
         marker.addTo(map);
//         
         marker = L.marker([43.671845,51.173401]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Мангистауская область</b>').openPopup();
         marker.addTo(map);
//         
         marker = L.marker([52.308479,76.924438]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Павлодарская область‎</b>').openPopup();
         marker.addTo(map);
//         
         marker = L.marker([54.863963,69.157104]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Северо-Казахстанская область‎</b>').openPopup();
         marker.addTo(map);
//         
         marker = L.marker([43.298692,68.26296]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Туркестанская область‎</b>').openPopup();
         marker.addTo(map);
//         
         marker = L.marker([44.879,65.356]);    // Creating a Marker
        // Adding popup to the marker
         marker.bindPopup('<b>Кызылординская область</b>').openPopup();
         marker.addTo(map);
        </script>
                    </div>
                </div>
            </div>
        </div>
        
<br><br>

        <section class="ftco-section services-section bg-light">
            <div class="container">
                <div class="col-md-12">
                    <div class="destination-slider owl-carousel ftco-animate">
                        <div class="item">
                            <div class="destination">
                                <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-1.jpg);">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3">
                                    <h3><a href="#">Paris, Italy</a></h3>
                                    <span class="listing">15 Listing</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="destination">
                                <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-2.jpg);">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3">
                                    <h3><a href="#">San Francisco, USA</a></h3>
                                    <span class="listing">20 Listing</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="destination">
                                <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-3.jpg);">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3">
                                    <h3><a href="#">Lodon, UK</a></h3>
                                    <span class="listing">10 Listing</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="destination">
                                <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-4.jpg);">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3">
                                    <h3><a href="#">Lion, Singapore</a></h3>
                                    <span class="listing">3 Listing</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="destination">
                                <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-5.jpg);">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3">
                                    <h3><a href="#">Australia</a></h3>
                                    <span class="listing">3 Listing</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="destination">
                                <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination-6.jpg);">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="icon-search2"></span>
                                    </div>
                                </a>
                                <div class="text p-3">
                                    <h3><a href="#">Paris, Italy</a></h3>
                                    <span class="listing">3 Listing</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </section>





        <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <h2 class="mb-4">Некоторые факты</h2>
                        <span class="subheading">С помощью нашей системы трудоустроены</span>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <strong class="number" data-number="100000">0</strong>
                                        <span>Программисты</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <strong class="number" data-number="40000">0</strong>
                                        <span>Учителя</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <strong class="number" data-number="87000">0</strong>
                                        <span>Преподаватели</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text">
                                        <strong class="number" data-number="56400">0</strong>
                                        <span>Врачи</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-start mb-5 pb-3">
                    <div class="col-md-7 heading-section ftco-animate">
                        <span class="subheading">Востребованные</span>
                            <h2 class="mb-4"><strong>Профессии</strong></h2>
                    </div>
                </div>    		
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                        <div class="destination">
                            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(data:image/jpeg;base64,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);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="#">Программист-разработчик</a></h3>
                                        <p class="rate">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            <span>8 Rating</span>
                                        </p>
                                    </div>
                                    <div class="two">
                                        <span class="price per-price">$400<br><small>/month</small></span>
                                    </div>
                                </div>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i>Нур-Султан</span> 
                                    <span class="ml-auto"><a href="#">Подробнее</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                        <div class="destination">
                            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(https://apptoday.ru/uploads/images/t8los2019_1.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="#">Системный администратор</a></h3>
                                        <p class="rate">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            <span>8 Rating</span>
                                        </p>
                                    </div>
                                    <div class="two">
                                        <span class="price per-price">$500<br><small>/month</small></span>
                                    </div>
                                </div>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> Алматы</span> 
                                    <span class="ml-auto"><a href="#">Подробнее</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                        <div class="destination">
                            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(data:image/jpeg;base64,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);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="#">Учитель в школе</a></h3>
                                        <p class="rate">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            <span>8 Rating</span>
                                        </p>
                                    </div>
                                    <div class="two">
                                        <span class="price per-price">$200<br><small>/month</small></span>
                                    </div>
                                </div>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> Караганда</span> 
                                    <span class="ml-auto"><a href="#">Подробнее</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                        <div class="destination">
                            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(https://24.kz/media/k2/items/cache/1f90c61b816c5261c00f5491ccd7f8c7_XL.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="#">Врач ВОП</a></h3>
                                        <p class="rate">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            <span>8 Rating</span>
                                        </p>
                                    </div>
                                    <div class="two">
                                        <span class="price per-price">$250<br><small>/month</small></span>
                                    </div>
                                </div>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> Шымкент</span> 
                                    <span class="ml-auto"><a href="#">Подробнее</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                        <div class="destination">
                            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(https://uchitelskaya.kz/assets/uploads/articles/2020/05/%D0%B4%D0%BE%D0%BA%D1%82%D0%BE%D1%80%20%D0%BD%D0%B0%D1%83%D0%BA.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="#">Доктор Phd</a></h3>
                                        <p class="rate">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            <span>8 Rating</span>
                                        </p>
                                    </div>
                                    <div class="two">
                                        <span class="price per-price">$40<br><small>/month</small></span>
                                    </div>
                                </div>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> Шымкент</span> 
                                    <span class="ml-auto"><a href="#">Подробнее</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section testimony-section bg-light">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-md-5 heading-section ftco-animate">
                        <span class="subheading">Best Directory Website</span>
                        <h2 class="mb-4 pb-3"><strong>Why</strong> Choose Us?</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">Read more</a></p>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-6 heading-section ftco-animate">
                        <span class="subheading">Testimony</span>
                        <h2 class="mb-4 pb-3"><strong>Our</strong> Guests Says</h2>
                        <div class="row ftco-animate">
                            <div class="col-md-12">
                                <div class="carousel-testimony owl-carousel">
                                    <div class="item">
                                        <div class="testimony-wrap d-flex">
                                            <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                                <span class="quote d-flex align-items-center justify-content-center">
                                                    <i class="icon-quote-left"></i>
                                                </span>
                                            </div>
                                            <div class="text ml-md-4">
                                                <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                                <p class="name">Dennis Green</p>
                                                <span class="position">Guest from italy</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-wrap d-flex">
                                            <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
                                                <span class="quote d-flex align-items-center justify-content-center">
                                                    <i class="icon-quote-left"></i>
                                                </span>
                                            </div>
                                            <div class="text ml-md-4">
                                                <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                                <p class="name">Dennis Green</p>
                                                <span class="position">Guest from London</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-wrap d-flex">
                                            <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                                                <span class="quote d-flex align-items-center justify-content-center">
                                                    <i class="icon-quote-left"></i>
                                                </span>
                                            </div>
                                            <div class="text ml-md-4">
                                                <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                                <p class="name">Dennis Green</p>
                                                <span class="position">Guest from Philippines</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="ftco-footer ftco-bg-dark ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <div class="ftco-footer-widget">
                            <h2 class="ftco-heading-2">dirEngine</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget">
                            <h2 class="ftco-heading-2">Information</h2>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">About</a></li>
                                <li><a href="#" class="py-2 d-block">Service</a></li>
                                <li><a href="#" class="py-2 d-block">Terms and Conditions</a></li>
                                <li><a href="#" class="py-2 d-block">Become a partner</a></li>
                                <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                                <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget">
                            <h2 class="ftco-heading-2">Customer Support</h2>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                                <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                                <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                                <li><a href="#" class="py-2 d-block">How it works</a></li>
                                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget">
                            <h2 class="ftco-heading-2">Have a Questions?</h2>
                            <div class="block-23 mb-3">
                                <ul>
                                    <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">

                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://epolice.kz" target="_blank">epolice.kz</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </footer>
       <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.animateNumber.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/jquery.timepicker.min.js"></script>
        <script src="js/scrollax.min.js"></script>
        <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>-->
        <!--<script src="js/google-map.js"></script>-->
        <script src="js/main.js"></script>
    </body>
</html>