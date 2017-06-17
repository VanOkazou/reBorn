<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>reBorn - the Evangelists Community</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css">

        <!-- Style -->
        <link href="css/app.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="homepage" class="wrapper">
            <section id="section-welcome" class="section full-height">
                <div class="bandes-container">
                    <div class="bandes"></div>
                </div>
                <div class="logo-container">
                    <img src="{{ asset('images/logo/logo_reborn.svg') }}" alt="reBorn" id="logo" />
                </div>
                <div class="slogan-container">
                    <div class="container">
                        <h1>The Digital Evangelists Community</h1>
                    </div>
                </div>
                <div class="link-container">
                    <a href="#section-evangelist-list" title="Meet the Evangelists" class="btn-down">
                        <div class="label-link">Meet the Evangelists</div>
                        <p class="link-icon">
                            <span class="reborn-icon-angle-double-down"></span>
                        </p>
                    </a>
                </div>
            </section>
            <section id="section-evangelist-list" class="section full-height">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                            MEMBER 1
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <script type="text/javascript" src="{{ URL::asset('./js/app.js') }}"></script>
</html>
