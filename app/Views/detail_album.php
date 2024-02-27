<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link href="/assets/css/profile.css" rel="stylesheet">
<main class="container mt-4">

    <section class="row justify-content-center">
        <section class="col-md-4 col-3 mt-4 text-center">
            <!-- Cover_album image -->
            <img src="/foto_storage/<?= $albums['cover_album'] ?>" class="rounded-img img-fluid" alt="..."
                width="200px" />
        </section>
    </section>

    <!-- Rest of the content -->
    <section id="header" class="row justify-content-center mt-4">
        <section class="col-md-8 col-7 ps-4 text-center">
            <div class="d-flex justify-content-center align-items-center">
                <h1 class="h4 fs-4">
                    <?= $albums['title_album'] ?>
                </h1>
            </div>
            <strong>
                <?= count($album); ?>
            </strong> Picture
            <p class="mt-3">
                <?= $albums['description'] ?>
            </p>
            <?php if (session()->get('id_user') == $albums['id_user']): ?>
                <div>
                    <button class="btn-profile" onclick="redirectToPage('/edit_album/<?= $albums['id_album'] ?>')"><i
                            class="fa-solid fa-gear me-1"></i> Edit
                        Album</button>
                    <button class="btn-profile" <button class="battenlogin active" type="button" data-bs-toggle="modal"
                        data-bs-target="#deletealbumModal"><i class="fa-solid fa-trash-can me-1"></i>Hapus Album</button>
                </div>
            <?php endif; ?>
        </section>
    </section>
</main>
<div class="gridds">
    <?php foreach ($fotos as $key => $f): ?>
        <div class="box">
            <?php if (isset($album[$key]['foto'])): ?>
                <a href="/detail_foto_album/<?= $f['id_fotoalbum']; ?>">
                    <img src="/foto_storage/<?= $album[$key]['foto']; ?>" alt="">
                </a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<?= view('layout/delete_album_modal') ?>
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.7.10/dist/index.bundle.min.js"></script>
<?= $this->endSection(); ?>