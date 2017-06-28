@extends('admin.layouts.app')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="container">

        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#menu0">Infos perso</a>
            </li>
            <li>
                <a data-toggle="tab" href="#menu1">Description</a>
            </li>
            <li>
                <a data-toggle="tab" href="#menu2">Socials</a>
            </li>
            <li>
                <a data-toggle="tab" href="#menu3">Medias</a>
            </li>
        </ul>

        {{ Form::open([
            'route' => ['user.update', $user->id],
            'method' => 'put',
            'class'=>'form-horizontal',
            'role' => 'form',
            'files' => true
        ]) }}

        <div class="tab-content">
            <div id="menu0" class="tab-pane fade in active">

                <div class="form-group row">
                    {{ Form::label('username', 'Username', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('username', $user->username, ['class' => 'form-control', 'autofocus']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('slug', 'Slug', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('slug', $user->slug, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('lastname', 'Lastname', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('lastname', $user->lastname, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('firstname', 'Firstname', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('firstname', $user->firstname, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('job', 'Job', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('job', $user->job, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('city', 'City', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('city', $user->city, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('email', 'Email', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="form-group row">
                    {{ Form::label('slogan', 'Slogan', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::textarea('slogan', $user->slogan, ['class' => 'form-control', 'size' => '30x5']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('about', 'About', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::textarea('about', $user->about, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::textarea('description', $user->description, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="form-group row">
                    {{ Form::label('facebook', 'Facebook', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::url('facebook', $user->fb, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('twitter', 'Twitter', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::url('twitter', $user->tw, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('linkedin', 'Linkedin', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::url('linkedin', $user->ln, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('behance', 'Behance', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::url('behance', $user->bh, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('viadeo', 'Viadeo', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::url('viadeo', $user->viadeo, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('dribble', 'Dribble', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::url('dribble', $user->db, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div id="menu3" class="tab-pane fade">
                <div class="form-group row">
                    {{ Form::label('avatar', 'Avatar', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9 form-group-preview">
                        <div id="previewAvatar" class="previewImg preview-small" style="background-size: cover; background-position: center center; background-image: url({{ asset($user->avatar) }});"></div>
                        {{ Form::file('avatar', '', ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('bgimg', 'Background', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9 form-group-preview">
                        <div id="previewBgImg" class="previewImg preview-medium" style="background-size: cover; background-position: center center; background-image: url({{ asset($user->bgimg) }});"></div>
                        {{ Form::file('bgimg', '', ['class' => 'form-control']) }}
                    </div>
                </div>

            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-8 col-md-offset-2">
                {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}

    </div>
@endsection
