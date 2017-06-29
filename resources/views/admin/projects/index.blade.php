@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Mes projets</h2>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-l">
                            <span class="glyphicon glyphicon-plus-sign"></span> Add a project
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Nom du projet</th>
                                <th>Date de réalisation</th>
                                <th>Categories</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->projects as $project)
                                <tr id="project-{{ $project->id }}">
                                    <td>
                                        <div class="preview" style="background-image: url({{ asset($project->une) }});"></div>
                                    </td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->date }}</td>
                                    <td>
                                        @foreach($project->categories as $category)
                                            <span>{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-right">

                                        <a href="{{ route('projects.edit' , ['id' => $project->id]) }}" class="btn btn-success">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href="#" class="btn btn-danger delete-project" data-id="{{ $project->id }}" data-token="{{ csrf_token() }}">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <a href="{{ route('projects.show' , ['id' => $project->id]) }}" class="btn btn-warning">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
