   @include('dashboard')
   @section('konten')
   @endsection
   <?php
   $username = Session::get('username');
   $hakakses = Session::get('hakakses');
   $nama = Session::get('nama');
   $status = Session::get('status');
   $id = Session::get('id');
   ?>
   <!-- Main Content -->
   <div class="main-content">
       <section class="section">
           <div class="section-header">
               <h1>Akun</h1>
               <div class="section-header-breadcrumb">
                   <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                   <div class="breadcrumb-item active">Akun</div>
               </div>
           </div>
           <div class="section-body">
               <h2 class="section-title">Halo, {{ $nama }} !</h2>
               <p class="section-lead">
                   Ubah Informasi terkait akun anda disini.
               </p>

               <div class="row">
                   <div class="col-12 col-md-12 col-lg-12">
                       <div class="card profile-widget">
                           <div class="profile-widget-header">
                               <img alt="image" src="../assets/img/avatar/avatar-1.png"
                                   class="rounded-circle profile-widget-picture">
                           </div>
                           <div class="profile-widget-description">
                               <div class="profile-widget-name">{{ $hakakses }}<div
                                       class="text-muted d-inline font-weight-normal">
                                       <div class="slash"></div>Status Akun {{ $status }}
                                   </div>
                               </div>
                           </div>


                       </div>
                   </div>
               </div>
               <div class="col-12 col-md-12 col-lg-14">
                   <div class="card">
                       <form autocomplete="off" action="{{ url('') }}/postupdateprofile" method="post" class="needs-validation"
                         enctype="multipart/form-data">
                           {{ csrf_field() }}
                           <div class="card-header">
                               <h4>Edit Profile</h4>
                           </div>
                           <div class="card-body">
                               <div class="row">
                                   <div class="form-group col-md-7 col-12">
                                       <label>Nama</label>
                                       <input required=""type="text" id="ubah_profil_nama" name="ubah_profil_nama" class="form-control" value="{{ $user->nama }}">
                                       <div class="invalid-feedback">

                                       </div>
                                   </div>
                                   <div class="form-group col-md-5 col-12">
                                       <label>Inisial</label>
                                       <input required=""type="text" id="ubah_profil_inisial" name="ubah_profil_inisial" class="form-control" minlength="2" maxlength="3"
                                           value="{{ $user->inisial }}">
                                       <div style="margin-top: 7px;" id="CheckPasswordMatch">
                                           <p>anda hanya bisa memasukan 3 Karakter.</p>
                                       </div>

                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-7 col-12">
                                       <label>Username</label>
                                       <input required=""type="text" id="ubah_profil_username" name="ubah_profil_username" class="form-control" value=" {{ $user->username }}"
                                           required="">
                                       <div class="invalid-feedback">

                                       </div>
                                   </div>
                                   <div class="form-group col-md-5 col-12">
                                       <label>Nomor Telepon</label>
                                       <input required=""type="tel" id="ubah_profil_hp" name="ubah_profil_hp" class="form-control" value="{{ $user->nohp }}">
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-7 col-12">
                                       <label>Password</label>
                                       <input required=""type="password" id="input_pwd" name="input_pwd" class="form-control"
                                           value="{{ decrypt($user->password) }}">
                                       <div class="invalid-feedback">
                                           Isi Password anda
                                       </div>
                                       <div style="margin-top: 7px;" id="CheckPasswordMatch">
                                           <p>Harap password harus sama dengan konfirmasi password</p>
                                       </div>
                                   </div>
                                   <div class="form-group col-md-5 col-12">
                                       <label>Ulangi Password anda</label>
                                       <input required=""type="password" id="input_pwdx" name="input_pwdx" class="form-control" value="">
                                       <div class=" custom-control custom-checkbox">
                                           <input required=""type="checkbox" name="remember" class="custom-control-input"
                                               tabindex="3" id="showuwu" onclick="editpassprofil()">
                                           <label class="custom-control-label" for="showuwu">Tampilkan Password</label>
                                       </div>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-7 col-12">
                                       <label>Foto Profil: </label>
                                       <input required=""name="gambarprofil" type="file" accept="image/png, image/gif, image/jpeg"
                                           class="form-control">
                                       <label>Format PNG/JPEG/JPG </label>
                                   </div>
                                   <div class="form-group col-md-5 col-12">
                                       <label>Masukan file paraf / Tanda Tangan : </label>
                                       <input required=""name="ttd" type="file" accept="image/png" class="form-control">
                                       <label>Format PNG/JPEG/JPG </label>

                                       <label>Tanda Tangan : </label>
                                       <div class="gallery gallery-fw" data-item-height="180">
                                           <div class="gallery-item" data-image="../assets/img/news/img09.jpg"
                                               data-title="Image 1"></div>
                                       </div>
                                   </div>

                               </div>
                           </div>
                           <div class="card-footer text-right">
                               <button id="simpanbosku" name="simpanbosku" class="btn btn-primary">Simpan</button>
                           </div>
                       </form>
                   </div>

               </div>
           </div>

       </section>
   </div>
   <script type="text/javascript">

       $(function() {
           $("#simpanbosku").click(function() {
               var passwordx = $("#input_pwd").val();
               var konfirmspass = $("#input_pwdx").val();
               if (passwordx != konfirmspass) {
                   alert("Password Tidak Cocok");
                   return false;
               }
               return true;
           });
       });

       function editpassprofil() {
           var z = document.getElementById("input_pwd");
           var a = document.getElementById("input_pwdx");
           if (z.type === "text" || a.type === "text") {
               z.type = "password";
               a.type = "password";
           } else {
               z.type = "text";
               a.type = "text";
           }
       }
   </script>
   @include('layout.footer')
   </footer>
