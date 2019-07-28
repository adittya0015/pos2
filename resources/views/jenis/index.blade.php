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
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Jenis Barang</li>
                        </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                        @card
                        @slot('title')
                        <h4>Tambah</h4>
                        @endslot

                        @if (session('error'))
                            @alert(['type' => 'danger'])
                                {!! session('error') !!}
                            @endalert
                        @endif

                        <form role="form" action="{{ route('jenis-barang.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="kode_jenis">Kode Jenis</label>
                                <input type="text" 
                                name="kode_jenis"
                                class="form-control {{ $errors->has('kode_jenis') ? 'is-invalid':'' }}" id="kode_jenis" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_jenis">Jenis</label>
                                <input type="text" 
                                name="nama_jenis"
                                class="form-control {{ $errors->has('nama_jenis') ? 'is-invalid':'' }}" id="nama_jenis" required>
                            </div>
                            <div class="form-group">
                                <label for="merk">Merek</label>
                                <input type="text" 
                                name="merk"
                                class="form-control {{ $errors->has('merk') ? 'is-invalid':'' }}" id="merk">
                            </div>
                                @slot('footer')
                                    <div class="card-footer">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            @endslot
                        @endcard
                        <div class="row">
                            <div class="col-sm-12">
                                    @card
                                    @slot('title')
                                    Import Data Dari Excel
                                    @endslot

                                    <form action="{{ url('/importjenisbarang') }}" method="post" enctype="multipart/form-data">
                                        @csrf
            
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif
            
                                        @if (session('error'))
                                            <div class="alert alert-success">
                                                {{ session('error') }}
                                            </div>
                                        @endif
            
                                        <div class="form-group">
                                            <label for="">File (.xls, .xlsx)</label>
                                            <input type="file" class="form-control" name="file">
                                            <p class="text-danger">{{ $errors->first('file') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary">Upload</button>
                                        </div>
                                    </form>
                                    @slot('footer')
                                        
                                    @endslot
                                    @endcard
                            </div>
                    </div>
                </div>

                <div class="col-md-8">
                        @card
                            @slot('title')
                            Daftar Jenis Barang
                            @endslot
                            
                            @if (session('success'))
                                @alert(['type' => 'success'])
                                    {!! session('success') !!}
                                @endalert
                            @endif
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Kode Jenis</td>
                                            <td>Nama Jenis</td>
                                            <td>Merk</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($jenis as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->kode_jenis }}</td>
                                            <td>{{ $row->nama_jenis }}</td>
                                            <td>{{ $row->merk }}</td>
                                            <td>
                                                <form action="{{ route('jenis-barang.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('jenis-barang.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @slot('footer')
                            <div class="justify-content-center pagination">
                                {{ $jenis->links() }}
                            </div>
                            @endslot
                        @endcard        
                    </div>
            </div>
        </div>
    </section>

</div>
@endsection