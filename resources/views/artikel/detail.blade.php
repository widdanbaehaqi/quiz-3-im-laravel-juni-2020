@extends('layouts.master')

@section('title', 'Detail Artikel')

@section('content')

	<div class="card">
		<div class="card-header">
            <h3 class="card-title">Judul : {{$data->judul}}</h3>
            <div class="card-subtitle">
                <p>Slug: {{$data->slug}}</p>
            </div>
        </div>
        <div class="card-body">
			{{$data->isi}}
		</div>
		<div class="card-footer">
			<p class="card-subtitle">Oleh: {{$data->namalengkap}}</p>
			<p class="card-subtitle">Dibuat: {{$data->created_at}}</p>
			<p class="card-subtitle">Diubah: {{$data->updated_at}}</p>
        </div>
        <div class="card-footer">
            @foreach ($tag as $item)
                <button type="button" class="btn btn-success active">{{$item}}</button>
            @endforeach
        </div>
	</div>

@endsection
