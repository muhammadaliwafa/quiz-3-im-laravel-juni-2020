@extends('layouts.master')
@section('content')
<div class="ml-3">
    {{-- <label for="nama">Anda Masuk Sebagai: </label>
            <select name="user_id" id="nama">
                @foreach ($users as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select> --}}
    <h3>List Artikel</h3>
    <table class="table">
        <thead>
        <tr>
            <th>No</th>
            <th>Judul Artikel</th>
            <th>Penulis</th>
            <th>Action</th>
            
        </tr>
        </thead>
        <tbody>
            @foreach($items as $key => $item)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        {{-- <a href="/jawaban/{{$item->id}}">lihat jawaban</a> --}}
                        <a href="/artikel/{{$item->id}}" class="btn btn-sm btn-info">show</a>
                        <a href="/artikel/{{$item->id}}/edit" class="btn btn-sm btn-default">edit</a>
                        <form action="/artikel/{{$item->id}}" style="display: inline" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/artikel/create" class="btn btn-primary mt-3">buat artikel</a>   
</div> 
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script >
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    });
    </script>
@endpush