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
    <div class="modal fade" id="material_tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambahkan Database Nama Barang </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('') }}/chg/tmbhmaterial" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <!--FORM TAMBAH BARANG-->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nama Barang </label>
                                    <input required="" type="text" class="form-control" id="inp_namamater"
                                        name="inp_namamater">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nama Supplier </label>
                                    <select class="custom-select" id="nama_sup" name="nama_sup">
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Harga Beli</label>
                                    <input required="" type="number" class="form-control" id="inp_hargabelimater"
                                        name="inp_hargabelimater">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Harga Jual</label>
                                    <input required="" type="number" class="form-control" id="inp_hargamater"
                                        name="inp_hargamater">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input required="" type="number" class="form-control" id="inp_stok" name="inp_stok">
                        </div>
                        <div class="form-group">
                            <label for=""> EXP DATE </label>
                            <input required="" type="date" class="form-control" id="date_mater" name="date_mater">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    {{-- edit material --}}
    <div class="modal fade" id="editmaterial">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Database Nama Barang </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('') }}/chg/ubahmaterial" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input required="" type="hidden" id="ubah_id" name="ubah_id">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Ubah Nama Barang </label>
                                    <input required="" type="text" class="form-control" id="editnamamaterial"
                                        name="editnamamaterial">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">Ubah Supplier (Abaikan Jika tidak ada perubahan) </label>
                                        <input required="" type="text" hidden class="form-control" id="enama_sup2"
                                            name="enama_sup2">
                                        <input required="" type="text" readonly class="form-control" id="enama_sup3"
                                            name="enama_sup3" style="margin-bottom: 10px;">
                                        <select class="custom-select" id="enama_sup" name="enama_sup">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="form-group">
                                    <label for="">Ubah Harga Beli </label>
                                    <input required="" type="number" class="form-control" id="hargabeli_brg"
                                        name="hargabeli_brg">
                                </div>
                            </div>
                            <div class="col">

                                <div class="form-group">
                                    <label for="">Ubah Harga Jual</label>
                                    <input required="" type="number" class="form-control" id="hargajual_brg"
                                        name="hargajual_brg">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Ubah Stok</label>
                            <input required="" type="number" class="form-control" id="stokedit" name="stokedit">
                        </div>
                        <div class="form-group">
                            <label for=""> Ubah EXP DATE (Abaikan Jika tidak ada perubahan) </label>
                            <input required="" type="input" readonly class="form-control" id="date_lama"
                                name="date_lama" style="margin-bottom: 10px;">
                            <input type="date" class="form-control" id="ubh_date" name="ubh_date">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    {{-- hapus material --}}
    <div class="modal fade" id="hapusmaterial" tabindex="-1" aria-labelledby="tambahmhargarefrensi "
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Perubahan!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ url('') }}/chg/hapusmaterial" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input required="" type="hidden" id="del_id" name="del_id">

                        <!--FORM TAMBAH BARANG-->
                        <b>Apakah anda ingin menghapus Barang ini ?</b>
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
                    <div class="breadcrumb-item">Barang </div>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Total Jumlah Aset</h4>
                            </div>
                            <div class="card-body">
                                <h5>Rp. {{ number_format($totalaset, 2, `,`, `.`) }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Total Stok</h4>
                            </div>
                            <div class="card-body">
                                <h5>{{ $totalmaterial }}</h5>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">
                                <h4>Daftar Barang </h4>
                            </div>
                            <div class="card-body p-10">
                                <div style="margin: 10px;">
                                    <div class="text-right">
                                        @if ($hakakses == 010)
                                            <a href="#" class="btn btn-secondary"> <i class="fas fa-plus"
                                                    disabled></i> Tambahkan</a>
                                        @else
                                            <a href="javascript:void(0)" id="tambahmaterialc" class="btn btn-success"
                                                data-toggle="modal"> <i class="fas fa-plus"></i> Tambahkan</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="table-responsive-sm">
                                    <table id="material" class="table table-sm table-bordered table-hover ">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang </th>
                                                <th>Nama Barang</th>
                                                <th>Batch Date</th>
                                                <th>Stok</th>
                                                <th>Nama Supplier</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Selisih</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($get_materialmaster as $key => $material)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $material->kodematerial }}</td>
                                                    <td>{{ $material->namamaterial }}</td>
                                                    <td>{{ $material->batch_date }}</td>
                                                    <td>{{ $material->stok }}</td>
                                                    <td>{{ $material->nama_supplier }} </td>
                                                    <td>Rp.
                                                        {{ number_format($material->hargabeli_material, 2, `,`, `.`) }}
                                                    </td>
                                                    <td>Rp.
                                                        {{ number_format($material->hargamaterial, 2, `,`, `.`) }}
                                                    </td>
                                                    <td>Rp. {{ number_format($material->selisih, 2, `,`, `.`) }}</td>
                                                    @if ($hakakses == 010)
                                                        <td> <a class="btn btn-icon btn-sm btn-secondary"><i
                                                                    class="fas fa-times-circle"></i> Tdk dpt diedit</a>
                                                        </td>
                                                    @else
                                                        <td><a href="javascript:void(0)"
                                                                onclick="ubah({{ json_encode($material) }});"
                                                                class="btn btn-icon btn-sm btn-primary"><i
                                                                    class="fas fa-edit"></i></a>

                                                    @if ($hakakses == "Admin")
                                                      <a href="javascript:void(0)"
                                                                onclick="hapus({{ json_encode($material) }});"
                                                                class="btn btn-icon btn-sm btn-danger"><i
                                                                    class="fas fa-trash"></i></a>
                                                    @endif

                                                        </td>
                                                    @endif

                                                </tr>
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


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#material').DataTable({
                "pagingType": "full_numbers"
            });

            $('#enama_sup').select2({
                tags: false,
                closeOnSelect: true,
                allowClear: true,
                placeholder: 'Inputkan Supplier',
                dropdownParent: $("#editmaterial"),
                ajax: {
                    url: '/awtokomplet2',
                    dataType: 'json',
                    createSearchChoice: function(params) {
                        return false;
                    },
                    data: function(params) {
                        return {
                            q: $.trim(params.term)
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama_supplier,
                                    id: item.ids
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

            $('#nama_sup').select2({
                tags: false,
                closeOnSelect: true,
                allowClear: true,
                placeholder: 'Inputkan Supplier',
                dropdownParent: $("#material_tambah"),
                ajax: {
                    url: '/awtokomplet2',
                    dataType: 'json',
                    createSearchChoice: function(params) {
                        return false;
                    },
                    data: function(params) {
                        return {
                            q: $.trim(params.term)
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama_supplier,
                                    id: item.ids
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });

        $('#tambahmaterial').click(function() {
            $('#tambahanggota').modal('show');
        });
    </script>
    <script type="text/javascript">
        $('#tambahmaterialc').click(function() {
            $('#material_tambah').modal('show');
        });


        function ubah(data) {
            $("#ubah_id").val(data.id);
            $("#editnamamaterial").val(data.namamaterial);
            $("#enama_sup2").val(data.supllier);
            $("#enama_sup3").val(data.nama_supplier);
            $("#hargabeli_brg").val(data.hargabeli_material);
            $("#hargajual_brg").val(data.hargamaterial);
            $("#stokedit").val(data.stok);
            $("#date_lama").val(data.batch_date);
            $("#editmaterial").modal('show');
        }

        function hapus(data) {
            document.getElementById('babalor').innerText =
                'Nama Material  : ' + data.namamaterial + '.';
            $("#del_id").val(data.id);
            $("#hapusmaterial").modal('show');
        }
        $('#sandbox-container .input-group.date').datepicker({
            maxViewMode: 3,
            todayBtn: "linked",
            clearBtn: true,
            language: "id"
        });
    </script>

    @include('layout.footer')
    </footer>
