        <?php 
        $page_id = null;
        $comp_model = new SharedController;
        ?>
        <div  class=" py-5 text-danger">
            <div class="container-fluid">
                <div class="page-header"><h4>WELCOME TO RMS </h4></div>
                <div class="row justify-content-center">
                    <div class="col-md-8 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        
                        <div  class="bg-light p-3 animated bounce page-content">
                            <div>
                                <h4><i class="fa fa-key"></i> User Login</h4>
                                <hr />
                                <?php 
                                $this :: display_page_errors(); 
                                ?>
                                <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
                                    <div class="input-group form-group">
                                        <input placeholder="Email" name="username"  required="required" class="form-control" type="text"  />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="form-control-feedback fa fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group form-group">
                                        <input  placeholder="Password" required="required" v-model="user.password" name="password" class="form-control " type="password" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="form-control-feedback fa fa-key"></i></span>
                                        </div>
                                    </div>
                                    <div class="row clearfix mt-3 mb-3">
                                        <div class="col-6">
                                            <label class="">
                                                <input value="true" type="checkbox" name="rememberme" />
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary btn-block btn-md" type="submit"> 
                                            <i class="load-indicator">
                                                <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader> 
                                            </i>
                                            Login <i class="fa fa-key"></i>
                                        </button>
                                    </div>
                                    <hr />
                                    <div class="text-center">
                                        Don't Have an Account? <a href="<?php print_link("index/register") ?>" class="btn btn-success">Register
                                        <i class="fa fa-user"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div  class="">
            <div class="container">
                <div class="row ">
                    <div class="col-12 comp-grid">
                        <div class=""><div
                            <!DOCTYPE html>
                            <html lang="en" ng-app="app">
                                <head>
                                    <title>RMS</title>
                                    <meta name="description" content="TenantCloud: free cloud-based property management software. Manage rentals, collect rent online, get a marketing website and much more.">
                                        <link rel="canonical" href="https://www.tenantcloud.com/landlord"/>
                                        <meta property="og:title" content="Free Online Rental Property Management Software - TenantCloud" />
                                        <meta property="og:description" content="TenantCloud: free cloud-based property management software. Manage rentals, collect rent online, get a marketing website and much more." />
                                        <meta property="og:url" content="https://www.tenantcloud.com/landlord" />
                                        <meta property="og:site_name" content="TenantCloud" />
                                        <meta property="og:image" content="https://www.tenantcloud.com/images/meta-default-logo.png" />
                                        <meta name="twitter:title" content="Free Online Rental Property Management Software - TenantCloud" />
                                        <meta name="twitter:description" content="TenantCloud: free cloud-based property management software. Manage rentals, collect rent online, get a marketing website and much more." />
                                        <script type="application/ld+json">{"@context":"https:\/\/schema.org","@type":"WebPage","name":"Free Online Rental Property Management Software - TenantCloud","description":"TenantCloud: free cloud-based property management software. Manage rentals, collect rent online, get a marketing website and much more."}</script>
                                        <meta property="fb:app_id" content="" />
                                        <meta name="msapplication-config" content="none"/>
                                        <meta name="msvalidate.01" content="C80CB152733BDF40A78D4B7D5246BDC4" />
                                        <meta name="robots" content="NOODP">
                                            <meta name="robots" content="index, follow"/>
                                            <meta name="p:domain_verify" content="9f6d88fd8e128d4843764d5512b69b20"/>
                                            <link rel="stylesheet" type="text/css" href="style.css">
                                                <script type="text/javascript">
                                                    setTimeout(function(){var a=document.createElement("script");
                                                    var b=document.getElementsByTagName("script")[0];
                                                    a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0032/5015.js?"+Math.floor(new Date().getTime()/3600000);
                                                    a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
                                                </script>
                                                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
                                                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                                                    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
                                                        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
                                                            <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
                                                                <link rel="manifest" href="/site.webmanifest">
                                                                    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#3fa63f">
                                                                        <meta name="msapplication-TileColor" content="#3fa63f">
                                                                            <meta name="theme-color" content="#ffffff">
                                                                                <link rel="stylesheet" type="text/css" href="style.css">
                                                                                    <!-- Latest compiled and minified CSS -->
                                                                                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                                                                                        <!-- jQuery library -->
                                                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                                                        <!-- Popper JS -->
                                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                                                                                        <!-- Latest compiled JavaScript -->
                                                                                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                                                                        <!-- inject vendor.css -->
                                                                                        <link media="all" type="text/css" rel="stylesheet" href="https://cdn.tenantcloud.com/builds/v31.1.14/promo/vendors.css">
                                                                                            <link media="all" type="text/css" rel="stylesheet" href="https://cdn.tenantcloud.com/builds/v31.1.14/promo/style.css">
                                                                                                <!-- Google Tag Manager -->
                                                                                                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                                                                                                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                                                                                                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                                                                                                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                                                                                                    })(window,document,'script','dataLayer','GTM-M82WCZ3');
                                                                                                </script>
                                                                                                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
                                                                                                <!-- End Google Tag Manager -->
                                                                                            </head>
                                                                                            <style type="text/css">
                                                                                                @media only screen and (max-width: 600px) {
                                                                                                .topok{
                                                                                                position: relative;
                                                                                                bottom: 62px;
                                                                                                }
                                                                                                }
                                                                                                @media only screen and (max-width: 750px) {
                                                                                                .topok{
                                                                                                position: relative;
                                                                                                bottom: 62px;
                                                                                                }
                                                                                                }
                                                                                            </style>
                                                                                            <body class=" ">
                                                                                                <!-- Google Tag Manager (noscript) -->
                                                                                                <noscript>
                                                                                                    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M82WCZ3" height="0" width="0" style="display:none;visibility:hidden"></iframe>
                                                                                                </noscript>
                                                                                                <!-- End Google Tag Manager (noscript) -->
                                                                                                <noscript class="noscript">
                                                                                                    <div id="div100">
                                                                                                        For full functionality of this page it is necessary to enable JavaScript.
                                                                                                        Here are the <a href="http://www.enable-javascript.com" target="_blank"> instructions how to enable JavaScript
                                                                                                        in your web browser</a>
                                                                                                    </div>
                                                                                                </noscript>
                                                                                                <!--                                                                              ,,                               ,,
                                                                                                MMP""MM""YMM                                             mm      .g8"""bgd `7MM                             `7MM
                                                                                                P'   MM   `7                                             MM    .dP'     `M   MM                               MM
                                                                                                MM       .gP"Ya  `7MMpMMMb.   ,6"Yb.  `7MMpMMMb.  mmMMmm  dM'       `   MM   ,pW"Wq.  `7MM  `7MM    ,M""bMM
                                                                                                MM      ,M'   Yb   MM    MM  8)   MM    MM    MM    MM    MM            MM  6W'   `Wb   MM    MM  ,AP    MM
                                                                                                MM      8M""""""   MM    MM   ,pm9MM    MM    MM    MM    MM.           MM  8M     M8   MM    MM  8MI    MM
                                                                                                MM      YM.    ,   MM    MM  8M   MM    MM    MM    MM    `Mb.     ,'   MM  YA.   ,A9   MM    MM  `Mb    MM
                                                                                                .JMML.     `Mbmmd' .JMML  JMML.`Moo9^Yo..JMML  JMML.  `Mbmo   `"bmmmd'  .JMML. `Ybmd9'    `Mbod"YML. `Wbmd"MML.
                                                                                                -->
                                                                                                <i id="ng-toggle" class="menu-toggle">
                                                                                                    <span class="icon-bar"></span>
                                                                                                    <span class="icon-bar"></span>
                                                                                                    <span class="icon-bar"></span>
                                                                                                </i>
                                                                                                <div class="wrapper">
                                                                                                    <header class="l-header">
                                                                                                        <div class="container">
                                                                                                            <div class="header">
                                                                                                                <div class="header-tenantcloud-logo" style="visibility: hidden;">
                                                                                                                    <a href="/">
                                                                                                                        <div data-selenium="tenantcloud-logo">
                                                                                                                            <img
                                                                                                                                width="200"
                                                                                                                                class="img-responsive"
                                                                                                                                src="https://cdn.tenantcloud.com/builds/v31.1.14/promo/images/logo-tc/logo-tenantcloud-white.svg"
                                                                                                                                alt=TenantCloud>
                                                                                                                            </div>
                                                                                                                        </a>
                                                                                                                        <div class="logo-title">
                                                                                                                            Rental Accounting and Management
                                                                                                                            <i class="icon-fo tenantcloud-made-ease"></i>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="header-btn has-phone row">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </header>
                                                                                                            <main class="content">
                                                                                                                <div class="landlord parallax">
                                                                                                                    <section class="m-page-section">
                                                                                                                        <div class="container">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-xs-24 col-sm-12">
                                                                                                                                    <div class="element">
                                                                                                                                        <h3 class="section-title">
                                                                                                                                            <i class="title-icon fontello-cog-alt"></i>
                                                                                                                                            <span>Cloud property management software</span>
                                                                                                                                        </h3>
                                                                                                                                        <ul class="m-list list-ok">
                                                                                                                                            <li>
                                                                                                                                                <a ng-click="gotoElement('onlinePayments');">Online payments &amp; full accounting</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a ng-click="gotoElement('ilsSyndication');">Automatic listings &amp; Vacancies marketing</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a ng-click="gotoElement('rentalApplications');">Online rental applications &amp; tenant screening</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a ng-click="gotoElement('contactsManagement');">Contacts management</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a ng-click="gotoElement('teamManagement');">Team Management</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a ng-click="gotoElement('maintenanceRequests');">Maintenance requests &amp; equipment tracking</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a ng-click="gotoElement('rentalAgreements');">Rental agreements, notices &amp; e-sign</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a ng-click="gotoElement('tenantMatch');">Lead generation &amp; Rentler Leads</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a ng-click="gotoElement('printableReports');">On-demand printable reports</a>
                                                                                                                                            </li>
                                                                                                                                            <li>
                                                                                                                                                <a ng-click="gotoElement('rentersInsurance');">Renters insurance tracking</a>
                                                                                                                                            </li>
                                                                                                                                        </ul>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-xs-24 col-sm-12">
                                                                                                                                    <div class="css-screen title">
                                                                                                                                        <div class="screen-head">
                                                                                                                                            <div class="head-buttons"></div>
                                                                                                                                        </div>
                                                                                                                                        <div class="screen-body">
                                                                                                                                            <picture>
                                                                                                                                                <source srcset="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBeVm3bJpcanaQIXs1sJYoetGl6lIQbJAvdw&usqp=CAU">
                                                                                                                                                    <img
                                                                                                                                                        class="img-responsive"
                                                                                                                                                        srcset="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBeVm3bJpcanaQIXs1sJYoetGl6lIQbJAvdw&usqp=CAU"
                                                                                                                                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBeVm3bJpcanaQIXs1sJYoetGl6lIQbJAvdw&usqp=CAU"
                                                                                                                                                        alt="Cloud property management software" width="100%">
                                                                                                                                                    </picture>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </section>
                                                                                                                            <section id="onlinePayments" class="m-page-section is-centered is-white online-payments bg-danger">
                                                                                                                                <div class="container ">
                                                                                                                                    <div class="m-info--column is-white">
                                                                                                                                        <div class="row">
                                                                                                                                            <div class="col-xs-24 col-sm-12">
                                                                                                                                                <div class="column-icon">
                                                                                                                                                    <i class="fontello-credit-card"></i>
                                                                                                                                                </div>
                                                                                                                                                <div class="column-info">
                                                                                                                                                    <h3 class="section-title">
                                                                                                                                                        <span>Online payments</span>
                                                                                                                                                    </h3>
                                                                                                                                                    <p>Collect rent and other payments online. You can accept ACH, PayPal, and any other debit and credit card payments.</p>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-xs-24 col-sm-12">
                                                                                                                                                <div class="column-icon">
                                                                                                                                                    <i class="fontello-dollar"></i>
                                                                                                                                                </div>
                                                                                                                                                <div class="column-info">
                                                                                                                                                    <h3 class="section-title">
                                                                                                                                                        <span>Full accounting</span>
                                                                                                                                                    </h3>
                                                                                                                                                    <p>Store receipts and manage your accounting all in one place. Get financial and rental reports whenever you want.</p>
                                                                                                                                                    <div class="button-section">
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-xs-24 col-sm-4 hidden-xs hidden-sm">
                                                                                                                                            <ul class="section-option is-left title">
                                                                                                                                                <li>Online payments from tenants</li>
                                                                                                                                                <li>Automated management and late fees</li>
                                                                                                                                                <li>Automatic printable receipts</li>
                                                                                                                                                <li>General &amp; property expense tracking</li>
                                                                                                                                                <li>Online payments to vendors</li>
                                                                                                                                            </ul>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-xs-24 col-md-16">
                                                                                                                                            <div class="css-screen title">
                                                                                                                                                <div class="screen-head">
                                                                                                                                                    <div class="head-buttons"></div>
                                                                                                                                                </div>
                                                                                                                                                <div class="screen-body">
                                                                                                                                                    <picture>
                                                                                                                                                        <source srcset="https://cdn.tenantcloud.com/builds/v31.1.14/promo/images/landlord/screen-accounting@1-min.jpg, https://cdn.tenantcloud.com/builds/v31.1.14/promo/images/landlord/screen-accounting@2-min.jpg 2x">
                                                                                                                                                            <img
                                                                                                                                                                class="img-responsive"
                                                                                                                                                                srcset="https://cdn.tenantcloud.com/builds/v31.1.14/promo/images/landlord/screen-accounting@1-min.jpg, https://cdn.tenantcloud.com/builds/v31.1.14/promo/images/landlord/screen-accounting@2-min.jpg 2x"
                                                                                                                                                                src="https://cdn.tenantcloud.com/builds/v31.1.14/promo/images/landlord/screen-accounting@1-min.jpg"
                                                                                                                                                                alt="Online payments &amp; full accounting">
                                                                                                                                                            </picture>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="col-xs-24 col-sm-4 hidden-xs hidden-sm">
                                                                                                                                                    <ul class="section-option is-right title">
                                                                                                                                                        <li>Recurring and one-time invoicing</li>
                                                                                                                                                        <li>Owner distribution and balances</li>
                                                                                                                                                        <li>Multiple bank accounts for properties</li>
                                                                                                                                                        <li>Trust account for tenant deposit</li>
                                                                                                                                                        <li>Tenant rent balance tool</li>
                                                                                                                                                    </ul>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </section>
                                                                                                                                </div>
                                                                                                                            </main>
                                                                                                                        </div>
                                                                                                                        <a class="show" id="go-up" href="#" onclick="return promo.goUp()">
                                                                                                                            <div class="go-up-arrow" data-selenium="go-up-arrow">
                                                                                                                                <span class="fontello-up-open-big"></span>
                                                                                                                            </div>
                                                                                                                        </a>
                                                                                                                        <app-cookie></app-cookie>
                                                                                                                        <!-- Google Code for Remarketing Tag -->
                                                                                                                        <!--------------------------------------------------
                                                                                                                        Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
                                                                                                                        --------------------------------------------------->
                                                                                                                        <script type="text/javascript">
                                                                                                                            /* <![CDATA[ */
                                                                                                                            var google_conversion_id = 957442588;
                                                                                                                            var google_custom_params = window.google_tag_params;
                                                                                                                            var google_remarketing_only = true;
                                                                                                                            /* ]]> */
                                                                                                                        </script>
                                                                                                                        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
                                                                                                                        </script>
                                                                                                                        <noscript>
                                                                                                                            <div style="display:inline;">
                                                                                                                                <img height="1" width="1" style="border-style:none;" alt=""
                                                                                                                                src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/957442588/?value=0&amp;guid=ON&amp;script=0"/>
                                                                                                                            </div>
                                                                                                                        </noscript>
                                                                                                                        <link rel="stylesheet" href="https://use.typekit.net/zgu1trl.css" as="style">
                                                                                                                            <link rel="stylesheet" href="https://use.typekit.net/eqc5doy.css" as="style">
                                                                                                                                <script src="https://cdn.tenantcloud.com/builds/v31.1.14/promo/scripts.bundle.js"></script>
                                                                                                                                <script src="https://cdn.tenantcloud.com/builds/v31.1.14/promo/vendors.bundle.js"></script>
                                                                                                                                <script src="https://cdn.tenantcloud.com/builds/v31.1.14/promo/promo.bundle.js"></script>
                                                                                                                                <script>
                                                                                                                                    (function ($) {
                                                                                                                                    'use strict';
                                                                                                                                    $.Promo.init();
                                                                                                                                    })(window.jQuery);
                                                                                                                                    $(document).ready(function () {
                                                                                                                                    Cargo.Plugins.columnizer.init();
                                                                                                                                    });
                                                                                                                                </script>
                                                                                                                                <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '5be0a023-efd1-448a-a59f-dc1ea1d4ec1b', f: true }); done = true; } }; })();</script>
                                                                                                                            </body>
                                                                                                                        </html>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                