<form class="form-horizontal" role="form" method="POST" action="{{ route('iamanevangelist.update', ['id' => $user->id]) }}">
    {{ method_field('PUT') }}
    {{csrf_field()}}
    <div class="form-group">
        <label for="username" class="col-md-2 control-label">Username</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="username" value="{{ $user->username }}" autofocus>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-md-2 control-label">Lastname</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-md-2 control-label">Firstname</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
        </div>
    </div>
    <div class="form-group">
        <label for="job" class="col-md-2 control-label">Job</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="job" value="{{ $user->job }}">
        </div>
    </div>
    <div class="form-group">
        <label for="city" class="col-md-2 control-label">City</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="city" value="{{ $user->city }}">
        </div>
    </div>
    <div class="form-group">
        <label for="slug" class="col-md-2 control-label">Slug</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="slug" value="{{ $user->slug }}">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-md-2 control-label">email</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
        </div>
    </div>
    <div class="form-group">
        <label for="facebook" class="col-md-2 control-label">Facebook</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="facebook" value="{{ $user->fb }}">
        </div>
    </div>
    <div class="form-group">
        <label for="twitter" class="col-md-2 control-label">Twitter</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="twitter" value="{{ $user->tw }}">
        </div>
    </div>
    <div class="form-group">
        <label for="linkedin" class="col-md-2 control-label">Linkedin</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="linkedin" value="{{ $user->ln }}">
        </div>
    </div>
    <div class="form-group">
        <label for="behance" class="col-md-2 control-label">Behance</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="behance" value="{{ $user->bh }}">
        </div>
    </div>
    <div class="form-group">
        <label for="dribble" class="col-md-2 control-label">Dribble</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="dribble" value="{{ $user->db }}">
        </div>
    </div>
    <div class="form-group">
        <label for="viadeo" class="col-md-2 control-label">Viadeo</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="viadeo" value="{{ $user->viadeo }}">
        </div>
    </div>
    <div class="form-group">
        <label for="about" class="col-md-2 control-label">About</label>
        <div class="col-md-9">
            <textarea type="text" class="form-control" name="about">{{ $user->about }}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="slogan" class="col-md-2 control-label">Slogan</label>
        <div class="col-md-9">
            <textarea type="text" class="form-control" name="slogan">{{ $user->slogan }}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-md-2 control-label">Description</label>
        <div class="col-md-9">
            <textarea type="text" class="form-control" name="description">{{ $user->description }}</textarea>
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