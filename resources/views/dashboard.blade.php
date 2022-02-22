@extends('layouts.app')

@section('title', '| Main')

@section('content')
    @include('components/navbar')
    <div style="margin-top: 10vh;">
        <a href="{{ route('logout') }}" class="position-absolute top-0 end-0 link-secondary p-3" style="width: 1300px; height: 1000px; display: table-cell; text-align: center; vertical-align: middle;">
            <i class="bi bi-box-arrow-right fs-3"></i>
        </a>
        <div class=" card min-vh-100 justify-content-center align-items-center">
            @foreach ($tasks as $task)
            <div class="" style="margin: 5px">
                @include('components/showtasks')
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
