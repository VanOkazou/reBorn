@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="panel-group" id="accordion-technos" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
                                    'class'=>'form-horizontal',
                                    'role' => 'form',
                                    'files' => true
                                ]) }}
                                
                                <div class="single-techno">
                                    <div class="item-techno item-icon">
                                        <img src="{{ asset($techno->icon) }}" alt="{{ $techno->name }}" class="previewTechno" data-input="inputIcon-{{ $techno->id }}">
                                        {{ Form::file('icon', ['class' => 'form-control', 'id' => 'inputIcon-' . $techno->id]) }}
                                    </div>
                                </div>

                                {{ Form::close() }}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
