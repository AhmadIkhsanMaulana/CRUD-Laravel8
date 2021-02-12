@extends('layout.app')

@section('title')

@endsection

@section('content')
</br>
</br>
@if(Session::has('errorMessage'))
    <div class="alert alert-danger" role="alert">
        {{ session('errorMessage') }}
    </div>
@endif
<div class="row">
      <div class="col-9 mx-auto">
        <div class="card my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Create a Class</h5>
            <form method="post" action="{{ url('classes/store') }}" class="form-signin">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="teacher">Teacher</label>
                    <input type="text" class="form-control" id="teacher" name="teacher" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection

