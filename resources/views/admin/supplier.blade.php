@include('dashboard')
@section('konten')
@endsection
<?php
$username = Session::get('username');
$hakakses = Session::get('hakakses');
$nama = Session::get('nama');
$status = Session::get('status');
?>
{{-- material supplier --}}
<div class="modal fade" id="kangsupply_tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambahkan Database Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('') }}/tambahsupplier" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <!--FORM TAMBAH BARANG-->
                    <div class="form-group">
                        <label for="">Nama Supplier</label>
                        <input required="" type="text" class="form-control" id="xnamasupplierx" name="xnamasupplierx">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input required="" type="text" class="form-control" id="alamatnya" name="alamatnya">
                    </div>
                    <div class="form-group">
                        <label for="">Telp</label>
                        <input required="" type="text" class="form-control" id="xtelp" name="xtelp">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input required="" type="text" class="form-control" id="xemel" name="xemel">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
</div>
</div>
{{-- edit supplier --}}
<div class="modal fade" id="editsuuply">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Database Nama pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('') }}/ubahsupplier" method="post">
                {{ csrf_field() }}

                <div class="modal-body">
                    <input required="" type="hidden" id="ubah_id" name="ubah_id">
                    <div class="form-group">
                        <label for="">Nama Supplier</label>
                        <input required="" type="text" class="form-control" id="namasupplier" name="namasupplier">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input required="" type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="">Telp</label>
                        <input required="" type="text" class="form-control" id="telp" name="telp">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input required="" type="text" class="form-control" id="emel" name="emel">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
</div>
</div>

{{-- hapus supplier --}}
<div class="modal fade" id="hapussupplier" tabindex="-1" aria-labelledby="tambahmhargarefrensi " aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Perubahan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('') }}/hapussupplier" method="post">
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
                <div class="breadcrumb-item">Supplier</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-14 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Manajemen Supplier</h4>
                        </div>
                        <div class="card-body">
                            <p class="section-lead">Anda dapat mengubah Manajemen Supplier.</p>

                            <div class="text-right">

                                @if ($hakakses == 010)
                                    <a href="#" class="btn btn-secondary"> <i class="fas fa-plus" disabled></i>
                                        Tambahkan</a>
                                @else
                                    <a href="javascript:void(0)" id="tambahsuplier" class="btn btn-success"
                                        data-toggle="modal"><i class="fas fa-plus"></i>Tambahkan</a>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-10">
                    <div class="table-responsive-sm">
                        <table id="theadnama_supplier" class="table table-sm table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Supplier</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($lihatsupplierku as $supplierku)
                                    <tr>
                                        <td><?= $no ?> </td>
                                        <td>{{ $supplierku->nama_supplier }}</td>
                                        <td>{{ $supplierku->alamat_supplier }}</td>
                                        <td>{{ $supplierku->no_supplier }}</td>
                                        <td>{{ $supplierku->email_supplier }}</td>
                                        <td>
                                            @if ($hakakses == 010)
                                                <a class="btn btn-icon btn-sm btn-secondary"><i
                                                        class="fas fa-times-circle"></i> Tdk dpt diedit</a>

                                            @else
                                                <a href="javascript:void(0)"
                                                    onclick="ubah({{ json_encode($supplierku) }});"
                                                    class="btn btn-icon btn-sm btn-primary"><i
                                                        class="fas fa-edit"></i></a>
                                                @if ($hakakses == 4)
                                                    <a href="javascript:void(0)"
                                                        onclick="hapus({{ json_encode($supplierku) }});"
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
        $('#theadnama_supplier').DataTable({
            "pagingType": "full_numbers"
        });
    });

    $('#tambahsuplier').click(function() {
        $('#kangsupply_tambah').modal('show');
    });

    function ubah(data) {
        $("#ubah_id").val(data.ids);
        $("#namasupplier").val(data.nama_supplier);
        $("#alamat").val(data.alamat_supplier);
        $("#telp").val(data.no_supplier);
        $("#emel").val(data.email_supplier);
        $("#editsuuply").modal('show');
    }


    function hapus(data) {
        document.getElementById('babalor').innerText = 'Nama Supplier : ' + data.nama_supplier + '.';
        $("#del_id").val(data.ids);
        $("#hapussupplier").modal('show');
    }
</script>

@include('layout.footer')
</footer>
