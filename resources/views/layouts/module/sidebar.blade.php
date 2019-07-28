<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="./img/company.jpg" alt="" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Sinar Mutiara Tasikmalaya</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
      <div class="info">
        <a href="#" class="d-block">Sekarang: {{  now()->toDateTimeString('Y-m-d') }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
          </li>
          &nbsp;
          <li class="nav-item text-white">
                <h4>Master</h4>
          </li>
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-boxes"></i>
                <p>
                  Master Barang
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{ route('jenis-barang.index') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Jenis Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('UOM.index') }}" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Satuan Barang</p>
                      </a>
                    </li>
                <li class="nav-item">
                  <a href="{{ route('barang.index') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Barang</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('supplier.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-suitcase"></i>
                  <p>
                    Master Suplier
                  </p>
                </a>
            </li>
            &nbsp;
            <li class="nav-item text-white">
                <h4>Transaksi</h4>
          </li>
          <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Penerimaan Barang
                </p>
              </a>
          </li>
          &nbsp;
          <!--<li class="nav-item text-white">
              <h4>Laporan</h4>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chevron-down"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Jenis Barang</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="#}" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Satuan Barang</p>
                    </a>
                  </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
            </ul>
          </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>