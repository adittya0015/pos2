@extends('layouts.master')

@section('title')
    <title>Penerimaan Barang| Sinar Mutiara Tasikmalaya</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                            <div class="card-body">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
        
                                <div class="row">
                                    <div class="col-md-6">
                                        <table>
                                            <tr>
                                                <td width="30%">Supplier</td>
                                                <td>:</td>
                                                <td>{{ $invoice->supplier->nama_supplier }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td>{{ $invoice->supplier->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <td>No Telp</td>
                                                <td>:</td>
                                                <td>{{ $invoice->supplier->telp }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td>{{ $invoice->supplier->npwp }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table>
                                            <tr>
                                                <td width="30%">Perusahaan</td>
                                                <td>:</td>
                                                <td>Sinar Mutiara Tasikmalaya</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td>Jl Tasikmalaya</td>
                                            </tr>
                                            <tr>
                                                <td>No Telp</td>
                                                <td>:</td>
                                                <td>085343966997</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td>support@smt.id</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <form action="{{ route('invoice.update', ['id' => $invoice->id]) }}" method="post">
                                        @csrf
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Barang</td>
                                                    <td>Qty</td>
                                                    <td>Harga</td>
                                                    <td>Subtotal</td>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <!-- MENAMPILKAN PRODUK YANG TELAH DITAMBAHKAN -->
                                            <tbody>
                                                
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <form action="#" method="post">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!-- MENAMPILKAN PRODUK YANG TELAH DITAMBAHKAN -->
                                            
                                            <!-- FORM UNTUK MEMILIH PRODUK YANG AKAN DITAMBAHKAN -->
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="hidden" name="_method" value="PUT" class="form-control">
                                                        <select name="product_id" class="form-control">
                                                            <option value="">Pilih Produk</option>
                                                            
                                                            <option value="">test</option>
                                                            
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" min="1" value="1" name="qty" class="form-control" required>
                                                    </td>
                                                    <td colspan="3">
                                                        <button class="btn btn-primary btn-sm">Tambahkan</button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                            <!-- FORM UNTUK MEMILIH PRODUK YANG AKAN DITAMBAHKAN -->
                                        </table>
                                        </form>
                                    </div>
                                    
                                    <!-- MENAMPILKAN TOTAL & TAX -->
                                    <div class="col-md-4 offset-md-8">
                                        <table class="table table-hover table-bordered">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>:</td>
                                                <td>Rp</td>
                                            </tr>
                                            <tr>
                                                <td>Pajak</td>
                                                <td>:</td>
                                                <td>Rp</td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td>:</td>
                                                <td>Rp</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <!-- MENAMPILKAN TOTAL & TAX -->
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
@endsection