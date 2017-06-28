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
        <div id="homepage" class="wrapper">
            <section id="section-welcome" class="section full-height flex-full-height bg-light">
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
                    <button data-target="#section-evangelist-list" class="btn-down">
                        <div class="label-link">Meet the Evangelists</div>
                        <p class="link-icon">
                            <span class="reborn-icon-angle-double-down"></span>
                        </p>
                    </button>
                </div>
            </section>

            <section id="section-evangelist-list" class="section full-height padding-top-big">
                <div class="container flex-full-height">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 left">
                            <h4 class="section-big-title">
                                We are reBorn
                                <small>Evangelists</small>
                            </h4>
                        </div>
                        <div class="col-md-8 col-xs-12 right">
                            <ul class="evangelists oneByOne" data-interval="100">
                                @foreach($users as $user)
                                <li>
                                    <a href="" title="">
                                        <span class="pic">
                                            <img src="{{ url($user->avatar) }}" alt="{{ $user->firstname . ' ' . $user->lastname }} }}" />
                                        </span>
                                        <span class="name">
                                            <small>{{ $user->lastname }}</small>
                                            <span>{{ $user->firstname }}</span>
                                        </span>
                                        <span class="job">
                                            <span class="light-reborn">reBorn founder &</span> Lead Frontend Developper
                                        </span>
                                    </a>
                                    <ul class="socials">
                                        <li><a href="#" title="ln" class="reborn-icon-linkedin"></a></li>
                                        <li><a href="#" title="ln" class="reborn-icon-github"></a></li>
                                        <li><a href="#" title="ln" class="reborn-icon-behance"></a></li>
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
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

            <section id="section-evangelist-projects" class="section full-height padding-top-big padding-bottom-big bg-light">
                <div class="container flex-full-height">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 left">
                            <h4 class="section-big-title">
                                Take a look at our
                                <small>realisations</small>
                            </h4>
                        </div>
                        <div class="col-md-8 col-xs-12 right">
                            <ul class="projects oneByOne" data-interval="100">
                                @foreach($projects as $project)
                                <li>
                                    <a href="" title="">
                                        <span class="pic" style="background-image: url({{ asset($project->une) }});"></span>
                                        <ul class="cats">
                                            <li>Web</li>
                                            <li>Design</li>
                                        </ul>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <script type="text/javascript" src="{{ URL::asset('./js/app.js') }}"></script>
</html>
