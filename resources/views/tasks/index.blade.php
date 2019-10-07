@extends('layouts.template')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Görevler Listesi
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box-body">
            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
            <ul class="todo-list">
                @foreach ($tasks as $task)
                <li>
                        <span class="text">
                       <form action="{{ route ('tasks.delete', $task)}}" method="POST"> 
                        @csrf
                        @METHOD('DELETE')
                        <button type="submit"  class="fa fa-trash-o"></button>
                        </form>
                    </span>
                    
                    <span class="text">{{ $task->name }}</span>
                    <small class="label label-default"><i class="fa fa-clock-o"></i>{{$task->created_at->diffForHumans()}}</small>
                    <div class="tools">
                    <a href="{{ route('tasks.edit', $task)}}" class="fa fa-edit"></a>

                    </div>

                </li>
                @endforeach


            </ul>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix no-border">
            <div class="card-header">Yeni Görev Ekle</div>    
            <div class="card-body">
                        <form action="{{ route ('tasks.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="taskname" class="form-control @error('taskname') is-invalid @enderror">
                                @error('taskname')
                                 <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Ekle</button>
                            </div>
                        </form>   
                    </div>
          </div>
        </div>

    </section>
    <!-- /.content -->
   
@endsection


