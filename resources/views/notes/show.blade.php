@extends('layouts.template')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $note->title }}</h3>

              <div class="box-tools pull-right">
                <a href="{{ URL::to( 'notes/' . $previous ) }}" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="{{ URL::to( 'notes/' . $next ) }}" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>

              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p>{{ $note->content }}</p>
              </div>
              <!-- /.mailbox-read-message -->
			   <div class="box-footer">
              <div class="pull-right">
                <form action="{{ route('notes.delete', $note)}}" onsubmit="return confirm('Silem mi notu ?')" method="post">
                    @METHOD('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-default"><i class="fa fa-trash-o"></i>Sil</button>
                </form>
              </div>
              <a href="{{ route('notes.edit', $note->id)}}" class="btn btn-default"><i class="fa fa-edit"></i>Düzenle</a>
            </div>
            </div>

    </section>
    <!-- /.content -->
  </div>
@endsection
