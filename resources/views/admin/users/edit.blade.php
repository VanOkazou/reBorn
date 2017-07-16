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
            <li>
                <a data-toggle="tab" href="#menu4">Skills</a>
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
                    <div class="col-md-10">
                        {{ Form::text('username', $user->username, ['class' => 'form-control', 'autofocus']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('slug', 'Slug', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('slug', $user->slug, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('lastname', 'Lastname', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('lastname', $user->lastname, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('firstname', 'Firstname', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('firstname', $user->firstname, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('job', 'Job', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('job', $user->job, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('city', 'City', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('city', $user->city, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('email', 'Email', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="form-group row">
                    {{ Form::label('slogan', 'Slogan', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::textarea('slogan', $user->slogan, ['class' => 'form-control', 'size' => '30x5']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('about', 'About', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::textarea('about', $user->about, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::textarea('description', $user->description, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="form-group row">
                    {{ Form::label('facebook', 'Facebook', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::url('facebook', $user->fb, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('twitter', 'Twitter', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::url('twitter', $user->tw, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('linkedin', 'Linkedin', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::url('linkedin', $user->ln, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('behance', 'Behance', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::url('behance', $user->bh, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('viadeo', 'Viadeo', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::url('viadeo', $user->viadeo, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('dribble', 'Dribble', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::url('dribble', $user->db, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('github', 'GitHub', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::url('github', $user->gh, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div id="menu3" class="tab-pane fade">
                <div class="form-group row">
                    {{ Form::label('avatar', 'Avatar', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10 form-group-preview">
                        <div id="previewAvatar" class="previewImg preview-small" style="background-size: cover; background-position: center center; background-image: url({{ asset($user->avatar) }});"></div>
                        {{ Form::file('avatar', '', ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('bgimg', 'Background', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10 form-group-preview">
                        <div id="previewBgImg" class="previewImg preview-medium" style="background-size: cover; background-position: center center; background-image: url({{ asset($user->bgimg) }});"></div>
                        {{ Form::file('bgimg', '', ['class' => 'form-control']) }}
                    </div>
                </div>

            </div>
            <div id="menu4" class="tab-pane fade">
                <div class="skills-expert">
                    <h3>Choose at most 3 skills you are expert in</h3>
                    <div class="form-group row">
                        <div class="col-md-4 col-xs-12">
                            {!! Form::select('expert1', ['' => 'Select your language'] + $technos->toArray() , $expert1, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-4 col-xs-12">
                            {!! Form::select('expert2', ['' => 'Select your language'] + $technos->toArray(), $expert2, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-4 col-xs-12">
                            {!! Form::select('expert3', ['' => 'Select your language'] + $technos->toArray(), $expert3, ['class' => 'form-control']) !!}
                        </div>

                    </div>
                </div>

                <div class="skills-list">
                    <h3>List of your skills</h3>
                    <ul class="list-technos-user" id="list-technos-user">
                    @if(count($user->technos) < 1)
                        <p id="no-techno"><em>No techno currently</em></p>
                    @else
                        @foreach($user->technos as $techno)
                            <li class="row" id="techno-{{ $techno->id }}">
                                <div class="col-xs-3">
                                    Techno : <input type="text" disabled value="{{ $techno->name }}" />
                                </div>
                                <div class="col-xs-3">
                                    Version : <input type="text" disabled value="{{ $techno->pivot->version }}" />
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" disabled value="{{ $techno->pivot->pourcentage }}" /> %
                                </div>
                                <div class="col-xs-3 text-right">
                                    <a href="#" title="Remove" class="btn btn-danger delete-techno-user glyphicon glyphicon-trash" data-id-techno="{{ $techno->id }}" data-token="{{ csrf_token() }}"></a>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    </ul>
                </div>

                <div class="skills-add">
                    <h3>Add a new skill</h3>
                    <div class="form-group row">
                        <div class="col-md-3 col-xs-12">
                            {!! Form::select('techno', ['' => 'Select your language'] + $technos->toArray(), null, ['class' => 'form-control', 'id' => 'inputTechno']) !!}
                        </div>
                        <div class="col-md-3 col-xs-12">
                            {!! Form::text('version', null, ['class' => 'form-control','placeholder' => 'Version', 'id' => 'inputVersion']) !!}
                        </div>
                        <div class="col-md-3 col-xs-12">
                            {!! Form::number('pourcentage', null, ['class' => 'form-control','placeholder' => 'Level (%)', 'min'=> 0 , 'max' => 100, 'id' => 'inputPercent']) !!}
                        </div>
                        <div class="col-xs-3 text-right">
                            <a href="#" title="Add" id="btnAddUserTechno" class="btn btn-success add-techno-user glyphicon glyphicon-plus"></a>
                        </div>
                        <p class="col-xs-12" role="alert" id="error-add-techno"></p>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-group row">
            <div class="col-xs-12 text-right">
                {{ Form::submit('Update your profile', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}

    </div>
@endsection
