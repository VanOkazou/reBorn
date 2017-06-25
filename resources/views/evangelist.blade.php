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
<div id="evangelist-profil" class="wrapper wrapper-page">
    {{--Logo reBorn--}}
    <h1 id="logo-reborn">
        <a href="#" title="reBorn">
            <img src="{{ asset('images/logo/icon_reborn.svg') }}" alt="reBorn" />
        </a>
    </h1>

    {{--Logo reBorn--}}
    <div id="logo-evangelist"><span>v</span><span>p</span></div>

    {{--Socials--}}
    <div id="socials">
        <ul>
            <li>
                <a href="#" title="linkedin" class="reborn-icon-linkedin"></a>
            </li>
            <li>
                <a href="#" title="github" class="reborn-icon-github"></a>
            </li>
            <li>
                <a href="#" title="facebook" class="reborn-icon-facebook"></a>
            </li>
            <li>
                <a href="#" title="twitter" class="reborn-icon-twitter"></a>
            </li>
            <li>
                <a href="#" title="behance" class="reborn-icon-behance"></a>
            </li>
            <li>
                <a href="#" title="dribbble" class="reborn-icon-dribbble"></a>
            </li>
        </ul>
    </div>

    <section id="section-top" class="section full-height padding-top-big padding-bottom-big">
        <div class="bg" style="background-image: url({{ asset('images/pic/profil.jpg') }});"></div>
        <div class="container flex-full-height">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="chapter"><span>01.</span>Welcome on my page</div>
                    <h1 class="slogan">reBorn founder & Lead Frontend Developper</h1>
                    <div class="heading">
                        <p>
                            Hi, my name is Van, I am the reBorn founder and <strong>Lead Frontend Developper</strong>. Specialized in <strong>Laravel</strong> for the backend and <strong>React JS</strong> for the frontend, I currently work for the daily <em>Les Echos</em>. I have worked previously for many firms like Air France, Vinci, LVMH or Axa Assurance.
                        </p>
                    </div>
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
