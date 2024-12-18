@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1><i class="fa fa-user" > Edit Pengarang</i></h1><br>
    <a class="btn btn-primary btn-md"
href="{{ route('pengarang.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content') 
    
    @foreach($data as $b)
<form action="{{ route('pengarang.update',$b->id) }}" method="POST">
    @csrf{{-- croos-site request forgery (CSRF) = pencegah serangan yang dilakukan 
        oleh pengguna yang tidak terautentikasi --}}
    @method('put')
    
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $b->nama }}" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="{{ $b->email }}" class="form-control"/>
    </div>
    <div class="form-group">
        <label>No Panggilan</label>
        <input type="text" name="hp" value="{{ $b->hp }}" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="text" name="foto" value="{{ $b->foto }}" class="form-control">
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