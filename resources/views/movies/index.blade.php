@extends('layouts.template')



@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        İzlenecekler Listesi
      </h1>
    </section>
    
    <!-- Main content -->

    <section class="content container-fluid">
      <div>  
      <form action="{{ route ('movies.search')}}" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="name" class="form-control" placeholder="Yapım adı ara...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form>
        </div>
      @foreach ($movies as $movie)
      <div class="col-md-2">  
        <div class="box box-solid">
          <div class="box-header with-border">
              <h5 class="box-title">{{$movie->title}}</h5>
          </div> 
                  
                  <div class="box-body">
                      <img src="{{$movie->image}}" class="card-img-top" alt="...">
                    <p class="box-text">{{$movie->title}}</p>
                    <p class="box-text">{{$movie->year}}</p>
                    <p class="box-text">{{$movie->movietype}}</p>
                    <form action="{{ route ('movies.delete', $movie)}}" onsubmit="return confirm('İzleneceklerden kaldırılsın mı ?')" method="post">
                      @METHOD('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></button>
                    </form>
                
                  </div>

          
        </div>
      </div>
      @endforeach

      
 
    </section>

    <!-- /.content -->
</div>

@endsection
