@extends('layouts.master')

@section('content')
    <div class="ml-3">
        {{-- <h3>Selamat datang {{$user->name}}! </h3> --}}
        
        <form action="/artikel/{{$items->id}}" method="POST">
            @csrf
            @method('PUT')
            {{-- <label for="nama">Artikel ini dibuat dan hanya dapat di edit oleh: {{$items->name}} </label> --}}
            {{-- <input type="hidden" name="user_id" value="{{$items->user_id}}"> --}}
            <div class="form-group">
            {{-- <input type="hidden" name="user_id" value="{{$items->id}}"> --}}
                <label for="title">Judul</label><br>
                <input type="text" placeholder="enter the title" name="judul" id="title" value="{{$items->judul}}"><br>
                <label for="isi">isi artikel:</label>
                <textarea type="text" class="form-control" placeholder="Enter your article" name="isi" id="isi">{{$items->isi}}</textarea>
                <label for="tag">tag</label><br>
                <input type="text" name="tag" id="tag" value="{{$items->tag}}"><br>
            </div>
            <div class="form-group form-check">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="/artikel" class="btn btn-primary mt-3">kembali</a>

    </div>
    
@endsection