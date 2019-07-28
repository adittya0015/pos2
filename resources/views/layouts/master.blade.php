
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @yield('title')

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <button class="nav-link btn btn-default" data-toggle="dropdown" href="#">
              <i class="fas fa-power-off"></i>
          Pilihan
          </button>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                  <div class="media">
                      <div class="media-body">
                          <h3 class="dropdown-item-title">
                            {{ Auth::user()->name }}
                              <span class="float-right text-sm text-danger"></span>
                          </h3>
                      </div>
                  </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">Pengaturan</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer"><p>{{ __('Logout') }}</p></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
      </li>
  </ul>
  </nav>
  <!-- /.navbar -->

  @include('layouts.module.sidebar')

  @yield('content')

  @include('layouts.module.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="<?=url('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js');?>"></script>

<script>
  $('#detailBarang').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var kode_barang = button.data('kode_barang')
    var nama_barang = button.data('nama_barang')
    var pkp = button.data('pkp')
    var id_jenis = button.data('id_jenis')
    var id_uom = button.data('id_uom')
    var stok_min = button.data('stok_min')
    var harga_beli = button.data('harga_beli')
    var harga_jual = button.data('harga_jual')
    var jumlah_stok = button.data('jumlah_stok')
    var keterangan = button.data('keterangan')

    var modal = $(this)
    modal.find('.modal-body #kode_barang').val(kode_barang)
    modal.find('.modal-body #nama_barang').val(nama_barang)
    modal.find('.modal-body #pkp').val(pkp)
    modal.find('.modal-body #id_jenis').val(id_jenis)
    modal.find('.modal-body #id_uom').val(id_uom)
    modal.find('.modal-body #stok_min').val(stok_min)
    modal.find('.modal-body #harga_beli').val(harga_beli)
    modal.find('.modal-body #harga_jual').val(harga_jual)
    modal.find('.modal-body #jumlah_stok').val(jumlah_stok)
    modal.find('.modal-body #keterangan').val(keterangan)
  });
</script>


</body>
</html>
