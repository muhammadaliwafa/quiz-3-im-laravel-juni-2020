@extends('layouts.master')

@section('content')
    <h2>Judul: {{$article->judul}}</h2>
    <h5>slug: {{$article->slug}}</h5>
    <p>{{$article->isi}}</p>
    <section>
        @foreach ($article->tag as $item)
        <a href="/artikel/{{$item}}" class="btn btn-sm btn-success">{{$item}}</a>
        @endforeach
    </section>
    <br>
    <a href="/artikel" class="btn btn-sm btn-primary">list artikel</a>
@endsection