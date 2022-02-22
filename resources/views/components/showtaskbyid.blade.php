@extends('layouts.app')

@section('title', '| View Task')

@section('content')
@include('components/navbar')
<div class="min-vh-100 d-flex justify-content-center align-items-center" style="display: table-cell; text-align: center;vertical-align: middle;">
   @if($task->id == $task::min('id'))
      <a href="/tasks/{{$task::max('id')}}">
   @else
      @for($i=$task->id; $i != $task::min('id') ; $i--)
            <a href="/tasks/{{substr($task::where('id','<',$task->id)->where('id', '>=', ($task::min('id')))->orderBy('id', 'desc')->first('id'),6,2)}}">
      @endfor
   @endif     
      <i class="bi bi-caret-left-fill link-secondary fs-1"></i>
   </a>
   <div class="min-vh-90 d-flex justify-content-center align-items-center" style="width: 80%; color:#707070; border: #707070 solid 5px; align-content: space-around; border-radius: 20px">
   <div >
      <img src="{{asset($task->image)}}" alt="imagem /{{$task->title}}" style="max-height: 470px; max-width: 870px; margin: 10px">
   </div>
      <div >
         <ul style="list-style-type:none">
            <li>
               <h1 class="">Title: {{$task->title}}</h1>
            </li>
            <li>
               <p class="">Created by: {{$user->name}}</p>
            </li>
            <li>
               <br/><h3 class="">Description: {{$task->description}}</h3>
            </li>
            <li>
               <p class="">Finish until: {{$task->finish_when}}</p>
            </li>
            <li>
               <p style="  margin: 10px;">
                  @if($task->is_complete==1)
                  <i class="bi bi-check-square-fill link-secondary">&nbspCompleta</i>
                  @else
                  <i class="bi bi-square link-secondary">&nbspNão completa</i>
                  @endif
               </p>
            </li>
         </ul>
      </div>
   </div>
   @if($task->id == $task::max('id'))
      <a href="/tasks/{{$task::min('id')}}">
   @else
      @for($i=$task->id; $i != $task::max('id') ; $i++)
            <a href="/tasks/{{substr($task::where('id', '<=', ($task::max('id')))->where('id','>',$task->id)->first('id'),6,2)}}">
      @endfor
   @endif    
      <i class="bi bi-caret-right-fill link-secondary fs-1"></i>
   </a>
</div>
@endsection