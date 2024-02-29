<?php 
  use App\Models\U_model;
  $model =new U_model;
?>
<?php 
if (session()->get('level')== '1' ) {
?>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="<?= base_url('/Home/mpg')?>" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <!-- <img src="<?= base_url('login/unnamed.png')?>" alt="" style="width: 100px;"> -->
                    </span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="<?= base_url('/Home/mpg')?>" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-detail"></i>
                        <div data-i18n="Layouts">Transaksi</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/ConTrans/transaksi')?>" class="menu-link">
                                <div data-i18n="Without menu">Daftar Transaksi</div>
                            </a>
                        </li>
                    </ul>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/ConTrans/outbound')?>" class="menu-link">
                                <div data-i18n="Without menu">Daftar Pengeluaran</div>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                        <div data-i18n="Layouts">Laporan</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/ConLaporan/diagram')?>" class="menu-link">
                                <div data-i18n="Without menu">Diagram</div>
                            </a>
                        </li>
                    </ul>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/ConLaporan/laporan_pemasukan')?>" class="menu-link">
                                <div data-i18n="Without menu">Laporan Pemasukan</div>
                            </a>
                        </li>
                    </ul>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/ConLaporan/laporan_pengeluaran')?>" class="menu-link">
                                <div data-i18n="Without menu">Laporan Pengeluaran</div>
                            </a>
                        </li>
                    </ul>


                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-folder-open"></i>
                        <div data-i18n="Layouts">Pendataan Barang</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/ConBarang/barang')?>" class="menu-link">
                                <div data-i18n="Without menu">Daftar Barang</div>
                            </a>
                        </li>
                    </ul>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/ConStok/stok')?>" class="menu-link">
                                <div data-i18n="Without menu">Tambah Stok</div>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-folder"></i>
                        <div data-i18n="Layouts">Data Master</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/ConUser/user')?>" class="menu-link">
                                <div data-i18n="Without menu">Data User</div>
                            </a>
                        </li>
                    </ul>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/ConUser/level')?>" class="menu-link">
                                <div data-i18n="Without menu">Data Level</div>
                            </a>
                        </li>
                    </ul>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/ConPelanggan/pelanggan')?>" class="menu-link">
                                <div data-i18n="Without menu">Data Pelanggan</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-trash-alt"></i>
                        <div data-i18n="Layouts">Recycle Bin</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="<?= base_url('/ConUser/bin_user')?>" class="menu-link">
                                <div data-i18n="Without menu">Data User</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= base_url('/ConPelanggan/bin_pelanggan')?>" class="menu-link">
                                <div data-i18n="Without menu">Data Pelanggan</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= base_url('/ConBarang/bin_barang')?>" class="menu-link">
                                <div data-i18n="Without menu">Daftar Barang</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= base_url('/ConStok/bin_stok')?>" class="menu-link">
                                <div data-i18n="Without menu">Stok</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= base_url('/ConTrans/bin_trans')?>" class="menu-link">
                                <div data-i18n="Without menu">Daftar Transaksi</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="<?= base_url('/ConTrans/bin_outbound')?>" class="menu-link">
                                <div data-i18n="Without menu">Daftar Pengeluaran</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">

                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <?php 
                            $nm = $model->getUserSetting();
                          ?>

                        <!-- User -->
                        Welcome Back, <?= $nm->username?>
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="<?= base_url('/templet1/assets/img/avatars/def.png')?>" alt
                                        class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="<?= base_url('/templet1/assets/img/avatars/def.png')?>"
                                                        alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block"><?= $nm->n_lengkap?></span>
                                                <small class="text-muted"><?= $nm->nm_level?></small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('/ConUser/user_s')?>">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('/Home/log_out')?>">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <?php 
}else if (session()->get('level')== '2' ) {
?>
            <!-- Layout wrapper -->
            <div class="layout-wrapper layout-content-navbar">
                <div class="layout-container">
                    <!-- Menu -->

                    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                        <div class="app-brand demo">
                            <a href="<?= base_url('/Home/mpg')?>" class="app-brand-link">
                                <span class="app-brand-logo demo">
                                    <img src="<?= base_url('login/unnamed.png')?>" alt="" style="width: 100px;">
                                </span>
                            </a>

                            <a href="javascript:void(0);"
                                class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                                <i class="bx bx-chevron-left bx-sm align-middle"></i>
                            </a>
                        </div>

                        <div class="menu-inner-shadow"></div>

                        <ul class="menu-inner py-1">
                            <!-- Dashboard -->
                            <li class="menu-item">
                                <a href="<?= base_url('/Home/mpg')?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-home"></i>
                                    <div data-i18n="Analytics">Dashboard</div>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-detail"></i>
                                    <div data-i18n="Layouts">Transaksi</div>
                                </a>

                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="<?= base_url('/ConTrans/transaksi')?>" class="menu-link">
                                            <div data-i18n="Without menu">Daftar Transaksi</div>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="<?= base_url('/ConTrans/outbound')?>" class="menu-link">
                                            <div data-i18n="Without menu">Daftar Pengeluaran</div>
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                                    <div data-i18n="Layouts">Laporan</div>
                                </a>

                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="<?= base_url('/ConLaporan/diagram')?>" class="menu-link">
                                            <div data-i18n="Without menu">Diagram</div>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="<?= base_url('/ConLaporan/laporan_pemasukan')?>" class="menu-link">
                                            <div data-i18n="Without menu">Laporan Pemasukan</div>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="<?= base_url('/ConLaporan/laporan_pengeluaran')?>" class="menu-link">
                                            <div data-i18n="Without menu">Laporan Pengeluaran</div>
                                        </a>
                                    </li>
                                </ul>


                            </li>

                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-folder-open"></i>
                                    <div data-i18n="Layouts">Pendataan Barang</div>
                                </a>

                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="<?= base_url('/ConBarang/barang')?>" class="menu-link">
                                            <div data-i18n="Without menu">Daftar Barang</div>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="<?= base_url('/ConStok/stok')?>" class="menu-link">
                                            <div data-i18n="Without menu">Tambah Stok</div>
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-folder"></i>
                                    <div data-i18n="Layouts">Data Master</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item">
                                        <a href="<?= base_url('/ConPelanggan/pelanggan')?>" class="menu-link">
                                            <div data-i18n="Without menu">Data Pelanggan</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </aside>
                    <!-- / Menu -->

                    <!-- Layout container -->
                    <div class="layout-page">
                        <!-- Navbar -->

                        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                            id="layout-navbar">
                            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                    <i class="bx bx-menu bx-sm"></i>
                                </a>
                            </div>

                            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                                <!-- Search -->
                                <div class="navbar-nav align-items-center">

                                </div>
                                <!-- /Search -->

                                <ul class="navbar-nav flex-row align-items-center ms-auto">
                                    <?php 
                            $nm = $model->getUserSetting();
                          ?>

                                    <!-- User -->
                                    Welcome Back, <?= $nm->username?>
                                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                            data-bs-toggle="dropdown">
                                            <div class="avatar avatar-online">
                                                <img src="<?= base_url('/templet1/assets/img/avatars/def.png')?>" alt
                                                    class="w-px-40 h-auto rounded-circle" />
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar avatar-online">
                                                                <img src="<?= base_url('/templet1/assets/img/avatars/def.png')?>"
                                                                    alt class="w-px-40 h-auto rounded-circle" />
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <span class="fw-semibold d-block"><?= $nm->username?></span>
                                                            <small class="text-muted"><?= $nm->nm_level?></small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="dropdown-divider"></div>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?= base_url('/ConUser/user_s')?>">
                                                    <i class="bx bx-user me-2"></i>
                                                    <span class="align-middle">My Profile</span>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="dropdown-divider"></div>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?= base_url('/Home/log_out')?>">
                                                    <i class="bx bx-power-off me-2"></i>
                                                    <span class="align-middle">Log Out</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--/ User -->
                                </ul>
                            </div>
                        </nav>
                        <?php } ?>