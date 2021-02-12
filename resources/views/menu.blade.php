@extends('layout.app')

@section('title', 'Menu')

@section('content')
<div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card w-100 mt-5">
            <div class="card-body">
                <div class="row">
                    <a href="{{ url('classes') }}" class="btn btn-info w-100">Go Class</a>
                </div>
                </br>

                <div class="row">
                    <a href="{{ url('teachers') }}" class="btn btn-info w-100">Go Teacher</a>
                </div>
                </br>

                <div class="row">
                    <a href="{{ url('student') }}" class="btn btn-info w-100">Go Student</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

