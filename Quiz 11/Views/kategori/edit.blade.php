@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1><i class="fa fa-list" > Edit Kategori</i></h1><br>
    <a class="btn btn-primary btn-md"
href="{{ route('kategori.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content') 
    
    @foreach($data as $b)
<form action="{{ route('kategori.update',$b->id) }}" method="POST">
    @csrf{{-- croos-site request forgery (CSRF) = pencegah serangan yang dilakukan 
        oleh pengguna yang tidak terautentikasi --}}
    @method('put')
    
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $b->nama }}" class="form-control"/>
    </div>
     
    <button type="submit" class="btn btn-info"><i class="fa fa-check" aria-hidden="true"></i></button>   
</form>
@endforeach

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi'); </script>
@stop