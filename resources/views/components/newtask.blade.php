@extends('layouts.app')

@section('title', '| Criar')

@include('components/navbar')
@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center">
    <form class="mw-100 " action="store" method="post" enctype="multipart/form-data" style="width: 400px;">
        @csrf
        <div class="text-center mb-5">

           <h2 style="color: #707070">Create New Task</h2>
            
        </div>
        <div class="mb-3">
            <input class="form-control" type="" name="title" placeholder="Task title" required>
        </div>
        <div class="mb-3">
            <input class="form-control" type="file" name="image" accept="image/*">{{--accept = todo tipo de imagem / required campo obrigatório--}}
        </div>
        
       <div class="mb-3">
           <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="description"></textarea>
       </div>

       <div class="mb-3">
           <input class="form-control" type="datetime" name="finish_when" placeholder="yyyy-mm-dd hh:mm:ss">
        </div>
        
        <div class="d-grid gap-2">
            <button class="btn btn-outline-dark" type="submit">Save Task</button>
        </div>
    </form>
</div>
@endsection