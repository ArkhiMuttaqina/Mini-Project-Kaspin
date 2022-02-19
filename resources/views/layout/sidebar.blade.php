<?php
    $username=Session::get('username');
	$hakakses=Session::get('hakakses');
	$nama = Session::get('nama');
    $status = Session::get('status');
?>

<div class="main-sidebar sm">
    <aside id="sidebar-wrapper">
         <div class="sidebar-brand">

            <img src="{{ asset('bisa/') }}/img/a.png" height="120px" width="156px" />

        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ asset('bisa/') }}/img/a.png" height="40px"
                width="58px" />
        </div>
        <ul class="sidebar-menu" style="margin-top:60px">
            <li><a class="nav-link" href="#"><i
                        class="fas fa-home"></i><span>Beranda</span></a></li>

            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users-cog"></i>
                    <span>Master</span></a>
                <ul class="dropdown-menu">
                    @if( $hakakses == "Admin")
                    <li style="margin-bottom:8px;" ><a class="nav-link" href="{{ route('manajerpengguna') }}"><i style="margin-right: 2px;" class="fas fa-user-cog"></i><span>Pengguna</span></a></li>
                    @endif
                    <li style="margin-bottom:8px;" ><a class="nav-link" href="{{ route('m_material') }}"><i style="margin-right: 2px" class="fa-solid fa-boxes-stacked"></i><span>Stok Brg</span></a></li>

                        <li style="margin-bottom:8px;" ><a class="nav-link" href="{{ route('mastrpelanggan') }}"><i
                                    style="margin-right: 2px" class="fas fa-user"></i><span>Pelanggan</span></a></li>
                    <li style="margin-bottom:8px;" ><a class="nav-link" href="{{ route('mastersupplier') }}"><i

                                    style="margin-right: 2px" class="fas fa-user-md"></i><span>Supplier</span></a></li>

                </ul>
            </li>

             <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users-cog"></i>
                    <span>Lainnya</span></a>
                <ul class="dropdown-menu">
                    <li style="margin-bottom:8px;" ><a class="nav-link" href="{{ route('logactivity') }}"><i style="margin-right: 2px"  class="fa-solid fa-timeline"></i></i><span>Log Aktifitas</span></a></li>

                </ul>
            </li>

</div>
</aside>
</div>
