 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <?php require_once('config.php') 
    ?>
 


    <title>Food Print</title>

    <link href="static/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="static/css/fullpage.css" />
    <link rel="stylesheet" type="text/css" href="static/css/examples.css" />
    <link rel="stylesheet" type="text/css" href="static/css/portfolio.css" />
    <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" /> -->

    <style>
        .text-white {
            color: #fff!important;
        }
        
        h4 {
            font-size: 1.55em;
            color: #fff!important;
        }
        
        .bg-primary {
            background-color: #1d809f!important;
        }
        
        .service-icon {
            color: #0e1619f2!important;
        }
        
        .content-section {
            padding-top: 7.5rem;
            padding-bottom: 7.5rem;
        }
        
        .content-section-heading h3 {
            font-size: 1.2rem;
            text-transform: uppercase;
        }
        
        .mb-3,
        .my-3 {
            margin-bottom: 1rem!important;
        }
        
        .rounded-circle {
            border-radius: 50%!important;
        }
        
        element.style {}
        
        @media (min-width: 1200px) .container {
            max-width: 1140px;
        }
        
        @media (min-width: 992px) .container {
            max-width: 960px;
        }
        
        @media (min-width: 768px) .container {
            max-width: 720px;
        }
        
        @media (min-width: 576px) .container {
            max-width: 540px;
        }
        
        .container3 {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            /*background-color: #1d809f!important;*/
        }
        
        @media (min-width: 992px) .mb-lg-0,
        .my-lg-0 {
            margin-bottom: 0!important;
        }
        
        .mb-5,
        .my-5 {
            margin-bottom: 3rem!important;
        }
        
        @media (min-width: 992px) .col-lg-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
        }
        
        @media (min-width: 768px) .col-md-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }
        
        .col,
        .col-1,
        .col-10,
        .col-11,
        .col-12,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-auto,
        .col-lg,
        .col-lg-1,
        .col-lg-10,
        .col-lg-11,
        .col-lg-12,
        .col-lg-2,
        .col-lg-3,
        .col-lg-4,
        .col-lg-5,
        .col-lg-6,
        .col-lg-7,
        .col-lg-8,
        .col-lg-9,
        .col-lg-auto,
        .col-md,
        .col-md-1,
        .col-md-10,
        .col-md-11,
        .col-md-12,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-auto,
        .col-sm,
        .col-sm-1,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-auto,
        .col-xl,
        .col-xl-1,
        .col-xl-10,
        .col-xl-11,
        .col-xl-12,
        .col-xl-2,
        .col-xl-3,
        .col-xl-4,
        .col-xl-5,
        .col-xl-6,
        .col-xl-7,
        .col-xl-8,
        .col-xl-9,
        .col-xl-auto {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }
        /* Style for our header texts
                    * --------------------------------------- */
        
        h1 {
            font-size: 5em;
            font-family: arial, helvetica;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        /* Centered texts in each section
                    * --------------------------------------- */
        
        .section {
            text-align: center;
        }
        /* Backgrounds will cover all the section
                    * --------------------------------------- */
        
        #section0,
        #section1,
        #section2,
        #section3,
        #slide1,
        #slide2,
        #slide3,
        #slide4 {
            background-size: cover;
            background-attachment: fixed;
        }
        /* Defining each sectino background and styles
                    * --------------------------------------- */
        
        #section0 {
            background-image: url('static/images/page1.jpg');
        }
        
        #section0 h1 {
            top: 50%;
            transform: translateY(-50%);
            position: relative;
        }
        
        #section3 {
            /*background-image: url(imgs/bg4.jpg);*/
            background-color: #0e1619f2!important;
            padding: 6% 0 0 0;
        }
        
        #section3 h1 {
            color: #000;
        }
        
        #section4,
        #section5 {
            background-image: repeating-linear-gradient(-45deg, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25) 1px, transparent 1px, transparent 6px);
            background-size: 8px 8px;
        }
        
        p {
            font-size: 1.2em;
        }
        /*.bg-primary {
            background-color: #1d809f!important;
        }
        .content-section {
            padding-top: 7.5rem;
            padding-bottom: 7.5rem;
        }
        .text-white {
            color: #fff!important;
        }
        .text-center {
            text-align: center!important;
        }*/
        /*Adding background for the slides
                        * --------------------------------------- */
        
        #slide1 {
            background-image: url('https://i.postimg.cc/FKPfpNdG/fact1.png');
            padding: 6% 0 0 0;
        }
        
        #slide2 {
            background-image: url('https://i.postimg.cc/wMkY5T3j/fact2.png');
            padding: 6% 0 0 0;
        }
        
        #slide3 {
            background-image: url('https://i.postimg.cc/RVnDz0v6/fact-3.png');
            padding: 6% 0 0 0;
        }
        
        .downArrow {
            position: absolute;
            bottom: 45%;
            left: 50%;
            top: 90%;
        }
        
        .bounce {
            -moz-animation: bounce 3s infinite;
            -webkit-animation: bounce 3s infinite;
            animation: bounce 3s infinite;
        }
        
        @-moz-keyframes bounce {
            0%,
            20%,
            50%,
            80%,
            100% {
                -moz-transform: translateY(0);
                transform: translateY(0);
            }
            40% {
                -moz-transform: translateY(-30px);
                transform: translateY(-30px);
            }
            60% {
                -moz-transform: translateY(-15px);
                transform: translateY(-15px);
            }
        }
        
        @-webkit-keyframes bounce {
            0%,
            20%,
            50%,
            80%,
            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
            40% {
                -webkit-transform: translateY(-30px);
                transform: translateY(-30px);
            }
            60% {
                -webkit-transform: translateY(-15px);
                transform: translateY(-15px);
            }
        }
        
        @keyframes bounce {
            0%,
            20%,
            50%,
            80%,
            100% {
                -moz-transform: translateY(0);
                -ms-transform: translateY(0);
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
            40% {
                -moz-transform: translateY(-30px);
                -ms-transform: translateY(-30px);
                -webkit-transform: translateY(-30px);
                transform: translateY(-30px);
            }
            60% {
                -moz-transform: translateY(-15px);
                -ms-transform: translateY(-15px);
                -webkit-transform: translateY(-15px);
                transform: translateY(-15px);
            }
        }
        /*bounce left*/
        
        @-webkit-keyframes bounceLeft {
            0%,
            20%,
            50%,
            80%,
            100% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }
            40% {
                -webkit-transform: translateX(30px);
                transform: translateX(30px);
            }
            60% {
                -webkit-transform: translateX(15px);
                transform: translateX(15px);
            }
        }
        
        @-moz-keyframes bounceLeft {
            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateX(0);
            }
            40% {
                transform: translateX(30px);
            }
            60% {
                transform: translateX(15px);
            }
        }
        
        @keyframes bounceLeft {
            0%,
            20%,
            50%,
            80%,
            100% {
                -ms-transform: translateX(0);
                transform: translateX(0);
            }
            40% {
                -ms-transform: translateX(30px);
                transform: translateX(30px);
            }
            60% {
                -ms-transform: translateX(15px);
                transform: translateX(15px);
            }
        }
        /* /left bounce */
        /* right bounce */
        
        @-webkit-keyframes bounceRight {
            0%,
            20%,
            50%,
            80%,
            100% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }
            40% {
                -webkit-transform: translateX(-30px);
                transform: translateX(-30px);
            }
            60% {
                -webkit-transform: translateX(-15px);
                transform: translateX(-15px);
            }
        }
        
        @-moz-keyframes bounceRight {
            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateX(0);
            }
            40% {
                transform: translateX(-30px);
            }
            60% {
                transform: translateX(-15px);
            }
        }
        
        @keyframes bounceRight {
            0%,
            20%,
            50%,
            80%,
            100% {
                -ms-transform: translateX(0);
                transform: translateX(0);
            }
            40% {
                -ms-transform: translateX(-30px);
                transform: translateX(-30px);
            }
            60% {
                -ms-transform: translateX(-15px);
                transform: translateX(-15px);
            }
        }
        /* /right bounce */
        
        .fp-controlArrow.fp-prev {
            left: 15px;
            width: 0;
            border-width: 17.5px 18px 17.5px 0;
            border-color: transparent #a27fe0de transparent transparent;
            -webkit-animation: bounceLeft 2s infinite;
            animation: bounceLeft 2s infinite;
        }
        /*right arrow for scrolling*/
        
        .fp-controlArrow.fp-next {
            right: 15px;
            border-width: 17.5px 0 17.5px 18px;
            border-color: transparent transparent transparent #a27fe0de;
            -webkit-animation: bounceRight 2s infinite;
            animation: bounceRight 2s infinite;
            float: right;
        }
        
        .quote {
            color: #0e1619f2!important;
            font-family: inherit;
            font-size: 44px;
            background-color: #e2dedecf;
            padding-left: 20px;
            padding-right: 20px;
            position: absolute;
            top: 30%;
            left: 30%;
            font-style: normal;
            font-weight: 100;
        }
        
        .quote1 {
            color: #0e1619f2!important;
            font-family: inherit;
            font-size: 34px;
            padding-left: 20px;
            padding-right: 20px;
            position: absolute;
            top: 63%;
            left: 49%;
            font-style: normal;
            font-weight: 100;
        }
        
        .hvrbox,
        .hvrbox * {
            box-sizing: border-box;
        }
        
        .hvrbox {
            position: relative;
            display: inline-block;
            overflow: hidden;
            max-width: 100%;
            height: auto;
            top: 25%;
            /*margin:auto;*/
        }
        
        .hvrbox img {
            max-width: 100%;
        }
        
        .hvrbox .hvrbox-layer_bottom {
            display: block;
        }
        
        .hvrbox .hvrbox-layer_top {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.75);
            color: #fff;
            padding: 5px;
            -moz-transition: all 0.4s ease-in-out 0s;
            -webkit-transition: all 0.4s ease-in-out 0s;
            -ms-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s;
        }
        
        .hvrbox:hover .hvrbox-layer_top,
        .hvrbox.active .hvrbox-layer_top {
            opacity: 1;
        }
        
        .hvrbox .hvrbox-text {
            text-align: center;
            font-size: 35px;
            font-family: inherit;
            color: white!important;
            display: inline-block;
            position: absolute;
            top: 50%;
            left: 50%;
            font-weight: 100;
            -moz-transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        
        .hvrbox .hvrbox-text1 {
            text-align: right;
            font-size: 35px;
            font-family: inherit;
            color: white!important;
            display: inline-block;
            position: absolute;
            top: 80%;
            left: 60%;
            font-weight: 100;
            /*-moz-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);*/
        }
        
        .hvrbox .hvrbox-text_mobile {
            font-size: 15px;
            border-top: 1px solid rgb(179, 179, 179);
            /* for old browsers */
            border-top: 1px solid rgba(179, 179, 179, 0.7);
            margin-top: 5px;
            padding-top: 2px;
            display: none;
        }
        
        .hvrbox.active .hvrbox-text_mobile {
            display: block;
        }
        
        .service-icon .icon-speech:hover,
        .icon-graph:hover,
        .icon-pie-chart:hover,
        .icon-support:hover {
            font-size: 1.4em;
            transition: 0.5s ease-out;
        }
        
        .service_item {
            text-align: center;
            border: 1px solid #eee;
            background: repeating-linear-gradient(-45deg, rgb(235, 241, 171), rgb(235, 241, 171) 1px, #fffffffa 1px, #fffffffc 6px);
            padding: 40px;
            margin-bottom: 30px;
            -webkit-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            transition: all 300ms ease
        }
        
        .service_item i {
            color: #222;
            font-size: 42px;
            margin-bottom: 30px;
            display: block
        }
        
        .service_item h4 {
            color: #0e1619f2!important;
            font-size: 21.2px!important;
            font-family: poppins, sans-serif;
            margin-bottom: 20px
        }
        
        .service_item1 h4 {
            color: #0e1619f2!important;
            font-size: 32px!important;
            font-family: poppins, sans-serif;
            margin-bottom: 4px!important
        }
        .service_item p {
            margin-bottom: 0;
            color: #777;
            line-height: 24px;
            font-size: 16px!important;
            color: black;
        }
        
        .service_item:hover {
            background: #ffeb62;
        }
        
        .service_item:hover p {
            color: #222
        }
        
        .main_title h2 {
            font-size: 36px;
            font-weight: 600;
            color: white;
            font-family: poppins, sans-serif;
            margin-bottom: 10px;
            padding-top: 5%!important;
        }
        
        #section6 {
            background-color: #0e1619f2!important;
        }
    </style>    

    <!-- Start WOWSlider.com HEAD section -->
    <!-- add to the <head> of your page -->
    <link rel="stylesheet" type="text/css" href="static/engine0/style.css" />
    <script type="text/javascript" src="static/engine0/jquery.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <!-- End WOWSlider.com HEAD section -->
    <!-- navbar -->
    

    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,700);
            
        
        @font-face {
            font-family: "untitled-font-1";
            src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/untitled-font-1.eot");
            src: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/untitled-font-1.eot#iefix") format("embedded-opentype"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/untitled-font-1.woff") format("woff"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/untitled-font-1.ttf") format("truetype"), url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/untitled-font-1.svg#untitled-font-1") format("svg");
            font-weight: normal;
            font-style: normal;
        }
        
        [class^="icon-"]:after,
        [class*=" icon-"]:after {
            font-family: "untitled-font-1";
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            speak: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        .icon-up-open-big {
            display: inline-block;
        }
        
        .icon-up-open-big:after {
            content: "a";
            font-size: 2.5em;
            display: block;
            -webkit-transform: rotateX(180deg);
            transform: rotateX(180deg);
            color: black;
            -webkit-transition: color .3s;
            transition: color .3s;
        }
        
        .icon-up-open-big:hover:after {
            color: white;
        }
        
        .scroll-icon {
            position: absolute;
            left: 50%;
            bottom: 30px;
            padding: 0 10px;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
        }
        /* HELPER CLASSES
                –––––––––––––––––––––––––––––––––––––––––––––––––– */
        
        .clearfix:before,
        .clearfix:after {
            content: "";
            display: table;
        }
        
        .clearfix:after {
            clear: both;
        }
        
        .l-left {
            float: left;
        }
        
        .l-right {
            float: right;
        }
        
        .end {
            margin-top: 30px;
            font-size: 3em;
            font-weight: bold;
            opacity: 0;
            -webkit-transform: translateY(300px);
            -ms-transform: translateY(300px);
            transform: translateY(300px);
            -webkit-transition: opacity, -webkit-transform 1s;
            transition: opacity, transform 1s;
            -webkit-transition-delay: 1s;
            transition-delay: 1s;
        }
                    /* RESET-GENERAL STYLES
            –––––––––––––––––––––––––––––––––––––––––––––––––– */
                    /** {
                margin: 0;
                padding: 0;
                font-family: 'Alegreya Sans', Arial, sans-serif;
                text-transform: uppercase;
            }

            html {
                font-size: 62.5%;
            }

            body {
                color: black;
                letter-spacing: .18em;
            }

            a {
                text-decoration: none;
                color: white;
            }

            ul, li {
                list-style-type: none;
            }*/
                    /* NAV STYLES
            –––––––––––––––––––––––––––––––––––––––––––––––––– */
                    
        .header-top {
            background: rgba(8, 13, 16, 0.71);
            height: 40px;
            padding: 0 10px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100!important;
            box-sizing: border-box;
        }
                    /*h1 {
                line-height: 70px;
                height: 70px;
            }

            h1 a {
                display: block;
                padding: 0 10px;
            }*/
        
        .toggle-menu {
            width: 50px;
            height: 50px;
            display: inline-block;
            position: relative;
            top: 0px;
        }
        
        .toggle-menu i {
            position: absolute;
            display: block;
            height: 2px;
            background: white;
            width: 30px;
            left: 10px;
            -webkit-transition: all .3s;
            transition: all .3s;
        }
        
        .toggle-menu i:nth-child(1) {
            top: 14%;
        }
        
        .toggle-menu i:nth-child(2) {
            top: 31%;
        }
        
        .toggle-menu i:nth-child(3) {
            top: 49%;
        }
        
        .open-menu i:nth-child(1) {
            top: 25px;
            -webkit-transform: rotateZ(45deg);
            transform: rotateZ(45deg);
        }
        
        .open-menu i:nth-child(2) {
            background: transparent;
        }
        
        .open-menu i:nth-child(3) {
            top: 25px;
            -webkit-transform: rotateZ(-45deg);
            transform: rotateZ(-45deg);
        }
        
        nav {
            height: 0;
            opacity: 0;
            box-sizing: border-box;
            background: rgba(0, 47, 77, .25);
            position: fixed;
            top: 40px;
            width: 100%;
            -webkit-transition: all 3s;
            transition: all 3s;
        }
        
        .open-menu ~ nav {
            opacity: 1;
            padding: 80px 0;
            z-index: 15;
            height: calc(110vh - 70px);
        }
        
        nav ul {
            padding: 0 10px;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }
        
        nav li {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }
        
        nav li a {
            font-size: 2em;
            display: block;
            padding: 30px;
            text-align: center;
            -webkit-transition: background .3s;
            transition: background .3s;
        }
        
        nav li:nth-child(odd) a,
        body.fp-viewing-fifthSection-1 #menu li:nth-child(5) a {
            background: #962D3E;
        }
        
        nav li:nth-child(even) a {
            background: #aa3346;
        }
        
        nav li:nth-child(odd) a:hover {
            background: #9e2f41;
        }
        
        nav li:nth-child(even) a:hover {
            background: #c53c52;
        }
        
        nav li.active a,
        body.fp-viewing-fifthSection-1 #menu li:last-child a {
            background: #453659;
        }
        /* SLIDENAV STYLES - fullPage.js 
            –––––––––––––––––––––––––––––––––––––––––––––––––– */
        
        #fp-nav ul li a span,
        .fp-slidesNav ul li a span {
            background: white;
            width: 8px;
            height: 8px;
            margin: -4px 0 0 -4px;
        }
        
        #fp-nav ul li a.active span,
        .fp-slidesNav ul li a.active span,
        #fp-nav ul li:hover a.active span,
        .fp-slidesNav ul li:hover a.active span {
            width: 16px;
            height: 16px;
            margin: -8px 0 0 -8px;
            background: transparent;
            box-sizing: border-box;
            border: 1px solid #24221F;
        }
        /* MQ STYLES
            –––––––––––––––––––––––––––––––––––––––––––––––––– */
        
        @media screen and (max-width: 767px) {
            nav ul {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -webkit-flex-direction: column;
                -ms-flex-direction: column;
                flex-direction: column;
            }
            nav li {
                margin-top: 1px;
            }
            nav li a {
                font-size: 1.5em;
            }
            .scroll-icon {
                display: none;
            }
        }
        
        @media screen and (max-width: 400px) {
            html {
                font-size: 50%;
            }
            .open-menu ~ nav {
                padding: 20px 0;
            }
            nav li a {
                padding: 3px;
            }
        }
        
        .header-top h5 {
            font-family: unset;
            color: white;
            font-size: 25px!important;
            font-weight: 200;
            padding-top: 4px;
        }
        #menu{
            position: initial!important;
            z-index: 999;
            
        }
        nav{
            z-index: 100!important;
        }
        #menu a{
            font-size: 25px!important;
            font-family: inherit!important;
        }
        header{
            z-index: 9999999;
        }
        span{
            z-index: 0!important;
        }
        figure {
  position: relative;
  display: inline-block;
  overflow: hidden;
  width: 136px; height: 148px;
  margin-right: 30px;
  margin-top: 10px;
background-image:    repeating-linear-gradient(-45deg, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25) 1px, transparent 1px, transparent 6px);

}

