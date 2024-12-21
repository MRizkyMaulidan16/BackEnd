<!-- Pertemuan 9 -->
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1><i class="fa fa-graduation-cap" > Data Mahasantri</i></h1>
@stop
@section('content') {{-- Isi konten Data Pegawai --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@php
$ar_judul = ['No','Nama','NIM','Jurusan','Mata Kuliah','Dosen Pengajar','Action'];
$no = 1;
@endphp
<a class="btn btn-primary btn-md"
href="{{ route('mahasantri.create') }}" role="button"><i class="fa fa-plus" > Tambah Mahasantri</i></a><br><br>
<table class="table table-striped">
    <thead>
        <tr>
            @foreach ($ar_judul as $jdl)
            <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($ar_mahasantri as $ms )        
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $ms->nama }}</td>
            <td>{{ $ms->nim }}</td>
            <td>{{ $ms->jurusan }}</td>                                
            <td>{{ $ms->matkul }}</td>            
            <td>{{ $ms->dosen }}</td>
            <td>
                <form action="{{ route('mahasantri.destroy',$ms->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a class="btn btn-info" href="{{ route('mahasantri.show',$ms->id) }}"><i class='fa fa-eye'></i></a>
                    <a class="btn btn-warning" href="{{ route('mahasantri.edit',$ms->id) }}"><i class='fa fa-edit'></i></a>
                    <button class="btn btn-danger" oneclick="return confirm('Anda Yakin Data di Hapus')"><i class='fa fa-trash'></i></button>
                </form>
            </td>
            @endforeach           
        </tr>
        
    </tbody>
</table>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi'); </script>
@stop
<!-- Akhir Pertemuan 9 -->