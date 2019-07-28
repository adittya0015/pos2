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
                                        <li class="breadcrumb-item active">Barang</li>
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

                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                                        IMPORT EXCEL
                                </button>

                                <a href="/exportbarang" class="btn btn-success btn-sm" target="_blank">EXPORT EXCEL</a>

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
                                                    <th>#</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                 
                                                    <th>Kode Jenis</th>
                                                    <th>Satuan</th>
    
                                                    <th>Jumlah Stok</th>
                                                    <th>Last Update</th>
                                                    <th>Detail</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @forelse ($barang as $barangs)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $barangs->kode_barang }}</td>
                                                    <td>{{ ucfirst($barangs->nama_barang) }}</td>
                                                    <td>{{ $barangs->jenis->kode_jenis }}</td>
                                                    <td>{{ $barangs->uom->kd_uom }}</td>
                                                    <td>{{ $barangs->jumlah_stok }}</td>
                                                    <td>{{ $barangs->updated_at }}</td>
                                                <td> <button class="btn btn-primary btn-sm"
                                                    data-kode_barang="{{$barangs->kode_barang}}"
                                                    data-nama_barang="{{$barangs->nama_barang}}"
                                                    data-pkp="{{$barangs->pkp}}"
                                                    data-id_jenis="{{ $barangs->jenis->kode_jenis }}"
                                                    data-id_uom="{{ $barangs->uom->kd_uom }}"
                                                    data-stok_min="{{$barangs->stok_min}}"
                                                    data-harga_beli="Rp {{ number_format($barangs->harga_beli) }}"
                                                    data-harga_jual="Rp {{ number_format($barangs->harga_jual) }}"
                                                    data-jumlah_stok="{{$barangs->jumlah_stok}}"
                                                    data-keterangan="{{$barangs->keterangan}}"
                                                    data-toggle="modal" data-target="#detailBarang">
                                                        Detail</a>
                                                </button></td>
                                                    <td>
                                                        <form action="{{ route('barang.destroy', $barangs->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <a href="{{ route('barang.edit', $barangs->id) }}"
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
        ​                               <div class="justify-content-center pagination">
                                                {{ $barang->links() }}
                                        </div>
                                    @endslot
                                @endcard
                        </div>
                    </div>
                </div>
            </section>
</div>

                        <!-- Import Excel -->
                                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post" action="/importbarang" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                                </div>
                                            <div class="modal-body">
                             
                                            {{ csrf_field() }}
                             
                                            <label>Pilih file excel</label>
                                                <div class="form-group">
                                                    <input type="file" name="file" required="required">
                                                </div>
                             
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="modal fade" id="detailBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                        <h4 class="modal-title pull-left" id="myModalLabel">Detail Barang</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
                                                        &times;</span></button>
                                                    
                                                </div>
                                            <form action="{{route('barang.update', 'test')}}" method="POST">
                                            <div class="modal-body">
                                                
                                                @include('barang.show')
                             
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                            </form>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            
                           

                            
@endsection