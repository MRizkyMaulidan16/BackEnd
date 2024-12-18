<!-- Pertemuan 9 -->
@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1><i class="fa fa-user" > Data Pengarang</i></h1>
@stop
@section('content') 
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@php
$ar_judul = ['No','Nama','Email','Hp','Action'];
$no = 1;
@endphp
<a class="btn btn-primary btn-md"
href="{{ route('pengarang.create') }}" role="button"><i class="fa fa-plus" > Tambah Pengarang</i></a><br><br>
<h3>Daftar Pengarang</h3>

<table class="table table-striped">
    <thead>
        <tr>
            @foreach ($ar_judul as $jdl)
            <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($ar_pengarang as $p)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->hp }}</td>          
            <td>
                <form action="{{ route('pengarang.destroy',$p->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a class="btn btn-info" href="{{ route('pengarang.show',$p->id) }}"><i class='fa fa-eye'></i></a>
                    <a class="btn btn-warning" href="{{ route('pengarang.edit',$p->id) }}"><i class='fa fa-edit'></i></a>
                    <button class="btn btn-danger" oneclick="return confirm('Anda Yakin Data di Hapus')"><i class='fa fa-trash'></i></button>
                </form>
            </td>
                
        </tr>
        @endforeach
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