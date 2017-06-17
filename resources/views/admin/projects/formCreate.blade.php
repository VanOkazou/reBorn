<form class="form-horizontal" role="form" method="POST" action="{{ route('projects.store', ['id' => Auth::user()->id]) }}">
    {{ method_field('PUT') }}
    {{csrf_field()}}
    <div class="form-group">
        <label for="titre" class="col-md-2 control-label">Titre</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="username" autofocus>
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
            <select class="selectpicker" name="categorie">
                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
            </select>
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