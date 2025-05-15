<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Kegiatan Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('template/css/styles.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Dosen Kegiatan</a>
        <!-- Sidebar Toggle-->
        <div class="">

        </div>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Master Data</div>
                         <a class="nav-link" href={{route('dashboard')}}>
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href={{route('prodi.index')}}>
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Prodi
                        </a>
                        <a class="nav-link" href={{route('bidang_ilmu.index')}}>
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Bidang Ilmu
                        </a>
                        <a class="nav-link" href={{route('dosen.index')}}>
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dosen
                        </a>
                        <a class="nav-link" href={{route('dosen_kegiatan.index')}}>
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dosen Kegiatan
                        </a>
                        <a class="nav-link" href={{route('kegiatan.index')}}>
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Kegiatan
                        </a>
                        <a class="nav-link" href={{route('jenis_kegiatan.index')}}>
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Jenis Kegiatan
                        </a>
                        <a class="nav-link" href={{route('penelitian.index')}}>
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Penelitian
                        </a>
                        <a class="nav-link" href={{route('tim_penelitian.index')}}>
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Tim Penelitian
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card shadow-lg">
                                    <div
                                        class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                        <h4 class="mb-0">
                                            <i class="fas fa-info-circle mr-2"></i> Detail Jenis Kegiatan
                                        </h4>
                                        <div>
                                            <a href="{{ route('jenis_kegiatan.edit', $jenisKegiatan->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit mr-1"></i> Edit
                                            </a>
                                            <a href="{{ route('jenis_kegiatan.index') }}" class="btn btn-light btn-sm">
                                                <i class="fas fa-arrow-left mr-1"></i> Kembali
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <div class="col-md-3 font-weight-bold">Nama Jenis Kegiatan:</div>
                                            <div class="col-md-9">
                                                <h5>{{ $jenisKegiatan->name }}</h5>
                                            </div>
                                        </div>

                                        <hr>

                                        <h5 class="mb-3">
                                            <i class="fas fa-calendar-check mr-2"></i> Daftar Kegiatan
                                        </h5>

                                        @if($jenisKegiatan->kegiatan->count() > 0)
                                            <div class="table-responsive">
                                                <table class="table table-sm table-bordered table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Deskripsi Kegiatan</th>
                                                            <th>Periode</th>
                                                            <th>Tempat</th>
                                                            <th>Peserta</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($jenisKegiatan->kegiatan as $kegiatan)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $kegiatan->deskripsi }}</td>
                                                                <td>
                                                                    {{ $kegiatan->tanggal_mulai }}<br>
                                                                    s/d {{ $kegiatan->tanggal_selesai }}
                                                                </td>
                                                                <td>{{ $kegiatan->tempat }}</td>
                                                                <td class="text-center">
                                                                    <span class="badge badge-pill bg-info">
                                                                        {{ $kegiatan->count() }} Dosen
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="alert alert-info">
                                                <i class="fas fa-info-circle mr-2"></i> Belum ada kegiatan untuk jenis ini.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ 'template' }}/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ 'template' }}/assets/demo/chart-area-demo.js"></script>
    <script src="{{ 'template' }}/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ 'template' }}/js/datatables-simple-demo.js"></script>
</body>

</html>