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
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Edit Relasi Dosen - Kegiatan</h3>
                                    </div>
                                    <div class="card-body">
                                        <form
                                            action="{{ route('dosen_kegiatan.update', ['dosen_id' => $dosenKegiatan->dosen_id, 'kegiatan_id' => $dosenKegiatan->kegiatan_id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="dosen_id">Dosen</label>
                                                <select class="form-control @error('dosen_id') is-invalid @enderror"
                                                    id="dosen_id" name="dosen_id" required disabled>
                                                    <option value="{{ $dosenKegiatan->dosen_id }}" selected>
                                                        {{ $dosenKegiatan->dosen->name }}
                                                        ({{ $dosenKegiatan->dosen->nidn }})
                                                    </option>
                                                </select>
                                                <input type="hidden" name="dosen_id"
                                                    value="{{ $dosenKegiatan->dosen_id }}">
                                                @error('dosen_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="kegiatan_id">Kegiatan</label>
                                                <select class="form-control @error('kegiatan_id') is-invalid @enderror"
                                                    id="kegiatan_id" name="kegiatan_id" required>
                                                    <option value="">-- Pilih Kegiatan --</option>
                                                    @foreach($kegiatan as $k)
                                                        <option value="{{ $k->id }}" {{ $dosenKegiatan->kegiatan_id == $k->id ? 'selected' : '' }}>
                                                            {{ $k->deskripsi }}
                                                            ({{ $k->jenis_kegiatan->nama }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kegiatan_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> Update
                                                </button>
                                                <a href="{{ route('dosen_kegiatan.index') }}" class="btn btn-secondary">
                                                    <i class="fas fa-arrow-left"></i> Batal
                                                </a>
                                            </div>
                                        </form>
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