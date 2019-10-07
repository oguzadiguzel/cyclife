@extends('layouts.template')



@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notlar
        <small>Bir şeyler karala</small>
      </h1>
      <div class="pull-right">
            <a href="{{ route ('notes.create')}}" class="btn btn-primary">Not Ekle</a>
      </div>
    </section>
    
    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <ul class="timeline">
                <!-- timeline time label -->
                
                
                @foreach ($days as $day => $notes)
                <li class="time-label">
                    <span class="bg-red">
                        {{$day}}
                    </span>
                 </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                
                @foreach ($notes as $note)
                @auth
                @if(Auth::user()->id === $note->user->id )
                <li>
                  <i class="fa fa-edit bg-blue"></i>
                  
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i>{{$note->created_at->diffForHumans()}}</span>
        
                    <h3 class="timeline-header">{{$note->title}}</h3>
        
                    <div class="timeline-body">
                        {{$note->summary}}
                    </div>
                    <div class="timeline-footer">
                      <a href="{{ route ('notes.show', $note)}}" class="btn btn-primary btn-xs">Devamını Oku</a>
                      <a href="{{ route('notes.edit', $note->id)}}" class="btn btn-danger btn-xs">Düzenle</a>
                      <div class="pull-right">
                        <form action="{{ route('notes.delete', $note)}}" onsubmit="return confirm('Silem mi notu ?')" method="post">
                            @METHOD('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></button>
                        </form>
                      </div>
                    </div>
                  </div>

                </li>
                @endif
                @endauth
                @endforeach
                @endforeach
                
                
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
            </ul>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
