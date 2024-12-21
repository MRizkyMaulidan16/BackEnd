<!-- Pertemuan 6 -->
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1><i class="fa fa-graduation-cap" > Form Mahasantri</i></h1><br>
    <a class="btn btn-primary btn-md"
href="{{ route('mahasantri.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content') {{-- Isi konten Data Form Imput mahasantri --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @php
        $rs1 = App\Models\Jurusan::all();     
        $rs2 = App\Models\Dosen::all();        
    @endphp
<form method="POST" action="{{ route('mahasantri.store') }}">
    @csrf
    {{-- croos-site request forgery (CSRF) = pencegah serangan yang dilakukan 
        oleh pengguna yang tidak terautentikasi --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Nim</label>
        <input type="text" class="form-control" name="nim">
    </div> 
    <div class="form-group">
        <label>Jurusan</label>
        <select class="form-control" name="jurusan_id">
            <option value="">--Pilih Pengarang--</option>
            @foreach ($rs1 as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Dosen</label><br>
        @foreach($rs2 as $k)
    	    <input type="radio" name="dosen_id"
            value="{{ $k->id }}"/>{{ $k->nama }} &nbsp; &nbsp;
    	@endforeach
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