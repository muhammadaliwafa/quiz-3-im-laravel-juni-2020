<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArticleModel{
    public static function get_all(){
            $data = DB::table('users')
                ->join('articles', 'users.id', '=', 'articles.user_id')
                ->select('users.*', 'articles.*')
                ->get();
            return $data;
        }

    public static function get_user(){
        $new_item = DB::table('users')->get();
        return $new_item;
    }

    public static function save($data){
        $new_item = DB::table('articles')->insert([
            'user_id'=>$data['user_id'],
            'judul'=>$data['judul'],
            'isi'=>$data['isi'],
            'slug'=>$data['slug'],
            'tag'=>$data['tag']
        ]);

        return $new_item;
    }

    public static function get_article_by_id($id){
        $new_item = DB::table('articles')->where('id','=', $id)->first();
        return $new_item;
    }

    public static function update($id, $data){
        $new_item = DB::table('articles')
                        ->where('id', $id)
                        ->update([
                            'judul'=>$data['judul'],
                            'isi'=>$data['isi'],
                            'slug'=>$data['slug'],
                            'tag'=>$data['tag']
                        ]);

        return $new_item;
    }

    public static function destroy($id){
        $deleted = DB::table('articles')
                        ->where('id', $id)
                        ->delete();

        return $deleted;
    }

    public static function saveAcc($data){
        $new_item = DB::table('users')->insert([
            'name'=>$data['name'],
            'password'=>$data['password']
        ]);

        return $new_item;
    }
}