/** Hexagon Mask **/
figure:before {
  z-index: 3;
  position: absolute;
  display: block;
  content: '';
  top: 0; left: 0;
  width: 100%; height: 100%;
  /*background: url(https://leadergamer.com.tr/wp-content/themes/lgm/images/team-mask-1.png) no-repeat;*/
  pointer-events: none;
}
figure img {
  display: block;
  width: auto; height: 100%;
}

/** Contact Links **/
figure .contact {
  z-index: 2;
  position: absolute;
  display: block;
  top: 0; left: 0; right: 0; bottom: 0;
}
.contact a {
  background-image: url('static/images/linkedin.png');
  background-size: cover;
}
figure .contact a {
  position: absolute;
  display: block;
  width: 50%; height: 50%;
  background-repeat: no-repeat;
  transition: all .25s ease-in-out;
}
  figure .contact .tw {
    top: 0; left: 0;
    background-color: rgba(0, 172, 238, .7);
    background-position: 30px 32px;
    transform: translate(-100%, -100%);
  }
    figure .contact .tw:hover {
      background-color: rgba(0, 172, 238, 1);
    }
  figure .contact .fb {
    top: 0; right: 0;
    background-color: rgba(59, 89, 152, .7);
    background-position: -42px 32px;
    transform: translate(100%, -100%);
  }
    figure .contact .fb:hover {
      background-color: rgba(59, 89, 152, 1);
    }
  figure .contact .gp {
    bottom: 0; left: 0;
    background-color: rgba(221, 75, 57, .7);
    background-position: 30px -40px;
    transform: translate(-100%, 100%);
  }
    figure .contact .gp:hover {
      background-color: rgba(221, 75, 57, 1);
    }
  figure .contact .ma {
    bottom: 0; right: 0;
    background-color: rgba(153, 153, 153, .7);
    background-position: -42px -40px;
    transform: translate(100%, 100%);
  }
    figure .contact .ma:hover {
      background-color: rgba(153, 153, 153, 1);
    }
    figure:hover .contact a {
      transform: translate(0, 0);
    }
    #section7 h1{
        color: :#fff!important;

    }
    .container7{
        padding-top: 40px;
        height: 100%;
        width: 100%;
           background-color: #f5f8f9 !important;
    /*background-image:          repeating-linear-gradient(-45deg, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25) 1px, transparent 1px, transparent 6px);
*/
    }
    .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 15px!important;
    padding-left: 15px!important;
}

    /*----------------------------------
  Form Input
------------------------------------*/
/* Form Input v1 */
.s-form-v1__input {
  height: 3.375rem;
  color: #fff;
  font-size: 0.875rem;
  font-weight: 300;
  background: transparent;
  border-color: #fff;
  border-right: none;
  box-shadow: none;
  letter-spacing: .1rem;
  text-transform: uppercase;
  padding: .625rem 2.5rem;
}

