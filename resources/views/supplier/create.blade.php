@extends('layouts.master')

@section('title')
    <title>Manajemen Supplier| Sinar Mutiara Tasikmalaya</title>
@endsection

@section('content')
<div class="content-wrapper">
        <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h1 class="m-0 text-dark">Manajemen Supplier</h1>
                        </div>
                        <div class="col-md-6">
                                <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('supplier.index')}}">Data Supplier</a></li>
                                        <li class="breadcrumb-item active">Tambah</li>
                                </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                                @card

                                @slot('title')
                                <a href="{{ route('barang.create') }}" 
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i> Tambah
                                </a>
                                @endslot
                                
                                @if (session('success'))
                                    @alert(['type' => 'success'])
                                        {!! session('success') !!}
                                    @endalert
                                @endif
                                <form action="{{ route('supplier.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                            <label for="">Kode Supplier</label>
                                            <input type="text" name="kode_supplier" required 
                                                class="form-control {{ $errors->has('kode_supplier') ? 'is-invalid':'' }}">
                                            <p class="text-danger">{{ $errors->first('kode_supplier') }}</p>
                                        </div>
                                    <div class="form-group">
                                            <label for="">Nama Supplier</label>
                                            <input type="text" name="nama_supplier" required 
                                                class="form-control {{ $errors->has('nama_supplier') ? 'is-invalid':'' }}">
                                            <p class="text-danger">{{ $errors->first('nama_supplier') }}</p>
                                        </div>
                                    
                                        <div class="form-group">
                                                <label for="">Alamat</label>
                                                <input type="text" name="alamat" required 
                                                    class="form-control {{ $errors->has('alamat') ? 'is-invalid':'' }}">
                                                <p class="text-danger">{{ $errors->first('alamat') }}</p>
                                        </div>

                                        <div class="form-group">
                                                <label for="">Kota</label>
                                                <input type="text" name="kota" required 
                                                    class="form-control {{ $errors->has('kota') ? 'is-invalid':'' }}">
                                                <p class="text-danger">{{ $errors->first('kota') }}</p>
                                            </div>

                                            <div class="form-group">
                                                    <label for="">Telepon</label>
                                                    <input type="number" name="telp" required 
                                                        class="form-control {{ $errors->has('telp') ? 'is-invalid':'' }}">
                                                    <p class="text-danger">{{ $errors->first('telp') }}</p>
                                                </div>
                                    

                                    <div class="form-group">
                                            <label for="">NPWP</label>
                                            <input type="text" name="npwp" required 
                                                class="form-control {{ $errors->has('npwp') ? 'is-invalid':'' }}">
                                            <p class="text-danger">{{ $errors->first('npwp') }}</p>
                                    </div>

                                   

                                        <div class="form-group">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-send"></i> Simpan
                                                </button>
                                            </div>
                                    
                                        
                                
                                </form>
                                @slot('footer')
​
                            @endslot
                                @endcard
                        </div>
                    </div>
                </div>
            </section>
</div>
@endsection