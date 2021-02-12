@extends('layout.app')

@section('title', 'show')

@section('content')
<div class="row">
      <div class="col-9 mx-auto">
        <div class="card my-5">
          <div class="card-body">
            <form class="form-signin">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $class['name'] }}" readonly disabled>
                </div>
                <div class="form-group">
                    <label for="teacher">Teacher</label>
                    <input type="text" class="form-control" id="teacher" name="teacher" value="{{ $class['teacher_id'] }}" readonly disabled>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection

