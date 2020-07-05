@extends('layouts.master')

@section('title', 'Edit Artikel')

@section('content')

	<div class="col-md-8">
        <!-- general form elements disabled -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Edit Artikel</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form role="form" action="/artikel/{{ $data->id }}" method="POST">
            @csrf
            @method('PUT')
              <!-- text input -->
                <label>Judul</label>
                <input type="text" id="judul" name="judul" class="form-control" value="{{ $data->judul }}">
              <!-- textarea -->
                <label>Isi</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" value="{{ $data->isi }}">{{ $data->isi }}</textarea>
                <label>Tag</label>
                <input type="text" id="tag" name="tag" class="form-control" value="{{ $data->tag }}">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
    </div>
@endsection