.s-form-v1__input::-webkit-input-placeholder {
  color: #fff;
}

.s-form-v1__input::-moz-placeholder {
  color: #fff;
}

.s-form-v1__input:-ms-input-placeholder {
  color: #fff;
}

.s-form-v1__input::placeholder {
  color: #fff;
}

.s-form-v1__input:focus {
  box-shadow: none;
  border-color: #fff;
  background: rgba(255, 255, 255, 0.1);
}

/* Form Input v2 */
.s-form-v2__input {
  height: 3.5rem;
  font-size: 0.875rem;
  font-weight: 300;
  color: #656565;
  border: none;
  box-shadow: none;
  letter-spacing: .1rem;
  text-transform: uppercase;
  padding: .625rem 1.25rem;
  transition-duration: 300ms;
  transition-property: all;
  transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);
}

.s-form-v2__input::-webkit-input-placeholder {
  color: #656565;
}

.s-form-v2__input::-moz-placeholder {
  color: #656565;
}

.s-form-v2__input:-ms-input-placeholder {
  color: #656565;
}

.s-form-v2__input::placeholder {
  color: #656565;
}

.s-form-v2__input:focus {
  font-weight: 400;
  color: #656565;
  box-shadow: none;
  transition-duration: 300ms;
  transition-property: all;
  transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);
}

