@include('dashboard')
@section('konten')
@endsection

{{-- UBAH DATA --}}
<div class="modal fade" id="modal_ubah" role="dialog">
    <div class="modal-wide modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="{{ url('') }}/update" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" id="ubah_id" name="ubah_id">
                    <!--FORM edit anggta-->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" id="ubah_nama" name="ubah_nama">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Inisial</label>
                                <input type="text" class="form-control" minlength="2" maxlength="3" id="ubah_inisial"
                                    name="ubah_inisial">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="">Nomor HP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    {{-- min="11" max="14" --}}
                                    <input type="text" id="ubah_nohp" name="ubah_nohp"
                                        class="form-control phone-number">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="">Hak Akses</label>
                                <select class="form-control" id="ubah_hak_akses" name="ubah_hak_akses" required>
                                    <option value="" selected> Pilih Hak Akses</option>
                                    @foreach ($hakakses as $key => $value)
                                        <option value="{{ $value->id_hakakses }}">
                                            {{ $value->namahakakses }}"</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Status Akun</label>
                                    <select class="form-control" id="ubah_status" name="ubah_status" required>
                                        <option value="" selected disabled>Tetapkan Status</option>
                                        @foreach ($statusakun as $key => $value)
                                            <option value="{{ $value->id_status }}">
                                                {{ $value->statusakun }}"</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" id="ubah_username" name="ubah_username">
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="ubah_password" id="ubah_password">
                                <div style="margin-top: 7px;" id="CheckPasswordMatch">
                                    <p>Harap password harus sama dengan konfirmasi password</p>
                                </div>

                            </div>
                        </div>
                        <span id='message'></span>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="ubah_passwordx" id="ubah_passwordx" ">
                       <div class="   custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                    id="showuwu" onclick="editshwpsz()">
                                <label class="custom-control-label" for="showuwu">Tampilkan Password</label>
                            </div>
                        </div>
                    </div>
            </div>
            <button type="submit" id="editdata" name="editdata" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
