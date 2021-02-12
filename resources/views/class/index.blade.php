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
                $no = $classes['meta']['from'];
            @endphp
            @foreach($classes['data'] as $class)
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

         <!-- Pagination -->
         @if($classes && ($classes['meta']['total'] > 20))
            <nav class="navigation mt-5">
                <div>
                    <span class="pagination-detail">{{ $classes['meta']['to'] ?? 0 }} dari {{ $classes['meta']['total'] }} class</span>
                </div>
                <ul class="pagination">
                    <li class="page-item {{ (request()->page ?? 1) - 1 <= 0 ? 'disabled' : '' }}">
                        <a class="page-link" href="?page={{ (request()->page ?? 1) - 1 }}" tabindex="-1">&lt;</a>
                    </li>
                    @for($i=1; $i <= $classes['meta']['last_page']; $i++)
                    <li class="page-item {{ (request()->page ?? 1) == $i ? 'active disabled' : '' }}">
                        <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                    </li>
                    @endfor
                    <li class="page-item {{ ((request()->page ?? 1) + 1) > $classes['meta']['last_page'] ? 'disabled' : '' }}">
                        <a class="page-link" href="?page={{ (request()->page ?? 1) + 1 }}">&gt;</a>
                    </li>
                </ul>
            </nav>
        @endif()
    </div>
</div>
@endsection