.s-form-v2__input:focus::-webkit-input-placeholder {
  color: #656565;
}

.s-form-v2__input:focus::-moz-placeholder {
  color: #656565;
}

.s-form-v2__input:focus:-ms-input-placeholder {
  color: #656565;
}

.s-form-v2__input:focus::placeholder {
  color: #656565;
}

.g-radius--50 {
    border-radius: 3.125rem !important;
}
.g-padding-x-80--xs {
    padding-left: 2.5rem;
    padding-right: 2.5rem;
}

.g-radius--50 {
    border-radius: 3.125rem !important;
}
.s-btn--primary-bg {
    color: #fff;
    background: #1D2B64;
    border-width: 0.0625rem;
    border-style: solid;
    border-color: #1D2B64;
}
.s-btn--md {
    font-size: 0.8125rem;
    font-weight: 400;
    /*padding: 1rem 2.5rem;*/
}
.s-btn {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    border: none;
    white-space: nowrap;
    touch-action: manipulation;
    cursor: pointer;
    user-select: none;
    transition-duration: 300ms;
    transition-property: all;
    transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);
}
.text-uppercase {
    text-transform: uppercase;
    font-size: 1.5em!important;
    padding-bottom: 10px;
}
.g-radius--10 {
    border-radius: 0.625rem !important;
}
textarea.form-control {
    height: auto;
}

