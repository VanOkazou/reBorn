<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>reBorn - the Digital Evangelists Community</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,600" rel="stylesheet" type="text/css">

    <!-- Style -->
    <link href="{{ URL::asset('./css/app.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
<div id="evangelist-profil" class="wrapper">
    <section id="section-top" class="section full-height padding-top-big padding-bottom-big">
        <div class="bg" style="background-image: url({{ asset('images/pic/profil.jpg') }});"></div>
        <div class="container flex-full-height">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="chapter"><span>01.</span>Welcome on my page</div>
                    <h1 class="slogan">reBorn founder & Lead Frontend Developper</h1>
                </div>
            </div>
            <div class="link-container">
                <button data-target="#section-evangelist-projects" class="btn-down">
                    <div class="label-link">Our works</div>
                    <p class="link-icon">
                        <span class="reborn-icon-angle-double-down"></span>
                    </p>
                </button>
            </div>
        </div>
    </section>

</div>
</body>
<script type="text/javascript" src="{{ URL::asset('./js/app.js') }}"></script>
</html>
