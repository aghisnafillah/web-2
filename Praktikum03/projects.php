<!DOCTYPE html>
<html lang="en">
    <?php 
     include 'head.php'; 
    ?>
    <body class="d-flex flex-column h-100 bg-light">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php 
             include 'navbar.php';
            ?>
            <!-- Projects Section-->
            <section class="py-5">
                <div class="container px-5 mb-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projects</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                            <!-- Project Card 1-->
                            <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="p-5">
                                            <h2 class="fw-bolder">Project Pemweb Semester 1 </h2>
                                            <p>Aplikasi ini dibuat untuk meningkatkan efisiensi dalam pengelolaan dan layanan perpustakaan. mengelola data buku, termasuk informasi ketersediaan, kategori, dan lokasi penyimpanan.</p>
                                        </div>
                                        <img class="img-fluid" src="assets/project2.png" alt="..." />
                                    </div>
                                </div>
                            </div>
                            <!-- Project Card 2-->
                            <div class="card overflow-hidden shadow rounded-4 border-0">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="p-5">
                                            <h2 class="fw-bolder">Project DDP</h2>
                                            <p>Aplikasi jadwal harian yang bertujuan untuk membantu pengguna mengelola waktu dan aktivitas sehari hari secara lebih mudah dan efisien. memudahkan pengguna dalam mencatat dan mengatur kegiatan sehari hari, memberikan fitur to do list agar pengguna bisa menyusun tugas yang perlu diselesaikan, menyediakan fitur untuk mencatat pengeluaran dan pemasukan agar pengguna bisa mengelola keuangan pribadi dengan lebih baik</p>
                                        </div>
                                        <img class="img-fluid" src="assets/project1.png" alt="..." />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Call to action section-->
            <section class="py-5 bg-gradient-primary-to-secondary text-white">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="display-4 fw-bolder mb-4">Let's build something together</h2>
                        <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="contact.php">Contact me</a>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <?php 
         include 'footer.php';
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
