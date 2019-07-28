@extends('layouts.master')

@section('title')
    <title>Manajemen Supplier | Sinar Mutiara Tasikmalaya</title>
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
                                        <li class="breadcrumb-item active">Supplier</li>
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
                            <a href="{{ route('supplier.create') }}" 
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i> Tambah
                            </a>

                            <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                                    IMPORT EXCEL
                            </button>

                            <a href="/exportbarang" class="btn btn-success btn-sm" target="_blank">EXPORT EXCEL</a> -->

                            @endslot
                            
                            @if (session('success'))
                                @alert(['type' => 'success'])
                                    {!! session('success') !!}
                                @endalert
                            @endif
                            <div class=" table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Supplier</th>
                                            <th>Nama Supplier</th>
                                            <th>Alamat</th>
                                            <th>Kota</th>
                                            <th>Telepon</th>
                                            <th>NPWP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @php $no = 1; @endphp
                                            @forelse ($supplier as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->kode_supplier }}</td>
                                                <td>{{ $row->nama_supplier }}</td>
                                                <td>{{ $row->alamat }}</td>
                                                <td>{{ $row->kota }}</td>
                                                <td>{{ $row->telp }}</td>
                                                <td>{{ $row->npwp }}</td>
                                                <td>
                                                    <form action="{{ route('supplier.destroy', $row->id) }}" method="POST">
                                                        @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                                <a href="{{ route('supplier.edit', $row->id) }}"
                                                                    class="btn btn-warning btn-sm">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">
                                                                    <i class="fa fa-trash"></i>
                                                            </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                                </tr>
                                                @endforelse
                                    </tbody>
                                </table>
                            </div>
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
