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
                <a data-toggle="tab" href="#menu0">Infos project</a>
            </li>
            <li>
                <a data-toggle="tab" href="#menu1">Gallery</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="menu0" class="tab-pane fade in active">
                {{ Form::open([
                    'route' => ['projects.update', $project->id],
                    'method' => 'put',
                    'class'=>'form-horizontal',
                    'role' => 'form',
                    'files' => true
                ]) }}

                <div class="form-group row">
                    {{ Form::label('une', 'Thumbnail', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9 form-group-preview">
                        <div id="previewUne" class="previewImg preview-small" style="background-size: cover; background-position: center center; background-image: url({{ asset($project->une) }})"></div>
                        {{ Form::file('une', '', ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('title', 'Title', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('title', $project->title, ['class' => 'form-control', 'autofocus']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::textarea('description', $project->description, ['class' => 'form-control', 'size' => '30x5']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('date', 'Date of creation', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::date('date', $project->date, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2 control-label">Catégories</div>
                    <div class="col-md-9">
                        @foreach($categories as $categorie)
                            <label class="checkbox-inline">
                                <input
                                        type="checkbox"
                                        value="{{ $categorie->id }}"
                                        name="category[]"
                                        {{ in_array($categorie->name, $projectCats) ? 'checked' : '' }}
                                >{{ $categorie->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2 control-label">Langages</div>
                    <div class="col-md-9">
                        @foreach($technos as $techno)
                            @if($techno->type == 'lang')
                                <label class="checkbox-inline">
                                    <input
                                            type="checkbox"
                                            value="{{ $techno->id }}"
                                            name="techno[]"
                                            {{ in_array($techno->name, $projectTechnos) ? 'checked' : '' }}
                                    >{{ $techno->name }}
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2 control-label">Framework / CMS</div>
                    <div class="col-md-9">
                        @foreach($technos as $techno)
                            @if($techno->type == 'fram' || $techno->type == 'cms')
                                <label class="checkbox-inline">
                                    <input
                                            type="checkbox"
                                            value="{{ $techno->id }}"
                                            name="techno[]"
                                            {{ in_array($techno->name, $projectTechnos) ? 'checked' : '' }}
                                    >{{ $techno->name }}
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2 control-label">Logiciels</div>
                    <div class="col-md-9">
                        @foreach($technos as $techno)
                            @if($techno->type == 'soft')
                                <label class="checkbox-inline">
                                    <input
                                            type="checkbox"
                                            value="{{ $techno->id }}"
                                            name="techno[]"
                                            {{ in_array($techno->name, $projectTechnos) ? 'checked' : '' }}
                                    >{{ $techno->name }}
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 col-md-offset-2">
                        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>

            <div id="menu1" class="tab-pane fade">
                <form action="{{ route('projects.upload') }}" class="dropzone" id="formGalleryProject" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" id="file" name="file"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" /><br/>
                </form>
                <p>Return to the tab "Infos Project" to save your changes!</p>
                <div class="attachment-list-container">
                    <ul class="attachment-list">
                        @foreach($project->attachments as $attachment)
                        <li id="attach-{{ $attachment->id }}">
                            <img src="{{ asset($attachment->url) }}" alt="">
                            <span class="glyphicon glyphicon-folder-close delete-attachment" data-token="{{ csrf_token() }}" data-id="{{ $attachment->id }}" data-url="{{ route('attachment.destroy', ['id' => $attachment->id]) }}"></span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
        </div>





    </div>
@endsection
