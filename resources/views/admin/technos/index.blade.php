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
        <h3>Create a new techno</h3>
        {{ Form::open([
            'route' => ['technos.store'],
            'method' => 'post',
            'class'=>'form-horizontal single-techno create-techno',
            'role' => 'form',
            'files' => true
        ]) }}
        <div class="item-techno item-icon">
            <img src="{{ asset('images/pic/default-techno.png') }}" alt="new" class="previewTechno" data-input="techno-new" id="preview-techno-new" />
            {{ Form::file('icon', ['class' => 'form-control inputIconTechno', 'id' => 'techno-new']) }}
        </div>
        <div class="item-techno item-icon">
            <img src="{{ asset('images/pic/default-techno.png') }}" alt="new" class="previewTechno" data-input="technoBlack-new" id="preview-technoBlack-new" />
            {{ Form::file('iconBlack', ['class' => 'form-control inputIconTechno', 'id' => 'technoBlack-new']) }}
        </div>
        <div class="item-techno item-name">
            {{ Form::text('name', '', ['class' => 'form-control']) }}
        </div>
        <div class="item-techno item-type">
            {{ Form::select('type',['lang' => 'Language', 'soft' => 'Logiciel', 'fram' => 'Framework', 'cms' => 'CMS'], '', ['class' => 'form-control']) }}
        </div>

        <div class="item-techno item-update">
            {{ Form::submit('Create a new techno', ['class' => 'btn btn-primary']) }}
        </div>
        {{ Form::close() }}

        <h3>List of technos</h3>
        <div class="panel-group" id="accordion-technos" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion-technos" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Langages
                    </a>
                </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        @foreach($technos as $techno)
                            @if($techno->type == 'lang')
                                {{ Form::open([
                                    'route' => ['technos.update', $techno->id],
                                    'method' => 'put',
                                    'class'=>'form-horizontal single-techno',
                                    'role' => 'form',
                                    'files' => true,
                                    'id' => 'form-techno-' . $techno->id
                                ]) }}
                                    <div class="item-techno item-icon">
                                        <img src="{{ asset($techno->icon) }}" alt="{{ $techno->name }}" class="previewTechno" data-input="techno-{{ $techno->id }}" id="preview-techno-{{ $techno->id }}">
                                        {{ Form::file('icon', ['class' => 'form-control inputIconTechno', 'id' => 'techno-' . $techno->id]) }}
                                    </div>
                                    <div class="item-techno item-icon">
                                        <img src="{{ asset($techno->iconBlack) }}" alt="{{ $techno->name }}" class="previewTechno" data-input="technoBlack-{{ $techno->id }}" id="preview-technoBlack-{{ $techno->id }}">
                                        {{ Form::file('icon', ['class' => 'form-control inputIconTechno', 'id' => 'technoBlack-' . $techno->id]) }}
                                    </div>
                                    <div class="item-techno item-name">
                                        {{ Form::text('name', $techno->name, ['class' => 'form-control', 'disabled']) }}
                                    </div>
                                    <div class="item-techno item-type">
                                        {{ Form::select('type',['lang' => 'Language', 'soft' => 'Logiciel', 'fram' => 'Framework', 'cms' => 'CMS'], $techno->type, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="item-techno item-update">
                                        {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                                    </div>

                                    <a href="#" class="btn btn-danger delete-techno" data-id="{{ $techno->id }}" data-token="{{ csrf_token() }}">
                                        Delete
                                    </a>

                                {{ Form::close() }}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion-technos" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Softwares
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
                    <div class="panel-body">
                        @foreach($technos as $techno)
                            @if($techno->type == 'soft')
                                {{ Form::open([
                                    'route' => ['technos.update', $techno->id],
                                    'method' => 'put',
                                    'class'=>'form-horizontal single-techno',
                                    'role' => 'form',
                                    'files' => true,
                                    'id' => 'form-techno-' . $techno->id
                                ]) }}
                                <div class="item-techno item-icon">
                                    <img src="{{ asset($techno->icon) }}" alt="{{ $techno->name }}" class="previewTechno" data-input="techno-{{ $techno->id }}" id="preview-techno-{{ $techno->id }}">
                                    {{ Form::file('icon', ['class' => 'form-control inputIconTechno', 'id' => 'techno-' . $techno->id]) }}
                                </div>
                                <div class="item-techno item-icon">
                                    <img src="{{ asset($techno->iconBlack) }}" alt="{{ $techno->name }}" class="previewTechno" data-input="technoBlack-{{ $techno->id }}" id="preview-technoBlack-{{ $techno->id }}">
                                    {{ Form::file('icon', ['class' => 'form-control inputIconTechno', 'id' => 'technoBlack-' . $techno->id]) }}
                                </div>
                                <div class="item-techno item-name">
                                    {{ Form::text('name', $techno->name, ['class' => 'form-control', 'disabled']) }}
                                </div>
                                <div class="item-techno item-type">
                                    {{ Form::select('type',['lang' => 'Language', 'soft' => 'Logiciel', 'fram' => 'Framework', 'cms' => 'CMS'], $techno->type, ['class' => 'form-control']) }}
                                </div>

                                <div class="item-techno item-update">
                                    {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                                </div>

                                <a href="#" class="btn btn-danger delete-techno" data-id="{{ $techno->id }}" data-token="{{ csrf_token() }}">
                                    Delete
                                </a>

                                {{ Form::close() }}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion-technos" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Frameworks
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        @foreach($technos as $techno)
                            @if($techno->type == 'fram')
                                {{ Form::open([
                                    'route' => ['technos.update', $techno->id],
                                    'method' => 'put',
                                    'class'=>'form-horizontal single-techno',
                                    'role' => 'form',
                                    'files' => true,
                                    'id' => 'form-techno-' . $techno->id
                                ]) }}
                                <div class="item-techno item-icon">
                                    <img src="{{ asset($techno->icon) }}" alt="{{ $techno->name }}" class="previewTechno" data-input="techno-{{ $techno->id }}" id="preview-techno-{{ $techno->id }}">
                                    {{ Form::file('icon', ['class' => 'form-control inputIconTechno', 'id' => 'techno-' . $techno->id]) }}
                                </div>
                                <div class="item-techno item-icon">
                                    <img src="{{ asset($techno->iconBlack) }}" alt="{{ $techno->name }}" class="previewTechno" data-input="technoBlack-{{ $techno->id }}" id="preview-technoBlack-{{ $techno->id }}">
                                    {{ Form::file('icon', ['class' => 'form-control inputIconTechno', 'id' => 'technoBlack-' . $techno->id]) }}
                                </div>
                                <div class="item-techno item-name">
                                    {{ Form::text('name', $techno->name, ['class' => 'form-control', 'disabled']) }}
                                </div>
                                <div class="item-techno item-type">
                                    {{ Form::select('type',['lang' => 'Language', 'soft' => 'Logiciel', 'fram' => 'Framework', 'cms' => 'CMS'], $techno->type, ['class' => 'form-control']) }}
                                </div>

                                <div class="item-techno item-update">
                                    {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                                </div>

                                <a href="#" class="btn btn-danger delete-techno" data-id="{{ $techno->id }}" data-token="{{ csrf_token() }}">
                                    Delete
                                </a>

                                {{ Form::close() }}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFour">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion-technos" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            CMS
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                    <div class="panel-body">
                        @foreach($technos as $techno)
                            @if($techno->type == 'cms')
                                {{ Form::open([
                                    'route' => ['technos.update', $techno->id],
                                    'method' => 'put',
                                    'class'=>'form-horizontal single-techno',
                                    'role' => 'form',
                                    'files' => true,
                                    'id' => 'form-techno-' . $techno->id
                                ]) }}
                                <div class="item-techno item-icon">
                                    <img src="{{ asset($techno->icon) }}" alt="{{ $techno->name }}" class="previewTechno" data-input="techno-{{ $techno->id }}" id="preview-techno-{{ $techno->id }}">
                                    {{ Form::file('icon', ['class' => 'form-control inputIconTechno', 'id' => 'techno-' . $techno->id]) }}
                                </div>
                                <div class="item-techno item-icon">
                                    <img src="{{ asset($techno->iconBlack) }}" alt="{{ $techno->name }}" class="previewTechno" data-input="technoBlack-{{ $techno->id }}" id="preview-technoBlack-{{ $techno->id }}">
                                    {{ Form::file('icon', ['class' => 'form-control inputIconTechno', 'id' => 'technoBlack-' . $techno->id]) }}
                                </div>
                                <div class="item-techno item-name">
                                    {{ Form::text('name', $techno->name, ['class' => 'form-control', 'disabled']) }}
                                </div>
                                <div class="item-techno item-type">
                                    {{ Form::select('type',['lang' => 'Language', 'soft' => 'Logiciel', 'fram' => 'Framework', 'cms' => 'CMS'], $techno->type, ['class' => 'form-control']) }}
                                </div>

                                <div class="item-techno item-update">
                                    {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                                </div>

                                <a href="#" class="btn btn-danger delete-techno" data-id="{{ $techno->id }}" data-token="{{ csrf_token() }}">
                                    Delete
                                </a>

                                {{ Form::close() }}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
