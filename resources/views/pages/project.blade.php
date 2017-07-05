<?php
use Carbon\Carbon;
?>
@extends('layouts.layout')

@section('content')

    {{--Logo reBorn--}}
    <h1 id="logo-reborn">
        <a href="" title="reBorn">
            <img src="{{ asset('images/logo/icon_reborn.svg') }}" alt="reBorn" />
        </a>
    </h1>

    {{--Logo reBorn--}}
    <div id="logo-evangelist"><span>v</span><span>p</span></div>

    {{--Content--}}
    <div id="project-page" class="wrapper">
        <div class="container-fluid">
            <div class="pictures">
                @foreach($project->attachments as $attachment)
                    <img src="{{ $attachment->url }}" alt="{{ $project->name }}">
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

                </div>
            </div>
        </div>

    </div>
@endsection

