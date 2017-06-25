@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Mon projet : {{ $project->title }}</h2>
                    </div>
                    <div class="panel-body row">
                        @foreach($project->attachments as $image)
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <img src="{{ asset('uploads/' . $image->url) }}" class="img-responsive">
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-body">
                        <div class="jumbotron">
                            <h1>{{ $project->title }}</h1>
                            <p>Crée le {{ $project->date }}</p>
                            <p>{{ $project->description }}</p>
                            <p><a class="btn btn-primary btn-lg" href="{{ route('projects.edit' , ['id' => $project->id]) }}" role="button">Modifier le contenu</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