.g-padding-y-20--xs {
    padding-top: 1.25rem;
    padding-bottom: 1.25rem;
}
.g-bg-color--sky-light {
    background-color: #f5f8f9 !important;
}
.g-margin-b-20--xs {
    margin-bottom: 1.25rem;
}


.s-back-to-top.-zoom-out {
    opacity: .6;
}
.s-back-to-top.-is-visible {
    bottom: 3.125rem;
    opacity: .8;
}
.s-back-to-top {
    position: fixed;
    right: 3.125rem;
    bottom: -3.125rem;
    display: block;
    width: 1.875rem;
    height: 3rem;
    z-index: 9;
    background: #1D2B64;
    border-radius: 3.125rem;
    text-align: center;
    transition-duration: 300ms;
    transition-property: all;
    transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);
}


.fotter a {
    color: #1D2B64;
    text-decoration: none;
       font-size: 18px;
}
#scroll {
    position:fixed;
    right:10px;
    bottom:10px;
    cursor:pointer;
    width:50px;
    height:50px;
    background-color:#3498db;
    text-indent:-9999px;
    display:none;
    -webkit-border-radius:60px;
    -moz-border-radius:60px;
    border-radius:60px
}
#scroll span {
    position:absolute;
    top:50%;
    left:50%;
    margin-left:-8px;
    margin-top:-12px;
    height:0;
    width:0;
    border:8px solid transparent;
    border-bottom-color:#ffffff;
}
#scroll:hover {
    background-color:#e74c3c;
    opacity:1;filter:"alpha(opacity=100)";
    -ms-filter:"alpha(opacity=100)";
}
    </style>
