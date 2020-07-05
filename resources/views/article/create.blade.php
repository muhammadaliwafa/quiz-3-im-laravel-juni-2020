@extends('layouts.master')

@section('content')
    <div class="ml-3">
        {{-- <h3>Selamat datang {{$user->name}}! </h3> --}}
        
        <form action="/artikel" method="POST">
            @csrf
            <label for="nama">Silahkan pilih akun: </label>
            <select name="user_id" id="nama">
                @foreach ($user as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            <div class="form-group">
            {{-- <input type="hidden" name="user_id" value="{{$user->id}}"> --}}
                <label for="title">Judul: </label><br>
                <input type="text" placeholder="enter the title" name="judul" id="title"><br>
                <label for="isi">isi artikel:</label>
                <textarea type="text" class="form-control" placeholder="Enter your article" name="isi" id="isi"></textarea>
                <label for="tag">tag:</label><br>
                <input type="text" placeholder="Ex. #trending #top" name="tag" id="tag"><br>
            </div>
            <div class="form-group form-check">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
        <form action="/create-account" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">belum terdaftar? silakan buat baru</label><br>
                <input type="text" placeholder="username" name="name"><br>
                <input type="password" name="password" placeholder="password" class="mt-3">
            </div>
        <button type="submit" class="btn btn-primary">Add Account</button>
        </form>
        <a href="/artikel" class="btn btn-primary mt-3">kembali</a>

    </div>
    
@endsection