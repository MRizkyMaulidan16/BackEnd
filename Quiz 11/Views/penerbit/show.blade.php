<!-- Pertemuan 6 -->
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1><i class="fa fa-user" > Detail Penerbit</i></h1><br>
    <a class="btn btn-primary btn-md"
href="{{ route('penerbit.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content') 
    @foreach($ar_penerbit as $b)
<form >
    @csrf
    {{-- croos-site request forgery (CSRF) = pencegah serangan yang dilakukan 
        oleh pengguna yang tidak terautentikasi --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" placeholder="{{ $b->nama }}" class="form-control" disabled/>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" placeholder="{{ $b->alamat }}" class="form-control" disabled/>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" placeholder="{{ $b->email }}" class="form-control" disabled/>
    </div>
    <div class="form-group">
        <label>Website</label>
        <input type="text" placeholder="{{ $b->website }}" class="form-control" disabled/>
    </div>
    <div class="form-group">
        <label>No Handphone</label>
        <input type="text" placeholder="{{ $b->telp }}" class="form-control" disabled/>
    </div>
    
        
</form>
@endforeach
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi'); </script>
@stop
<!-- Akhir Pertemuan 6 -->