</head>

<body>

 
    <header>
        <div class="header-top clearfix">
            <h5 class="l-left"><a href="#firstSection" style="font-weight: 600;color: white;"><i class="fa fa-paw"></i>Food Print</a></h5>        
            <h5 class="l-right"><a href="demo.php" style="font-weight: 400;padding-right: 7px;color: white;">Demo</a>  |  <a href="login.php" style="font-weight: 400;padding-right: 15px;padding-left: 5px;color: white;">Log In</a></h5>

            <!-- <h5 class="l-right"><a href="demo.php" style="padding-right: 10px;color: white;">Demo</a><a href="login.php" style="color: white;">Log In</a><a class="l-right toggle-menu" href="#">
                <i></i>
                <i></i>
                <i></i>
            </a></h5> -->

        </div>

    </header>
    <a href="#Home" id="scroll" style="display: none;"><span></span></a>
    <div id="fullpage">
        <div class="section " id="section0">
            <h1></h1></div>
        <div class=" bounce">
            <img class="downArrow" width="40" height="40" alt="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik0yOTMuNzUxLDQ1NS44NjhjLTIwLjE4MSwyMC4xNzktNTMuMTY1LDE5LjkxMy03My42NzMtMC41OTVsMCwwYy0yMC41MDgtMjAuNTA4LTIwLjc3My01My40OTMtMC41OTQtNzMuNjcyICBsMTg5Ljk5OS0xOTBjMjAuMTc4LTIwLjE3OCw1My4xNjQtMTkuOTEzLDczLjY3MiwwLjU5NWwwLDBjMjAuNTA4LDIwLjUwOSwyMC43NzIsNTMuNDkyLDAuNTk1LDczLjY3MUwyOTMuNzUxLDQ1NS44Njh6Ii8+DQo8cGF0aCBmaWxsPSIjRkZGRkZGIiBkPSJNMjIwLjI0OSw0NTUuODY4YzIwLjE4LDIwLjE3OSw1My4xNjQsMTkuOTEzLDczLjY3Mi0wLjU5NWwwLDBjMjAuNTA5LTIwLjUwOCwyMC43NzQtNTMuNDkzLDAuNTk2LTczLjY3MiAgbC0xOTAtMTkwYy0yMC4xNzgtMjAuMTc4LTUzLjE2NC0xOS45MTMtNzMuNjcxLDAuNTk1bDAsMGMtMjAuNTA4LDIwLjUwOS0yMC43NzIsNTMuNDkyLTAuNTk1LDczLjY3MUwyMjAuMjQ5LDQ1NS44Njh6Ii8+DQo8L3N2Zz4=" />
        </div>
