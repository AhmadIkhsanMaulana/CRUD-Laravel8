@extends('layout.app')

@section('title', 'Classes')

@section('content')
@if(Session::has('successMessage'))
    <div class="alert alert-success" role="alert">
        {{ session('successMessage') }}
    </div>
@endif

</br>
</br>
<div class="row">
      <div class="col-11 mx-auto">
        <h3>List of Class</h3>
        <a href="{{ url('classes/create') }}" class="btn btn-primary">Create a class</a>
        </br>
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Classname</th>
            <th scope="col">Teacher</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach($classes as $class)
                <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $class['name'] }}</td>
                <td>{{ $class['teacher_id'] }}</td>
                <td>
                    <a href="{{ url('classes') . '/' . $class['id'] }}">show</a>
                    <a href="{{ url('classes') . '/' . $class['id'] . '/edit' }}">edit</a>
                    <a href="{{ url('classes') . '/' . $class['id'] }}">delete</a>
                </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection

