<?php
use Carbon\Carbon;
?>
@extends('layouts.layout')

@section('content')

    {{--Logo reBorn--}}
    <h1 id="logo-reborn">
        <a href="{{ route('homepage') }}" title="reBorn">
            <img src="{{ asset('images/logo/icon_reborn.svg') }}" alt="reBorn" />
        </a>
    </h1>

    {{--Content--}}
    <div id="project-page" class="wrapper">
        <div class="container-fluid">
            <div class="pictures">
                @foreach($project->attachments as $attachment)
                    <img src="{{ URL::asset($attachment->url) }}" alt="{{ $project->name }}">
                @endforeach
            </div>
            <div class="infos">
                <div class="infos-content">

                    {{--Evangelists--}}
                    <div class="info-bloc">
                        <ul class="evangelists">
                            @foreach($project->users as $user)
                            <li>
                                <a href="{{ route('evangelist', ['slug'=>$user->slug]) }}" title="{{ $user->firstname . $user->lastname }}">
                                    <span class="avatar" style="background-image: url({{ $user->avatar }})"></span>
                                    <span class="name">
                                        {{ $user->firstname }}
                                        <span class="lastname">{{ $user->lastname }}</span>
                                    </span>

                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{--Title--}}
                    <div class="info-bloc">
                        <p class="title">{{ $project->title }}</p>
                        <p class="cats">{{ $project->stringCats }}</p>
                        <p class="date">Réalisé le : {{ Carbon::parse($project->date)->format('d M Y') }}</p>
                    </div>

                    {{--Technos--}}
                    <div class="info-bloc">
                        <div class="bloc-techno">
                            <ul>
                                @foreach($project->technos as $techno)
                                    <li>
                                        <img src="{{ asset($techno->icon) }}" alt="{{ $techno->name }}" />
                                        <p class="name">{{ $techno->name }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{--Description--}}
                    <div class="info-bloc">
                        {{ $project->description }}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