<div class="section pattern" id="section4">

            <div class="hvrbox ">
                <img src="static\images\trashbkg.png" class="hvrbox-layer_bottom">
                
            </div>
        </div>
        

        <div class="section" id="section3">
            <section class=" text-white text-center" id="services">
                <div class="container3">
                    <div class="content-section-heading">
                        <h3 class="text-secondary mb-0">Here's</h3>
                        <h2 class="mb-5 text-white">what we do</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                            <span class="service-icon rounded-circle mx-auto mb-3">
                    <i class="icon-speech"></i>
                  </span>
                            <h4>
                    <strong>Aware</strong>
                  </h4>
                            <p class="text-faded mb-0">Make you realize your mistake!</p>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                            <span class="service-icon rounded-circle mx-auto mb-3">
                    <i class="icon-graph"></i>
                  </span>
                            <h4>
                    <strong>Analyze</strong>
                  </h4>
                            <p class="text-faded mb-0">Understand the depth of your mistakes!</p>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                            <span class="service-icon rounded-circle mx-auto mb-3">
                    <i class="icon-pie-chart"></i>
                  </span>
                            <h4>
                    <strong>Compare</strong>
                  </h4>
                            <p class="text-faded mb-0">Leaderboard for your mistakes!</p>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <span class="service-icon rounded-circle mx-auto mb-3">
                    <i class="icon-support"></i>
                  </span>
                            <h4>
                    <strong>Support</strong>
                  </h4>
                            <p class="text-faded mb-0">Make sure you don't repeat your mistakes!</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="section pattern" id="section5">

            <!-- Start WOWSlider.com BODY section  -->
            <div id="wowslider-container0">
                <div class="ws_images">
                    <ul>
                        <li><img src="static/images/fact1.png" alt="" title="" id="wows0_0" /></li>
                        <li><img src="static/images/fact2.png" alt="" title="" id="wows0_1" /></li>
                        <li>
                            <img src="static/images/fact_3.png" alt="slideshow html code" title="" id="wows0_2" />
                        </li>
                        <li><img src="static/images/fact4.png" alt="" title="" id="wows0_3" /></li>
                    </ul>
                </div>
                
                <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net"></a></div>
                <div class="ws_shadow"></div>
            </div>
            <script type="text/javascript" src="static/engine0/wowslider.js"></script>
            <script type="text/javascript" src="static/engine0/script.js"></script>
            <!-- End WOWSlider.com BODY section -->

        </div>

        <div class="section " id="section6">
            <section class="service_area ">
                <div class="container">
                    <div class="main_title">
                        <h2>How are we impacting?</h2>
                        <br>
                    </div>
                    <div class="row service_inner">
                        <div class="col-lg-4 col-md-6">
                            <div class="service_item">
                                <a href="https://drive.google.com/file/d/1maTNbeIJx5l7JplzilwsKIciHgvn7g4e/view" target="_blank"><h4>Revised Menu Cards</h4></a>                                
                                <p ><a href="https://drive.google.com/file/d/1maTNbeIJx5l7JplzilwsKIciHgvn7g4e/view" target="_blank" style="color: #0e1619f2!important">Restaurant menu card which shows water footprint of each dish to make people aware of their indirect water consumption.
                                    </a>
                                    <br>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service_item">
                                <a href="login.php"><h4>Quantitative Measurement</h4></a>
                                <p>Data of the food, water, land and calories wasted by a diner is shown on the bill of a particular order as well as the diner's personal login page.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service_item">
                                <a href="login.php"><h4>Real time data analysis</h4></a>
                                <p>Using your daily food wastage data we calculate the environmental impact and represent the trend graphically along with your rank w.r.t. other users. </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service_item">
                                <a href="login.php"><h4>Students</h4></a>
                                <p>Collaborate with schools & colleges locally and conduct interactive seminars , workshops about impact of food wastage on environment.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service_item">
                                <a href="login.php"><h4>Learning Resources</h4></a>
                                <p>Some resources at your disposal for a better understanding.
                                    <br>
                                    <br>
                                    <br>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="service_item">
                                <a href="https://goo.gl/forms/0v6HtpPL2Htr1ibn1" target="_blank" style="color: #0e1619f2!important"><h4>Start impacting</h4></a>
                                <p><a href="https://goo.gl/forms/0v6HtpPL2Htr1ibn1" target="_blank" style="color: #0e1619f2!important">Want to be the change you want to see in others? Volunteer with us on our Global Mission to zero out the the food in the trash by 2025. <strong>#zerooutby2025</strong></a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        <div class="section  " id="section7">
            <!-- <div class="black"><h1 class="mb-5 "></h1></div> -->
            <div class="container7 ">
             <div class="service_item1">
                                <a href="#"><h4>Team</h4></a> </div>
            <figure class="rounded-circle">
              <img src="static\images\vi.jpg">
              <div class="contact">
                <a href="https://linkedin.com/in/vishnu-m" target="_blank" class="tw"></a>
                <a href="https://linkedin.com/in/vishnu-m" target="_blank" class="fb"></a>
                <a href="https://linkedin.com/in/vishnu-m" target="_blank" class="gp"></a>
                <a href="https://linkedin.com/in/vishnu-m" target="_blank" class="ma"></a>
              </div>
            </figure>
            
            <figure class="rounded-circle">
              <img src="static\images\sa.jpg">
              <div class="contact">
                <a href="https://www.linkedin.com/in/sumit-saboo-029b0a135/" target="_blank" class="tw"></a>
                <a href="https://www.linkedin.com/in/sumit-saboo-029b0a135/" target="_blank" class="fb"></a>
                <a href="https://www.linkedin.com/in/sumit-saboo-029b0a135/" target="_blank" class="gp"></a>
                <a href="https://www.linkedin.com/in/sumit-saboo-029b0a135/" target="_blank" class="ma"></a>
              </div>
            </figure>
            <figure class="rounded-circle">
              <img src="static\images\gu.jpg">
              <div class="contact">
                <a href="https://www.linkedin.com/in/utkarsh-gupta-708959113/" target="_blank"  class="tw"></a>
                <a href="https://www.linkedin.com/in/utkarsh-gupta-708959113/" target="_blank" class="fb"></a>
                <a href="https://www.linkedin.com/in/utkarsh-gupta-708959113/" target="_blank" class="gp"></a>
                <a href="https://www.linkedin.com/in/utkarsh-gupta-708959113/" target="_blank" class="ma"></a>
              </div>
            </figure>
            
            <div class="container g-padding-y-0--xs g-padding-x-10--xs g-padding-x-150--md g-padding-y-0--sm">
                <div class="g-text-center--xs g-margin-b-40--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Contact</p>
                    
                </div>
                <form method="post" >
                    <div class="row g-margin-b-40--xs">
                        <div class="col-sm-6 g-margin-b-20--xs g-margin-b-0--md">
                            <div class="g-margin-b-20--xs">
                                <input type="text" name="name" class="form-control s-form-v2__input g-radius--50" placeholder="* Name">
                            </div>
                            <div class="g-margin-b-20--xs">
                                <input type="email" name="email" class="form-control s-form-v2__input g-radius--50" placeholder="* Email">
                            </div>
                            <input type="text" name="phone" class="form-control s-form-v2__input g-radius--50" placeholder="* Phone">
                        </div>
                        <div class="col-sm-6">
                            <textarea class="form-control s-form-v2__input g-radius--10 g-padding-y-20--xs" rows="8" name="message" placeholder="* Your message"></textarea>
                        </div>
                    </div>
                    <div class="g-text-center--xs">
                        <button type="submit" name="fsubmit" class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs">Submit</button>
                    </div>
                </form>
                <div class="g-text-center--xs" id="confirm"></div>
                
            </div>
        </div>
        </div>
        
        
        <script type="text/javascript" src="static/js/fullpage.js"></script>
        <!-- <script type="text/javascript" src="static/js/examples.js"></script> -->

        <script type="text/javascript">

