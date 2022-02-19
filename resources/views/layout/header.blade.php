<div class="navbar-bg">

<?php
    $username=Session::get('username');
	$hakakses=Session::get('hakakses');
	$nama = Session::get('nama');
    $status = Session::get('status');
?>
</div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            @if ($hakakses == 010)
              <a href="{{route('logout')}}"
                class="btn-sm btn-primary"><i class="fas fa-sign-out-alt"></i></i> Masuk </a>
            @else
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Halo, {{$nama}}</div>
        </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">{{$hakakses}} - {{$status}}</div>
              <a href="{{route('profil')}}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil Saya
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>
            </div>
          </li>
          @endif
        </ul>
      </nav>
