@include('dashboard')
@section('konten')
@endsection
<?php
$username = Session::get('username');
$hakakses = Session::get('hakakses');
$nama = Session::get('nama');
$status = Session::get('status');
?>
{{-- material tambah --}}
<div class="modal fade" id="pelanggan_tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambahkan Database Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('') }}/tambahpelanggan" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <!--FORM TAMBAH BARANG-->
                    <div class="form-group">
                        <label for="">Nama Pelanggan</label>
                        <input required="" type="text" class="form-control" id="namapelanggan" name="namapelanggan"
                            required="">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input required="" type="text" class="form-control" id="alamat" name="alamat" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Telp</label>
                        <input required="" type="text" class="form-control" id="telp" name="telp" required="">
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input required="" type="text" class="form-control" id="emel" name="emel" required="">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
</div>
</div>
{{-- edit pelanggan --}}
<div class="modal fade" id="editpelanggan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Database Nama pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('') }}/ubahpelanggan" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input required="" type="hidden" id="ubah_id" name="ubah_id">
                    <div class="form-group">
                        <label for="">Nama Pelanggan</label>
                        <input required="" type="text" class="form-control" id="e_namapelanggan"
                            name="e_namapelanggan" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input required="" type="text" class="form-control" id="e_alamat" name="e_alamat" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Telp</label>
                        <input required="" type="text" class="form-control" id="e_telp" name="e_telp" required="">
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input required="" type="text" class="form-control" id="e_emel" name="e_emel" required="">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
</div>
</div>
{{-- hapus pelanggan --}}
<div class="modal fade" id="hapuspelanggan" tabindex="-1" aria-labelledby="tambahmhargarefrensi "
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Perubahan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('') }}/hapuspelanggan" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input required="" type="hidden" id="del_id" name="del_id">

                    <!--FORM TAMBAH BARANG-->
                    <b>Apakah anda ingin menghapus Data ini ?</b>
                    <P id="babalor"> Null </P>

                    <button type="submit" class="btn btn-primary">YA</button>
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
                <div class="breadcrumb-item"><a href="#">Master Admin</a></div>
                <div class="breadcrumb-item">Pelanggan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-14 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Manajemen Pelanggan</h4>
                        </div>
                        <div class="card-body">
                            <p class="section-lead">Anda dapat mengubah Manajemen Pelanggan.</p>

                            <div class="text-right">

                                @if ($hakakses == 010)
                                    <a href="#" class="btn btn-secondary"> <i class="fas fa-plus" disabled></i>
                                        Tambahkan</a>
                                @else
                                    <a href="javascript:void(0)" id="tambahpelanggan" class="btn btn-success"
                                        data-toggle="modal"><i class="fas fa-plus"></i>Tambahkan</a>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">

                <div class="card-header">

                    <script type="text/javascript">
                        $('#tambahmaterial').click(function() {
                            $('#tambahanggota').modal('show');
                        });
                    </script>

                </div>
                <div class="card-body p-10">
                    <div class="table-responsive-sm">
                        <table id="nama_pelanggan" class="table table-sm table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($lihatpelangganku as $pelangganku)
                                    <tr>
                                        <td><?= $no ?> </td>
                                        <td>{{ $pelangganku->namapelanggan }}</td>
                                        <td>{{ $pelangganku->Alamat }}</td>
                                        <td>{{ $pelangganku->Telp }}</td>
                                        <td>{{ $pelangganku->email }}</td>
                                        <td>
                                            @if ($hakakses == 010)
                                                <a class="btn btn-icon btn-sm btn-secondary"><i
                                                        class="fas fa-times-circle"></i> Tdk dpt diedit</a>

                                            @else
                                                <a href="javascript:void(0)"
                                                    onclick="ubah({{ json_encode($pelangganku) }});"
                                                    class="btn btn-icon btn-sm btn-primary"><i
                                                        class="fas fa-edit"></i></a>
                                                @if ($hakakses == 4)
                                                    <a href="javascript:void(0)"
                                                        onclick="hapus({{ json_encode($pelangganku) }});"
                                                        class="btn btn-icon btn-sm btn-danger"><i
                                                            class="fas fa-trash"></i></a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
</div>

</div>
</section>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#nama_pelanggan').DataTable({
            "pagingType": "full_numbers"
        });

    });

    $('#tambahpelanggan').click(function() {
        $('#pelanggan_tambah').modal('show');
    });



    $('#modall_user').click(function() {
        $('#tambahanggota').modal('show');
    });

    function ubah(data) {
        $("#ubah_id").val(data.id);
        $("#e_namapelanggan").val(data.namapelanggan);
        $("#e_alamat").val(data.Alamat);
        $("#e_telp").val(data.Telp);
        $("#e_emel").val(data.email);
        $("#editpelanggan").modal('show');
    }


    function hapus(data) {
        document.getElementById('babalor').innerText = 'Nama Pelanggan : ' + data.namapelanggan + '.';
        $("#del_id").val(data.id);
        $("#hapuspelanggan").modal('show');
    }
</script>

@include('layout.footer')
</footer>
