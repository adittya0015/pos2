@extends('layouts.master')

@section('title')
    <title>Manajemen Barang | Sinar Mutiara Tasikmalaya</title>
@endsection

@section('content')
<div class="content-wrapper">
        <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h1 class="m-0 text-dark">Manajemen Satuan Barang</h1>
                        </div>
                        <div class="col-md-6">
                                <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('barang.index')}}">Data Barang</a></li>
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
                                <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                            <label for="">Kode Barang</label>
                                            <input type="text" name="kode_barang" required 
                                                class="form-control {{ $errors->has('kode_barang') ? 'is-invalid':'' }}">
                                            <p class="text-danger">{{ $errors->first('kode_barang') }}</p>
                                        </div>
                                    <div class="form-group">
                                            <label for="">Nama Barang</label>
                                            <input type="text" name="nama_barang" required 
                                                class="form-control {{ $errors->has('nama_barang') ? 'is-invalid':'' }}">
                                            <p class="text-danger">{{ $errors->first('nama_barang') }}</p>
                                        </div>
                                    <div class="form-group">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                        <label for="">PKP/Non-PKP</label>
                                                        <select name="pkp" id="pkp">
                                                          <option value="">Pilih</option>
                                                          <option value="PKP">PKP</option>
                                                          <option value="Non-PKP">Non-PKP</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-4">
                                                        <label for="">Kode Jenis</label>
                                                        <select name="id_jenis" id="id_jenis" 
                                                            required class=" {{ $errors->has('nama_barang') ? 'is-invalid':'' }}">
                                                            <option value="">Pilih</option>
                                                            @foreach ($jenis as $row)
                                                                <option value="{{ $row->id }}">{{ ucfirst($row->kode_jenis) }}</option>
                                                            @endforeach
                                                        </select>
                                                        <p class="text-danger">{{ $errors->first('id_jenis') }}</p>
                                                    </div>

                                                    <div class="col-sm-4">
                                                            <label for="">Satuan</label>
                                                            <select name="id_uom" id="id_uom" 
                                                                required class=" {{ $errors->has('nama_barang') ? 'is-invalid':'' }}">
                                                                <option value="">Pilih</option>
                                                                @foreach ($uom as $uom)
                                                                    <option value="{{ $uom->id }}">{{ ucfirst($uom->kd_uom) }}</option>
                                                                @endforeach
                                                            </select>
                                                            <p class="text-danger">{{ $errors->first('id_uom') }}</p>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                            <label for="">Stok Min</label>
                                            <input type="number" name="stok_min" required 
                                                class="form-control {{ $errors->has('stok_min') ? 'is-invalid':'' }}">
                                            <p class="text-danger">{{ $errors->first('stok_min') }}</p>
                                    </div>

                                    <div class="form-group">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                        <label for="">Harga Beli</label>
                                                        <input type="number" name="harga_beli" required 
                                                            class="form-control {{ $errors->has('harga_beli') ? 'is-invalid':'' }}">
                                                        <p class="text-danger">{{ $errors->first('harga_beli') }}</p>
                                                </div>

                                                <div class="col-sm-6">
                                                        <label for="">Harga Jual</label>
                                                        <input type="number" name="harga_jual" required 
                                                            class="form-control {{ $errors->has('harga_jual') ? 'is-invalid':'' }}">
                                                        <p class="text-danger">{{ $errors->first('harga_jual') }}</p>
                                                    </div>
                                            </div>
                                        </div>
                                            
                                    </div>

                                    <div class="form-group">
                                            <label for="">Jumlah Stok</label>
                                            <input type="number" name="jumlah_stok" required 
                                                class="form-control {{ $errors->has('jumlah_stok') ? 'is-invalid':'' }}">
                                            <p class="text-danger">{{ $errors->first('jumlah_stok') }}</p>
                                    </div>

                                    <div class="form-group">
                                            <label for="">Keterangan</label>
                                            <textarea name="keterangan" id="keterangan" 
                                                cols="5" rows="5" 
                                                class="form-control {{ $errors->has('keterangan') ? 'is-invalid':'' }}"></textarea>
                                            <p class="text-danger">{{ $errors->first('keterangan') }}</p>
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