<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Crafto - The Multipurpose HTML5 Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ThemeZaa">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description"
        content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 52+ ready demos.">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="css/vendors.min.css" />
    <link rel="stylesheet" href="css/icon.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="demos/consulting/consulting.css" />
</head>

<body data-mobile-nav-style="classic">
    <?php include 'layouts/header.php'; ?>
    <!-- start page title -->
    <section class="page-title-big-typography bg-dark-gray ipad-top-space-margin xs-py-0"
        data-parallax-background-ratio="0.5" style="background-image: url(https://placehold.co/1925x1050)">
        <div class="opacity-light bg-dark-gray"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center small-screen">
                <div class="col-lg-6 col-md-8 position-relative text-center page-title-extra-small"
                    data-anime='{ "el": "childs", "rotateX": [90, 0], "opacity": [0,1], "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <h1 class="mb-5px alt-font text-white fw-400"><span class="opacity-6">Love to hear from you</span>
                    </h1>
                    <h2 class="mb-0 text-white alt-font ls-minus-2px text-shadow-double-large fw-500">Contact us</h2>
                </div>
                <div class="down-section text-center"
                    data-anime='{ "translateY": [100, 0], "opacity": [0,1], "easing": "easeOutQuad" }'>
                    <a href="#down-section" class="section-link">
                        <div class="fs-30 sm-fs-32 text-white">
                            <i class="bi bi-mouse"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <section id="down-section">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 row-cols-sm-2 justify-content-center"
                data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                <!-- start features box item -->
                <div class="col icon-with-text-style-04 sm-mb-40px">
                    <div class="feature-box last-paragraph-no-margin">
                        <div class="feature-box-icon">
                            <i class="line-icon-Geo2-Love icon-extra-large text-base-color mb-25px"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-600 text-dark-gray mb-5px fs-20">Crafto
                                office</span>
                            <p>401 Broadway, 24th Floor,<br> Orchard View, London, UK</p>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-04 sm-mb-40px">
                    <div class="feature-box last-paragraph-no-margin">
                        <div class="feature-box-icon">
                            <i class="line-icon-Headset icon-extra-large text-base-color mb-25px"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-600 text-dark-gray mb-5px fs-20">Call us
                                directly</span>
                            <div class="w-100 d-block">
                                <span class="d-block">Phone: <a href="tel:1800222000"
                                        class="text-base-color-hover">1-800-222-000</a></span>
                                <span class="d-block">Fax: 1-800-222-002</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
                <!-- start features box item -->
                <div class="col icon-with-text-style-04">
                    <div class="feature-box last-paragraph-no-margin">
                        <div class="feature-box-icon">
                            <i class="line-icon-Mail-Read icon-extra-large text-base-color mb-25px"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="d-inline-block alt-font fw-600 text-dark-gray mb-5px fs-20">E-mail us</span>
                            <div class="w-100 d-block">
                                <a href="mailto:info@yourdomain.com" class="d-block">info@yourdomain.com</a>
                                <a href="mailto:hr@yourdomain.com" class="d-block">hr@yourdomain.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end features box item -->
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="p-0" id="location"
        data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 p-0">
                    <div id="map" class="map"
                        data-map-options='{ "lat": -37.805688, "lng": 144.962312, "style": "Silver", "marker": { "type": "HTML", "color": "#dd6531" }, "popup": { "defaultOpen": true, "html": "<div class=infowindow><strong class=\"mb-3 d-inline-block alt-font\">Crafto Consulting</strong><p class=\"alt-font\">16122 Collins street, Melbourne, Australia</p></div><div class=\"google-maps-link alt-font\"> <a aria-label=\"View larger map\" target=\"_blank\" jstcache=\"31\" href=\"https://maps.google.com/maps?ll=-37.805688,144.962312&amp;z=17&amp;t=m&amp;hl=en-US&amp;gl=IN&amp;mapclient=embed&amp;cid=13153204942596594449\" jsaction=\"mouseup:placeCard.largerMap\">VIEW LARGER MAP</a></div>" } }'>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="bg-very-light-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center mb-2"
                    data-anime='{ "el": "childs", "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                    <span class="fw-600 ls-1px fs-16 alt-font d-inline-block text-uppercase mb-5px text-base-color">Feel
                        free to get in touch!</span>
                    <h2 class="alt-font text-dark-gray fw-600 ls-minus-2px">How we can help you?</h2>
                </div>
            </div>
            <div class="row row-cols-md-1 justify-content-center"
                data-anime='{ "translateY": [100, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                <div class="col-xl-9 col-lg-11">
                    <!-- start contact form -->
                    <form action="api/contact-form" method="post" class="row contact-form-style-02">
                        <div class="col-md-6 mb-30px">
                            <input class="box-shadow-quadruple-large input-name form-control required" type="text"
                                name="name" placeholder="Your name*" />
                        </div>
                        <div class="col-md-6 mb-30px">
                            <input class="box-shadow-quadruple-large form-control required" type="email" name="email"
                                placeholder="Your email address*" />
                        </div>
                        <div class="col-md-6 mb-30px">
                            <input class="box-shadow-quadruple-large form-control" type="tel" name="phone"
                                placeholder="Your phone" />
                        </div>
                        <div class="col-md-6 mb-30px">
                            <input class="box-shadow-quadruple-large form-control" type="text" name="subject"
                                placeholder="Your subject" />
                        </div>
                        <div class="col-md-12 mb-30px">
                            <textarea class="box-shadow-quadruple-large form-control" cols="40" rows="4" name="comment"
                                placeholder="Your message"></textarea>
                        </div>
                        <div class="col-md-7 last-paragraph-no-margin">
                            <p class="text-center text-md-start fs-16">We are committed to protecting your privacy. We
                                will never collect information about you without your explicit consent.</p>
                        </div>
                        <div class="col-md-5 text-center text-md-end sm-mt-20px">
                            <input type="hidden" name="redirect" value="">
                            <button class="btn btn-medium btn-dark-gray btn-box-shadow btn-round-edge submit"
                                type="submit">send message</button>
                        </div>
                        <div class="col-12">
                            <div class="form-results mt-20px d-none"></div>
                        </div>
                    </form>
                    <!-- end contact form -->
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <?php include 'layouts/footer.php'; ?>
    <!-- javascript libraries -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/vendors.min.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA56KqSJ11nQUw_tXgXyNMiPmQeM7EaSA&callback=initMap"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>