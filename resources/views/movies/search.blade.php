@extends('layouts.template')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Yeni Film Ekle
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box-body">
      <div class="table-responsive">
        <table class="table no-margin">
          <thead>
          <tr>
            <th>IMDB ID</th>
            <th>Yapım Adı</th>
            <th>Yapım Tarihi</th>
            <th>Yapım Türü</th>
            <th></th>
          </tr>
          </thead>
          @foreach ($results as $result)
          <tbody>
          <tr>
              
            <td>{{$result->imdbID()}}</td>
            <td>{{$result->title()}}</td>
            <td>{{$result->year()}}</td>
            <td>{{$result->movietype()}}</td>
            <td><a href="{{ route ('movies.create', $result->imdbID())}}">İncele</a></td>
            
          </tr>
          </tbody>
          @endforeach
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
       
    </section>
    <!-- /.content -->
  </div>
@endsection
