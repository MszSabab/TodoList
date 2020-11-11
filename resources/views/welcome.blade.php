@extends('layouts.app')
@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-center">
    <div class="text-center" style="width: 40%">
    <h1 class="display-2 text-white">Todo List<h1>
    
        <form action="{{route('todo.store')}}" method="POST">
        
        @csrf 
            <div class="input-group nb-3 w-100" >
            <input type="text" class="form-control form-control-lg " name='title' placeholder="Type Here" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                <button class="btn btn-success" type="submit" id="button-addon2">Add to the list</button> 
                </div>
            </div>
        </form>

        <h2 class="text-white pt-2">Your Todo List</h2>
        <div class="bg-white w-100">

        @foreach($todos as $todo)
        <div class="w-100 d-flex align-items-center justify-content-between">
            <div class=p-3> @if($todo->completed==0)
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                <rect x="9" y="3" width="6" height="4" rx="2" />
                <line x1="9" y1="12" x2="9.01" y2="12" />
                <line x1="13" y1="12" x2="15" y2="12" />
                <line x1="9" y1="16" x2="9.01" y2="16" />
                <line x1="13" y1="16" x2="15" y2="16" />
            </svg>
            @else 
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checks" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M7 12l5 5l10 -10" />
                <path d="M2 12l5 5m5 -5l5 -5" />
            </svg>
            @endif{{$todo->title}}</div>
        

            <div class="mr-1 d-flex align-items-center">
                @if($todo->completed ==0)
                <form action="{{route('todo.update',$todo->id)}}" method="POST">
                @method('PUT')
                @csrf 
                <input type="text" name="completed" value="1" hidden >
                <button class="btn btn-success"> Mark if its completed</button>
                </form>
                @else
                <form action="{{route('todo.update',$todo->id)}}" method="POST">
                @method('PUT')
                @csrf 
                <input type="text" name="completed" value="0" hidden >
                <button class="btn btn-warning"> Press again to mark as uncompleted</button>
                </form>

                @endif
                <a class="inlane block" href="{{route('todo.edit',$todo->id)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit ml-2" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                        <line x1="16" y1="5" x2="19" y2="8" />
                    </svg>
                </a>

                
                <form action="{{route('todo.destroy', $todo->id)}}" method ="POST">
                @csrf 
                @method('DELETE')
                
                <button class="border-0 bg-transparent ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="4" y1="7" x2="20" y2="7" />
                    <line x1="10" y1="11" x2="10" y2="17" />
                    <line x1="14" y1="11" x2="14" y2="17" />
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg>
                </button>
                </form>
            </div>
        </div>

        @endforeach

    </div>
</div>

@endsection
