@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Mon compte</div>
                    <div class="panel-body">
                        @include('admin.users.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
