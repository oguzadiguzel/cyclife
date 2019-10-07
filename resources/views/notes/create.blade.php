@extends('layouts.template')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Yeni Not Ekle
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <form action="{{ route ('notes.store')}}" method="POST">
        @csrf
    <div class="box box-primary">
        
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form">
          <div class="box-body">
            <div class="form-group">
              <label>Başlık</label>
              <input name="title" type="text" class="form-control  @error('title') is-invalid @enderror">
              @error('title')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-warning"></i> {{ $message }} </h5>
                </div>   
              @enderror
            </div>
            <div class="form-group">
                <label>İçerik</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10"></textarea>
                @error('content')
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-warning"></i> {{ $message }} </h5>
                    </div>  
                @enderror
            </div>
          </div>
          <!-- /.box-body -->
    
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Ekle</button>
          </div>
        </form>
      </div>
    
    </form>
    </section>
    <!-- /.content -->
  </div>
@endsection