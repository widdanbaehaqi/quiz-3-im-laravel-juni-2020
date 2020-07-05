<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArtikelModel
{
    public static function get_all() {
        $items = DB::table('artikel')
		            ->leftJoin('users', 'artikel.user_id', '=', 'users.id')
		            ->select('artikel.id as id', 'namalengkap', 'judul', 'users.id as user_id')
		            ->orderBy('id', 'desc')
		            ->get();
		return $items;
    }

    public static function simpan($data) {
        $tambah = DB::table('artikel')->insert($data);
    	return $tambah;
    }

    public static function get_isi($id) {
        $isi = DB::table('artikel')
		            ->leftJoin('users', 'artikel.user_id', '=', 'users.id')
		            ->select('isi', 'judul', 'namalengkap', 'artikel.id as id', 'artikel.created_at as created_at', 'artikel.updated_at as updated_at', 'tag', 'slug')
		            ->where('artikel.id', $id)
		            ->first();
    	return $isi;
    }

    public static function update($id, $request) {
        $item = DB::table('artikel')
                    ->where('id', $id)
                    ->update([
                        'judul' => $request['judul'],
                        'isi' => $request['isi'],
                        'tag' => $request['tag'],
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
        return $item;
    }

    public static function delete($id) {
        $hapus = DB::table('artikel')
                    ->where('id', $id)
                    ->delete();
        return $hapus;
    }
}