$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});
            // variables
            $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});
            var $header_top = $('.header-top');
            var $nav = $('nav');

            // toggle menu 
            $header_top.find('a').on('click', function() {
                $(this).parent().toggleClass('open-menu');
            });
            var myFullpage = new fullpage('#fullpage', {
                verticalCentered: false,

                //to avoid problems with css3 transforms and fixed elements in Chrome, as detailed here: https://github.com/alvarotrigo/fullPage.js/issues/208
                scrollingspeed: 1300,
                navigation: true,
                navigationPosition: 'right',
                css3: false,
                navigation: true,
                anchors: ['Home', 'Tag_Line', 'What_we_do', 'Facts', 'Impact','Contact_Us'],
                menu: '#menu',
                afterLoad: function(anchorLink, index) {
                    $header_top.css('background', 'rgba(0, 47, 77, .5)');
                    $nav.css('background', 'rgba(0, 47, 77, .25)');
                    if (index == 5) {
                        $('#fp-nav').hide();
                    }
                },

                onLeave: function(index, nextIndex, direction) {
                    if (index == 5) {
                        $('#fp-nav').show();
                    }
                },

                afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex) {
                    if (anchorLink == 'fifthSection' && slideIndex == 1) {
                        $.fn.fullpage.setAllowScrolling(false, 'up');
                        $header_top.css('background', 'transparent');
                        $nav.css('background', 'transparent');
                        $(this).css('background', '#374140');
                        $(this).find('h2').css('color', 'white');
                        $(this).find('h3').css('color', 'white');
                        $(this).find('p').css({
                            'color': '#DC3522',
                            'opacity': 1,
                            'transform': 'translateY(0)'
                        });
                    }
                },

                onSlideLeave: function(anchorLink, index, slideIndex, direction) {
                    if (anchorLink == 'fifthSection' && slideIndex == 1) {
                        $.fn.fullpage.setAllowScrolling(true, 'up');
                        $header_top.css('background', 'rgba(0, 47, 77, .3)');
                        $nav.css('background', 'rgba(0, 47, 77, .25)');
                    }
                }
            });




        </script>
        <?php 
           $conn = mysqli_connect("localhost", "root", "", "db");
      if (!$conn) {
          die("Error connecting to database: " . mysqli_connect_error());
      }
      $name=$_POST['name'];
      $mobile=$_POST['phone'];
      $number=$_POST['phone'];
      $email=$_POST['email'];

      $message=$_POST['message'];
          if (isset($_POST['fsubmit']))
        {  
          $sql="INSERT INTO `feedback` ( `name`, `email`, `mobile`, `message`) VALUES ('$name', '$email', '$number', '$message')";
          echo"insertred". $sql;
          $res=mysqli_query ( $conn , $sql);
        }
        ?>
</body>

</html>