</div>
</div>
{{-- tambah anggota --}}
<div class="modal fade" id="tambahanggota" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambahkan Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form autocomplete="off" action="{{ url('') }}/createuser" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <!--FORM TAMBAH anggota-->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" id="input_nama" name="input_nama">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Inisial</label>
                                <input type="text" class="form-control" minlength="2" maxlength="3" id="input_inisial"
                                    name="input_inisial">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nomor HP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control phone-number" id="input_nohp"
                                        name="input_nohp">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Hak Akses</label>
                                <select class="form-control" id="input_idhak" name="input_idhak" required>
                                    <option value="" selected disabled>Tetapkan Hak Akses</option>
                                    @foreach ($hakakses as $key => $value)
                                        <option value="{{ $value->id_hakakses }}">
                                            {{ $value->namahakakses }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Status Akun</label>
                                <select class="form-control" id="input_idstatus" name="input_idstatus" required>
                                    <option value="" selected disabled>Tetapkan Status</option>
                                    @foreach ($statusakun as $key => $value)
                                        <option value="{{ $value->id_status }}">
                                            {{ $value->statusakun }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" id="input_username" name="input_username">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" id="input_pwd" name="input_pwd">
                                <div style="margin-top: 7px;" id="CheckPasswordMatch">
                                    <p>Harap password harus sama dengan konfirmasi password</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="input_pwdx" name="input_pwdx">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                        id="tasmbah" onclick="tmbahshwpsz()">
                                    <label class="custom-control-label" for="tasmbah">Tampilkan Password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="btn_tambahanggota" name="btn_tambahanggota" class="btn btn-primary">Simpan
                        Data</button>
            </form>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="hapuspermanen">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Perubahan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form autocomplete="off" action="{{ url('') }}/reallydelete" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="del_id" name="del_id">
                    <!--FORM TAMBAH BARANG-->
                    <b>Apakah anda ingin menghapus user ini ?</b>
                    <P id="NamaUser"> Null </P>

                    <button type="submit" class="btn btn-primary">Ya</button>
                    <button data-dismiss="modal" class="btn btn-Secondary">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="nonaktifkan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Perubahan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form autocomplete="off" action="{{ url('') }}/reallydeactivated" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="deact_id" name="deact_id">
                    <!--FORM TAMBAH BARANG-->
                    <b>Apakah anda ingin menonaktifkan user ini ?</b>
                    <P id="NamaUserx"> Null </P>
                    <button type="submit" class="btn btn-primary">Ya</button>
                    <button data-dismiss="modal" class="btn btn-Secondary">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="aktifkankembali">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Perubahan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form autocomplete="off" action="{{ url('') }}/activatedtheuser" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="activated_id" name="activated_id">
                    <!--FORM TAMBAH BARANG-->
                    <b>Apakah anda ingin mengaktifkan user ini ?</b>
                    <P id="NamaUserz"> Null </P>
                    <button type="submit" class="btn btn-primary">Ya</button>
                    <button data-dismiss="modal" class="btn btn-Secondary">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Admin</a></div>
                <div class="breadcrumb-item">Daftar Pengguna</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-14 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Manajemen Pengguna</h4>

                        </div>
                        <div class="card-body">
                            <p class="section-lead">Anda dapat mengatur banyaknya pengguna dan mengeditnya.</p>

                            <div class="text-right">
                                <a href="javascript:void(0)" id="modall_user" class="btn btn-success"
                                    data-toggle="modal" data-target="modalUser"><i class="fas fa-plus"></i> Tambahkan Pengguna</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-10">
                    <div class="table-responsive-sm">
                        <table class="table table-sm table-bordered table-hover ">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Inisial</th>
                                <th>Username</th>
                                <th>No HP</th>
                                <th>Hak Akses</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($user as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td>{{ $value->inisial }}</td>
                                    <td>{{ $value->username }}</td>
                                    <td>{{ $value->nohp }}</td>
                                    <td>
                                        @if ($value->namahakakses == 'Admin')
                                            <div class="badge badge-secondary">Admin</div>
                                        @elseif ($value->namahakakses == "User")
                                            <div class="badge badge-dark">User</div>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($value->id_status == '1')
                                            <div
                                                class="badge
                                            badge-success">
                                                Akun Aktif</div>
                                        @else
                                            <div
                                                class="badge
                                            badge-danger">
                                                Akun NonAktif</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)"
                                            onclick="ubah({{ json_encode($value) }}, '{{ decrypt($value->password) }}');"
                                            class="btn-sm btn-info">Edit</a>
                                        @if ($value->id_status == '1')
                                            <a href="javascript:void(0)"
                                                onclick="nonaktifkanx({{ json_encode($value) }});"
                                                class="btn-sm btn-outline-danger">Non-Aktifkan</a>
                                        @else
                                            <a href="javascript:void(0)"
                                                onclick="aktifkanx({{ json_encode($value) }});"
                                                class="btn-sm btn-light">Aktifkan</a>
                                        @endif
                                        <a href="javascript:void(0)" onclick="hapus({{ json_encode($value) }});"
                                            class="btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                    <div class="card-footer text-right">
                        {{-- nopaginationsementara --}}
                    </div>
                </div>
            </div>
        </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        if (count >= 2) {

        }
        alert(count);
    });
    $(function() {
        $("#btn_tambahanggota").click(function() {

            var nama = $("#input_nama").val();
            var inisial = $("#input_inisial").val();
            // var count = $("input_inisial").val().length;
            var nohp = $("#input_nohp").val();
            var username = $("#input_username").val();
            if (nama == '') {
                alert("Ada yang kosong, Coba periksa lagi");
                return false;
            } else if (inisial == '') {
                alert("Ada yang kosong, Coba periksa lagi");
                return false;
            } else if (nohp == '') {
                alert("Ada yang kosong, Coba periksa lagi");
                return false;
            } else if (username == '') {
                alert("Ada yang kosong, Coba periksa lagi");
                return false;
            }
            return true;

        });
    });

    $(function() {
        $("#btn_tambahanggota").click(function() {
            var passwordx = $("#input_pwd").val();
            var konfirmspass = $("#input_pwdx").val();
            if (passwordx != konfirmspass) {
                alert("Password Tidak Cocok");
                return false;
            }
            return true;
        });
    });

    $(function() {
        $("#editdata").click(function() {
            var nama = $("#ubah_nama").val();
            var inisial = $("#ubah_inisial").val();
            var nohp = $("#ubah_nohp").val();
            var username = $("#ubah_username").val();
            if (nama == '') {
                alert("Ada yang kosong, Coba periksa lagi");
                return false;
            } else if (inisial == '') {
                alert("Ada yang kosong, Coba periksa lagi");
                return false;
            } else if (nohp == '') {
                alert("Ada yang kosong, Coba periksa lagi");
                return false;
            } else if (username == '') {
                alert("Ada yang kosong, Coba periksa lagi");
                return false;
            }
            return true;

        });
    });

    $(function() {
        $("#editdata").click(function() {
            var password = $("#ubah_password").val();
            var confirmPassword = $("#ubah_passwordx").val();
            if (password != confirmPassword) {
                alert("Password Tidak Cocok");
                return false;
            }
            return true;
        });
    });

    $('#modall_user').click(function() {
        $('#tambahanggota').modal('show');
    });

    function ubah(data, password) {
        $("#ubah_id").val(data.id);
        $("#ubah_username").val(data.username);
        $("#ubah_password").val(password);
        $("#ubah_nama").val(data.nama);
        $("#ubah_inisial").val(data.inisial);
        $("#ubah_nohp").val(data.nohp);
        $("#ubah_hak_akses").val(data.id_hakakses);
        $("#ubah_status").val(data.id_status);
        $("#modal_ubah").modal('show');
    }

    function hapus(data) {
        document.getElementById('NamaUser').innerText = 'Nama Pengguna : ' + data.nama + '.';
        $("#del_id").val(data.id);
        $("#hapuspermanen").modal('show');
    }

    function nonaktifkanx(data) {
        document.getElementById('NamaUserx').innerText = 'Nama Pengguna : ' + data.nama + '.';
        $("#deact_id").val(data.id);
        $("#nonaktifkan").modal('show');
    }

    function aktifkanx(data) {
        document.getElementById('NamaUserz').innerText = 'Nama Pengguna : ' + data.nama + '.';
        $("#activated_id").val(data.id);
        $("#aktifkankembali").modal('show');
    }

    function editshwpsz() {
        var x = document.getElementById("ubah_password");
        var y = document.getElementById("ubah_passwordx");
        if (x.type === "text" || y.type === "text") {
            x.type = "password";
            y.type = "password";
        } else {
            x.type = "text";
            y.type = "text";
        }
    }

    function tmbahshwpsz() {
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

</footer>
@include('layout.footer')
