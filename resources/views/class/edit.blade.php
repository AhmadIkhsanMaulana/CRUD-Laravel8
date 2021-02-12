@extends('layout.app')

@section('title')

@section('content')
@if(Session::has('errorMessage'))
    <div class="alert alert-danger" role="alert">
        {{ session('errorMessage') }}
    </div>
@endif
@if(Session::has('successMessage'))
    <div class="alert alert-success" role="alert">
        {{ session('successMessage') }}
    </div>
@endif
<div class="row">
      <div class="col-9 mx-auto">
        <div class="card my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Edit a Class</h5>
            <form method="post" action="{{ url('classes') . '/' . $classesId . '/store'}}" class="form-signin">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $class['name'] }}" required>
                </div>
                <div class="form-group">
                    <label for="teacher">Teacher</label>
                    <input type="text" class="form-control" id="teacher" name="teacher" value="{{ $class['teacher_id'] }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection

