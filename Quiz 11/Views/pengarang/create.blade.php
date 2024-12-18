<!-- Pertemuan 6 -->
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1><i class="fa fa-user" > Form Pengarang</i></h1><br>
    <a class="btn btn-primary btn-md"
href="{{ route('pengarang.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content') {{-- Isi konten Data Form Imput Pengarang --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('pengarang.store') }}">
    @csrf
    {{-- croos-site request forgery (CSRF) = pencegah serangan yang dilakukan 
        oleh pengguna yang tidak terautentikasi --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>No Telephone</label>
        <input type="text" class="form-control" name="hp">
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="text" class="form-control" name="foto">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi'); </script>
@stop
<!-- Akhir Pertemuan 6 -->