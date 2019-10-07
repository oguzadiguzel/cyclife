@extends('layouts.template')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content container-fluid">

        <div class="row">
          <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-text-width"></i>
    
                  <h3 class="box-title">İçerik</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <dl>
                    <dt> @if (($photo_url = $movie->photo() ) != FALSE) 
                        <img src="{{$photo_url}}" alt="Cover">
                       @else 
                        {{ "Fotoğraf Yok" }}@endif</dt>
                    <dt>Yapım Adı</dt>
                    <dd>{{$movie->title()}}</dd>
                    <dt>Yapım Yılı</dt>
                    <dd>{{$movie->year()}}</dd>
                    <dt>Yapım Türü</dt>
                    <dd>{{$movie->movietype()}}</dd>
                  </dl>
                  <form action="{{ route ('movies.store')}}" method="POST">
                      @csrf
                      <form role="form">
                            <input name="title" type="hidden" class="form-control" value="{{ $movie->title() }}">
                            <input name="year"  type="hidden" class="form-control" value="{{ $movie->year() }}">
                            <input name="movietype" type="hidden" class="form-control" value="{{ $movie->movietype() }}">
                            <input name="image" type="hidden" class="form-control" value="{{ $photo_url }}">
                            <button type="submit" class="btn btn-primary">İzleneceklere Ekle</button>
                      </form>
                  </form>
                </div>

                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          
          <!-- /.col -->
   
        <!-- /.row -->
        </div>
        
      </section>
      <!-- /.content -->
    <!-- /.content -->
  </div>
@endsection


