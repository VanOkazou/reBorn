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

    {{--Nav profil--}}
    <div id="nav-profil-container">
        <p id="section-title">
            About me
        </p>
        <ul id="nav-profil">
            <li data-progress="0" class="current">
                <a href="#section-about"></a>
            </li>
            <li data-progress="1">
                <a href="#section-projects"></a>
            </li>
            <li data-progress="2">
                <a href="#section-skills"></a>
            </li>
            <li data-progress="3">
                <a href="#section-contact"></a>
            </li>
        </ul>
    </div>

    {{--Logo reBorn--}}
    <h1 id="logo-reborn">
        <a href="" title="reBorn">
            <img src="{{ asset('images/logo/icon_reborn.svg') }}" alt="reBorn" />
        </a>
    </h1>

    {{--Logo Evangelist--}}
    <div id="logo-evangelist">
        <span>{{ $initialFirstname }}</span>
        <span>{{ $initialLastname }}</span>
    </div>

    {{--Socials--}}
    <div id="socials">
        <ul>
            @if(!is_null($user->ln))
            <li>
                <a href="{{ $user->ln }}" title="linkedin" target="_blank" class="reborn-icon-linkedin"></a>
            </li>
            @endif
            @if(!is_null($user->gh))
                <li>
                    <a href="{{ $user->gh }}" title="github" target="_blank" class="reborn-icon-github"></a>
                </li>
            @endif
            @if(!is_null($user->fb))
                <li>
                    <a href="{{ $user->fb }}" title="facebook" target="_blank" class="reborn-icon-facebook"></a>
                </li>
            @endif
            @if(!is_null($user->tw))
                <li>
                    <a href="{{ $user->tw }}" title="twitter" target="_blank" class="reborn-icon-twitter"></a>
                </li>
            @endif
            @if(!is_null($user->bh))
                <li>
                    <a href="{{ $user->bh }}" title="behance" target="_blank" class="reborn-icon-behance"></a>
                </li>
            @endif
            @if(!is_null($user->db))
                <li>
                    <a href="{{ $user->db }}" title="dribbble" target="_blank" class="reborn-icon-dribbble"></a>
                </li>
            @endif
        </ul>
    </div>

    <section id="section-about" class="section full-height padding-top-big padding-bottom-big">
        <div class="bg" style="background-image: url({{ asset('images/pic/profil.jpg') }});"></div>
        <div class="container flex-full-height">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="chapter"><span>01.</span>About me</div>
                    <h1 class="slogan">reBorn founder & Frontend Developper</h1>
                    <div class="heading">
                        <p>
                            Hi, my name is Van, I am the reBorn founder and <strong>Frontend Developper</strong>. Specialized in <strong>Laravel</strong> for the backend and <strong>React JS</strong> for the frontend, I currently work for the daily <em>Les Echos</em>. I have worked previously for many firms like Air France, Vinci, LVMH or Axa Assurance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-evangelist-projects" class="section full-height padding-top-big padding-bottom-big">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="chapter"><span>02.</span>Works</div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div id="gallery-filter">
                <ul>
                    @foreach($arr_cat as $cat)
                        <li id="{{ $cat }}" class="cat-filter">{{ $cat }}</li>
                    @endforeach
                </ul>
            </div>
            <div id="gallery-projects" class="container">
                <ul class="projects oneByOne" data-interval="50">
                    @foreach($projects as $index=>$project)
                        <li data-item="{{ $index + 1 }}" data-cats="{{ $project->stringCats }}">
                            <a href="{{ route('project', ['id'=>$project->id]) }}" title="{{ $project->title }}">
                                <div class="pic" style="background-image: url({{ asset($project->une) }});"></div>
                                <div class="infos">
                                    <p class="title">{{ $project->title }}</p>
                                    <p class="cats">{{ $project->stringCats }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section id="section-evangelist-skills" class="section full-height padding-top-big padding-bottom-big">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="chapter"><span>03.</span>Competences</div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="expert-list">
                @foreach($experts as $expert)
                    <div class="single-expert">
                        <div class="expert-content">
                            <p class="label-expert light-reborn">
                                <span>Expert</span>
                            </p>
                            <img src="{{ asset($expert->iconBlack) }}" alt="{{ $expert->name }}" />
                            <p class="techno-name">{{ $expert->name }}</p>
                        </div>

                    </div>
                @endforeach
            </div>
            <div class="row skills-list">
                @foreach($user->technos as $techno)
                    <div class="single-skill col-md-3 col-sm-4 col-xs-12">
                        <div class="c100 p{{ $techno->pivot->pourcentage }} center">
                            <span>{{ $techno->pivot->pourcentage }}%</span>
                            <div class="slice">
                                <div class="bar"></div>
                                <div class="fill"></div>
                            </div>
                        </div>
                        <p class="name text-center">{{ $techno->name }}</p>
                        <p class="version text-center">{{ $techno->pivot->version }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
</body>
<script type="text/javascript" src="{{ URL::asset('./js/app.js') }}"></script>
</html>
