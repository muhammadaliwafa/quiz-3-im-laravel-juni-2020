<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleModel;
use Illuminate\Support\Str;

class ArticleController extends Controller{
    public function index(){
        $items = ArticleModel::get_all();
        $users = ArticleModel::get_user();
        return view('article.index', compact('items', 'users'));
    }
    public function create(){
        $user = ArticleModel::get_user();//1 adalah id user
        return view('article.create', compact('user'));
    }
    public function store(Request $request){
        $data = $request->all();
        $data['slug'] = Str::slug($data['judul'], '-');
        unset($data["_token"]);
        $item = ArticleModel::save($data);
        if($item){
            return redirect('/artikel');
        }
        

    }
    public function edit($id){
        $items = ArticleModel::get_article_by_id($id);
        return view('article.edit', compact('items'));
    }
    public function update($id, Request $request){
        $data = $request->all();
        $data['slug'] = Str::slug($data['judul'], '-');
        $item = ArticleModel::update($id, $data);
        if($item){
            return redirect('/artikel');
        }

    }
    public function destroy($id){
        $deleted = ArticleModel::destroy($id);
        if($deleted){
            return redirect('/artikel');
        }

    }

    public function show($id){
        $article = ArticleModel::get_article_by_id($id);
        $tag = $article->tag;
        $string = str_replace('#', '', $tag);
        $article->tag=explode(" ",$string);
        if($article != null){
            return view('article.show', compact('id', 'article'));  
        }else{
            return "error : article kosong";
        }
        
    }
    public function newAcc(Request $request){
        $data = $request->all();
        unset($data["_token"]);
        $item = ArticleModel::saveAcc($data);
        if($item){
            return redirect('/artikel/create');
        }
        

    }
   
}