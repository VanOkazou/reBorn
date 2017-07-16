@extends('layouts.layout')

@section('content')
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

        <section id="section-evangelist-list" class="section full-height padding-top-big padding-bottom-big">
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
                                <a href="{{ route('evangelist', ['user'=>$user->slug]) }}" title="{{ $user->firstname }}">

                                    <span class="pic" style="background-image: url({{ asset($user->avatar != '' ? $user->avatar : 'images/pic/default-avatar.png') }});"></span>

                                    <span class="name">
                                        <small>{{ (!is_null($user->lastname) && $user->lastname != '') ? $user->lastname : '&nbsp;' }}</small>
                                        <span>{{ (!is_null($user->firstname) && $user->firstname != '') ? $user->firstname : $user->username }}</span>
                                    </span>
                                    <span class="job">
                                        @if($user->status == 1)<span class="light-reborn">reBorn founder & </span>@endif
                                        <span>{{ !is_null($user->job) ? $user->job : 'Evangelist' }}</span>
                                    </span>
                                </a>
                                <ul class="socials">
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
                                    <li>
                                        <a href="mailto:{{ $user->email }}" title="Email">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-evangelist-projects" class="section full-height padding-top-big padding-bottom-big bg-light">
            <div class="container">
            <h4 class="section-big-title">
                Take a look at our
                <small>realisations</small>
            </h4>
            </div>
            <div class="container-fluid">
                <div id="gallery-filter">
                    <ul>
                        @foreach($cats as $cat)
                            <li id="{{ $cat->name }}" class="cat-filter">{{ $cat->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div id="gallery-projects">
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
    </div>
@endsection

