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
    {{ $result->imdbID() }}
    <!-- /.content -->
  </div>
@endsection