<!-- Pertemuan 6 -->
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1><i class="fa fa-graduation-cap" > Detail Mahasantri</i></h1><br>
    
@stop
@section('content') 
    @php
        $rs1 = App\Models\Jurusan::all();     
        $rs2 = App\Models\Dosen::all(); 
        $rs3 = App\Models\Matakuliah::all();
    @endphp
    @foreach($ar_mahasantri as $b)
<form >
    @csrf
    {{-- croos-site request forgery (CSRF) = pencegah serangan yang dilakukan 
        oleh pengguna yang tidak terautentikasi --}}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" placeholder="{{ $b->nama }}" class="form-control" disabled/>
    </div>
    <div class="form-group">
        <label>NIM</label>
        <input type="text" placeholder="{{ $b->nim }}" class="form-control" disabled/>
    </div>
    <div class="form-group">
        <label>Pengarang</label>
        <select class="form-control" name="jurusan_id" disabled>
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
        <label>Dosen</label>
        <select class="form-control" name="dosen_id" disabled>
            <option value="">-- Dosen --</option>
            @foreach($rs2 as $pen)
                @php
                    $sel2 = ($pen->id == $b->dosen_id) ? 'selected' : '';
                @endphp
                <option value="{{ $pen->id }}" {{ $sel2 }}>{{ $pen->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Matakuliah</label>
        <select class="form-control" name="matakuliah_id" disabled>
            <option value=""> Matakuliah mengikuti Dosen </option>
            @foreach($rs3 as $pen)
                @php
                    $sel3 = ($pen->id == $b->matkul) ? 'selected' : '';
                @endphp
                <option value="{{ $pen->id }}" {{ $sel3 }}>{{ $pen->nama }}</option>
            @endforeach
        </select>
    </div>
    
    
    <a class="btn btn-primary btn-md"
href="{{ route('mahasantri.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a>
    
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