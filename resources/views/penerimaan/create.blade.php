@extends('layouts.master')

@section('title')
    <title>Penerimaan Barang| Sinar Mutiara Tasikmalaya</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                    <div class="row mb-2">
                            <div class="col-md-6">
                                <h1 class="m-0 text-dark">Penerimaan Barang</h1>
                            </div>
                            <div class="col-md-6">
                                    <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('supplier.index')}}">Penerimaan</a></li>
                                            <li class="breadcrumb-item active">Tambah</li>
                                    </ol>
                            </div>
                    </div>
            </div>
        </div>

        <section class="content">
            <div class=" container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @card

                        @slot('title')
                            <a href="{{ route('invoice.create') }}" 
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i> Buat Faktur
                            </a>
                        @endslot

                        @if (session('success'))
                                @alert(['type' => 'success'])
                                    {!! session('success') !!}
                            @endalert
                        @endif
                        <form action="{{ route('invoice.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                    <strong>Masukan Tgl:</strong> 
                                    <input type="date" name="tgl_penerimaan" class="from-control">
                            </div>
                            <div class="form-group">
                                    <label for="">Supplier</label>
                                    <select name="id_supplier" class="form-control" required>
                                        <option value="">Pilih</option>
                                        @foreach ($supplier as $supplier) 
                                        <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label for="">Dibuat Oleh</label>
                                    <select name="id_user" class="form-control" required>
                                        <option value="">Pilih</option>
                                        @foreach ($user as $user) 
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Buat</button>
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