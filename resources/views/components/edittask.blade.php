@extends('layouts.app')

@section('title', '| Criar')

@include('components/navbar')
@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center">
    <form class="mw-100 " action="/tasks/update/{{ $task->id }}" method="post" style="width: 400px;">
        @csrf
        <div class="text-center mb-5">

           <h2 style="color: #707070">Update Task</h2>
            
        </div>
        <div class="mb-3">
            <input class="form-control" type="" name="title" value="{{$task->title}}" required>
        </div>
        
       <div class="mb-3">
           <textarea class="form-control" name="description" id="" cols="30" rows="10">{{$task->description}}</textarea>
       </div>

       <div class="mb-3">
           <input class="form-control" type="datetime" name="finish_when" placeholder="finish when">
        </div>
        
        <div class="mb-3 form-check">
            <input name="is_complete" type="checkbox" class="form-check-input"
                @if($task->is_complete==1)
                    checked
                @endif
            >
            <label class="form-check-label" for="is_complete">Is Complete</label>
        </div>
        
        <div class="d-grid gap-2">
            <button class="btn btn-outline bg-dark" type="submit" style="color: #909090">Save Task</button>
        </div>
    </form>
</div>
@endsection