<!-- Pertemuan 6 -->
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1><i class="fa fa-graduation-cap" > Edit Mahasantri</i></h1><br>
    <a class="btn btn-primary btn-md"
href="{{ route('mahasantri.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a>
@stop
@section('content') 
    @php
        $rs1 = App\Models\Jurusan::all();       
        $rs2 = App\Models\Dosen::all();
    @endphp
    @foreach($data as $b)
<form action="{{ route('mahasantri.update',$b->id) }}" method="POST">
    @csrf{{-- croos-site request forgery (CSRF) = pencegah serangan yang dilakukan 
        oleh pengguna yang tidak terautentikasi --}}
    @method('put')
    
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $b->nama }}" class="form-control"/>
    </div>
    <div class="form-group">
        <label>NIM</label>
        <input type="text" name="nim" value="{{ $b->nim }}" class="form-control"/>
    </div>   
    <div class="form-group">
        <label>Pengarang</label>
        <select class="form-control" name="jurusan_id">
            <option value="">--Pilih Jurusan--</option>
            @foreach ($rs1 as $p)
                @php
                    $sel1 = ($p->id == $b->jurusan_id) ? 'selected' : '';
                @endphp
                <option value="{{ $p->id }}" {{ $sel1}}>{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Dosen</label><br>
        @foreach($rs2 as $k)
    	    @php
    	        $sel2 = ($k->id == $b->dosen_id) ? 'checked' : '';
    	    @endphp
    	    <input type="radio" name="dosen_id"
            value="{{ $k->id }}" {{ $sel2 }}/>{{ $k->nama }}  &nbsp; &nbsp;
    	@endforeach
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
<!-- Akhir Pertemuan 6 -->