@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Mes projets</h2>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-lg">
                            <span class="glyphicon glyphicon-plus-sign"></span> Plus
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom du projet</th>
                                <th>Description</th>
                                <th>Date de réalisation</th>
                                <th>Categories</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->projects as $project)
                                <tr>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->date }}</td>
                                    <td>
                                        @foreach($project->categories as $category)
                                            <span>{{ $category->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ route('projects.delete' , ['id' => $project->id]) }}" class="btn btn-danger" method="post">
                                            <input type="submit" value="Supprimer"/>
                                        </form>
                                        <a href="{{ route('projects.show' , ['id' => $project->id]) }}" class="btn btn-primary">
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
