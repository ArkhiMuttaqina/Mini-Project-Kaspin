@include('dashboard')
@section('konten')

@endsection
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-clock"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Rerata waktu HPS yang dibuat</h4>
                        </div>
                        <div class="card-body">
                            3 Jam
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>HPS Yang Telah Selesai</h4>
                        </div>
                        <div class="card-body">
                            42
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>HPS Yang belum Selesai</h4>
                        </div>
                        <div class="card-body">
                            100
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-circle" ></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pengguna yang Online</h4>
                        </div>
                        <div class="card-body">
                            47
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            {{-- <div class="col-lg-9 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab3" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Paket HPS yang dibuat</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Persetujuan HPS</a>
                              </li>
                            </ul>
                            <div class="tab-content tab-bordered" id="myTabContent2">
                              <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                      <table class="table table-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>No / PK atau Memo</th>
                                            <th>No HPS</th>
                                            <th>Perihal</th>
                                            <th>Jenis HPS</th>
                                            <th>Tanggal  </th>
                                            <th>Aksi </th>


                                          </tr>
                                          <tr>
                                            <td>1</td>
                                            <td>XXXX/XX/XXXXX/XXX</td>
                                            <td>XXX</td>
                                            <td> X/XX</td>
                                            <td>Barang</td>
                                            <td>2017-01-09</td>
                                            <td><a href="#" class="btn btn-primary">Kelola</a>
                                            <a href="#" class="btn btn-primary">Teruskan</a>
                                            <a href="#" class="btn btn-primary">Unduh</a></td>

                                          </tr>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="card-footer text-right">
                                    <nav class="d-inline-block">
                                      <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item">
                                          <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                      </ul>
                                    </nav>
                                  </div>
                            </div>
                              <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                <div class="card-body p-10">
                                    <div class="table-responsive">
                                      <table class="table table-bordered">
                                        <tr>
                                          <th>No</th>
                                          <th>No / PK atau Memo</th>
                                          <th>No HPS</th>
                                          <th>Perihal</th>
                                          <th>Jenis HPS</th>
                                          <th>Tanggal  </th>
                                          <th>Aksi </th>


                                        </tr>
                                        <tr>
                                          <td>1</td>
                                          <td>XXXX/XX/XXXXX/XXX</td>
                                          <td>XXX</td>
                                          <td> X/XX</td>
                                          <td>Barang</td>
                                          <td>2017-01-09</td>
                                          <td><a href="#" class="btn btn-secondary">Kelola</a>
                                          <a href="#" class="btn btn-secondary">Teruskan</a>
                                          <a href="#" class="btn btn-secondary">Unduh</a></td>

                                        </tr>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="card-footer text-right">
                                    <nav class="d-inline-block">
                                      <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item">
                                          <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                      </ul>
                                    </nav>
                                  </div>                          </div>
                            </div>
                          </div>
                      </div>
                    <div class="card-footer bg-whitesmoke">
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card">
                    <div class="card-header">
                        <h4>Pengguna yang Online</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-1.png"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">Now</div>
                                    <div class="media-title">Arkhi Muttaqina</div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center pt-1 pb-1">
                            <a href="#" class="btn btn-primary btn-lg btn-round">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
</div>
@include('layout.footer')
</footer>
