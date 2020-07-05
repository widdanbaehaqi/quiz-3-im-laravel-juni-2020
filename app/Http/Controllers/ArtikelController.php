<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Str;
use \App\Models\ArtikelModel;

class ArtikelController extends Controller
{
    public function index() {
    	$artikel = ArtikelModel::get_all();
    	return view('artikel.artikel', compact('artikel'));
    }

    public function create() {
        $artikel = ArtikelModel::get_all();
    	return view('artikel.tambah', compact('artikel'));
    }

    public function store(Request $request) {
        $judul = $request["judul"];
    	$isi = $request["isi"];
        $user_id = $request["nama"];
    	$data = array(
            'judul'=>$judul,
            'isi'=>$isi,
            'slug' => Str::slug($judul),
            'user_id'=>$user_id,
            'tag' => $request["tag"],
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        );
    	$simpan = ArtikelModel::simpan($data);
    	return redirect('/artikel');
    }

    public function show($id) {
        $data = ArtikelModel::get_isi($id);
        $tag = explode(",", $data->tag);
        return view('artikel.detail', compact('data', 'tag'));
    }

    public function edit($id) {
        $data = ArtikelModel::get_isi($id);
        return view('artikel.edit', compact('data'));
    }

    public function update($id, Request $request) {
        $data = ArtikelModel::update($id, $request->all());
        return redirect('/artikel');
    }

    public function destroy($id) {
        $data = ArtikelModel::delete($id);
        return redirect('/artikel');
    }
}
