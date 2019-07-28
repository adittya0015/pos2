@extends('layouts.master')

@section('title')
    <title>Manajemen Jenis Barang | Sinar Mutiara Tasikmalaya</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Manajemen Jenis Barang</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcumb-item"><a href="{{ route('jenis-barang.index') }}">Jenis-Barang</a></li>
                        <li class="breadcumb-item active">Edit Jenis Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                        @card
                        @slot('title')
                        Edit
                        @endslot

                        @if (session('error'))
                            @alert(['type' => 'danger'])
                                {!! session('error') !!}
                            @endalert
                        @endif

                        <form role="form" action="{{ route('jenis-barang.update', $jenis->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                    <label for="kode_jenis">Kode Jenis</label>
                                    <input type="text" 
                                    name="kode_jenis"
                                    value="{{ $jenis->kode_jenis }}"
                                    class="form-control {{ $errors->has('kode_jenis') ? 'is-invalid':'' }}" id="kode_jenis" required>
                                </div>
                            <div class="form-group">
                                <label for="nama_jenis">Nama Jenis</label>
                                <input type="text" 
                                name="nama_jenis"
                                value="{{ $jenis->nama_jenis }}"
                                class="form-control {{ $errors->has('nama_jenis') ? 'is-invalid':'' }}" id="nama_jenis" required>
                            </div>
                            <div class="form-group">
                                <label for="merk">Merek</label>
                                <input type="text" 
                                name="merk"
                                value="{{ $jenis->merk }}"
                                class="form-control {{ $errors->has('merk') ? 'is-invalid':'' }}" id="merk">
                            </div>
                                @slot('footer')
                                    <div class="card-footer">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            @endslot
                        @endcard
                </div>
            </div>
        </div>
    </section>
</div>
@endsection