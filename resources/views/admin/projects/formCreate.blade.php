<div class="form-group">
    <form action="{{ route('projects.upload') }}" class="dropzone" id="formupload2" method="post">
        {{ csrf_field() }}
        <input type="hidden" id="file" name="file"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" /><br/>
    </form>
</div>
<form class="form-horizontal" role="form" method="POST" action="{{ route('projects.store') }}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="titre" class="col-md-2 control-label">Titre</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="title" autofocus>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-md-2 control-label">Description</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="description">
        </div>
    </div>
    <div class="form-group">
        <label for="date" class="col-md-2 control-label">Date de réalisation</label>
        <div class="col-md-9">
            <input type="date" class="form-control" name="date">
        </div>
    </div>
    <div class="form-group">
        <label for="date" class="col-md-2 control-label">Date de réalisation</label>
        <div class="col-md-9">
            @foreach($categories as $categorie)
                <label class="checkbox-inline">
                    <input type="checkbox" value="{{ $categorie->id }}" name="category[]">{{ $categorie->name }}
                </label>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </div>
    </div>
</form>