@extends('layouts.master')

@section('title', 'Tambah Artikel')

@section('content')

    <div class="col-md-8">
        <!-- general form elements disabled -->
        <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Tambah Artikel</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form role="form" action="/artikel" method="POST">
            @csrf
            <!-- text input -->
                <label>Judul</label>
                <input type="text" id="judul" name="judul" class="form-control" placeholder="Enter ...">
            <!-- textarea -->
            <br>
                <label>Isi Artikel</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" placeholder="Enter ..."></textarea>
            <br>
                <label>Nama Anda</label>
                <select class="form-control" id="nama" name="nama" style="width: 100%; height: 50px;">
                    @foreach($artikel as $key => $item)
                    <option value="{{$item->user_id}}">{{$item->namalengkap}}</option>
                    @endforeach
                </select>
            <br>
                <label>Tag</label>
                <input type="tags" id="tag" name="tag" class="form-control" placeholder="Enter Tags ...">
                <label>Pisahkan dengan koma(,)</label>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
            </form>
        <!-- /.card-body -->
        </div>
    </div>

@endsection

@push('script')
@endpush
