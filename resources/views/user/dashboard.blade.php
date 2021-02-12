@extends('layout.app')

@section('title', 'dashboard')

@section('content')
<div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card w-100 mt-5">
            <div class="card-body">
                <h5 class="card-title">Welcome {{ $me['name'] }}</h5>
                <p class="card-text">Let's create some memories</p>
                <a href="{{ url('menus') }}" class="btn btn-primary">Go somewhere else</a>
            </div>
        </div>
    </div>
</div>
@endsection

