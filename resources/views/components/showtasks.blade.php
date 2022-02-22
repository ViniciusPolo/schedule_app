<div class="card flex-row" style="width: 1300px; margin: 10px; ">
    <div> 
        <div style="margin: 10px;">
            <h3 style="width: 600px;">Tarefa: {{$task->title}}</h3>
            <p>Created by: {{$user->name}}</p>
        </div>
        <div>
            <p class="card-text" style="width: 800px; margin: 10px;">    
                Descrição: <span>{{$task->description}}</span>
            </p>
            <p style="width: 1000px; margin: 10px;">
                @if($task->is_complete==1)
                <i class="bi bi-check-square-fill link-secondary">&nbspCompleta</i>
                @else
                <i class="bi bi-square link-secondary">&nbspNão completa</i>
                @endif
            </p>
        </div>   
    </div>
        <a href="/tasks/{{$task->id}}" class="link-secondary p-3 nav-link me-3">
            <i class="bi bi-eyeglasses fs-1 link-secondary">{{--<i> ícone no html--}}
            </i>
        </a>
        <a href="/tasks/edit/{{$task->id}}" class="link-secondary p-3 nav-link me-3">
            <i class="bi bi-pencil-square fs-1 link-secondary">{{--<i> ícone no html--}}
            </i>
        </a>
        <a href="/dashboard/delete/{{$task->id}}" class="link-secondary p-3 nav-link me-3">
            <i class="bi bi-trash fs-1">{{--<i> ícone no html--}}
            </i>
        </a>
</div>

