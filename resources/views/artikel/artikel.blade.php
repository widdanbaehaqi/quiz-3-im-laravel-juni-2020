@extends('layouts.master')

@section('title', 'Daftar Artikel')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Artikel</h3>
      <a href="/artikel/create" class="btn btn-info float-right" role="button"><i class="fa fa-plus"></i> Tambah Artikel</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="dataTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Judul</th>
            <th>Penanya</th>
            <th>Detail</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach($artikel as $key => $item)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->namalengkap }}</td>
            <td>
                <a href="/artikel/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
            </td>
            <td>
                <a href="/artikel/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
            </td>
            <td>
                <form action="/artikel/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('/sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('/sbadmin2/js/demo/datatables-demo.js')}}"></script>
    {{-- Script tambahan dari tugas --}}
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Memasangkan script sweet alert',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
    </script>
@endpush
