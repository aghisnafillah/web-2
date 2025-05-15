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
                                <div class="card shadow">
                                    <div class="card-header bg-primary text-white">
                                        <h4 class="mb-0">Edit Kegiatan</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="jenis_kegiatan_id">Jenis Kegiatan</label>
                                                <select name="jenis_kegiatan_id" id="jenis_kegiatan_id"
                                                    class="form-control @error('jenis_kegiatan_id') is-invalid @enderror"
                                                    required>
                                                    @foreach($jenisKegiatan as $jenis)
                                                        <option value="{{ $jenis->id }}" {{ $kegiatan->jenis_kegiatan_id == $jenis->id ? 'selected' : '' }}>
                                                            {{ $jenis->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('jenis_kegiatan_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi Kegiatan</label>
                                                <textarea name="deskripsi" id="deskripsi" rows="3"
                                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                                    required>{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                                                @error('deskripsi')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tanggal_mulai">Tanggal Mulai</label>
                                                        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                                            class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                                            value="{{ old('tanggal_mulai', $kegiatan->tanggal_mulai) }}"
                                                            required>
                                                        @error('tanggal_mulai')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tanggal_selesai">Tanggal Selesai</label>
                                                        <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                                            class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                                            value="{{ old('tanggal_selesai', $kegiatan->tanggal_selesai) }}"
                                                            required>
                                                        @error('tanggal_selesai')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="tempat">Tempat</label>
                                                <input type="text" name="tempat" id="tempat"
                                                    class="form-control @error('tempat') is-invalid @enderror"
                                                    value="{{ old('tempat', $kegiatan->tempat) }}" required>
                                                @error('tempat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> Update
                                                </button>
                                                <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">
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