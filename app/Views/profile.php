<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link href="/assets/css/profile.css" rel="stylesheet">
<main class="container mt-4">
    <section id="header" class="row">
        <section class="col-md-4 col-3 mt-4 text-center">
            <img src="/assets/images/user/<?= $user['foto']; ?>" class="rounded-circle img-profile img-fluid" alt="..."
                width="200px" height="200px" />
        </section>
        <section class="col-md-8 col-7 ps-4 mt-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h4 fs-4">
                    <?= $user['username']; ?>
                </h1>

                <?php if ($user['id_user'] == session()->get('id_user')): ?>
                    <div>
                        <button class="btn-profile" onclick="redirectToPage('/edit-profile/<?= $user['id_user']; ?>')"><i
                                class="fa-solid fa-gear me-1"></i> Edit
                            Akun</button>
                        <button class="btn-profile" <button class="battenlogin active" type="button" data-bs-toggle="modal"
                            data-bs-target="#logoutModal">Logout</button>
                    </div>
                <?php endif; ?>
            </div>
            <strong>
                <?= count($foto); ?>
            </strong> posts
            <h2 class="h6 mt-3">
                <?= $user['bio']; ?>
            </h2>
            <p>
                <?= $user['description']; ?>
            </p>
        </section>
        <ul class="nav nav-tabs justify-content-center mt-3">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#posts"><i
                        class="fa-solid fa-image me-1"></i>Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#saved"><i
                        class="fa-solid fa-border-all me-1"></i>Album</a>
            </li>
        </ul>


    </section>


    </section>
</main>
<div class="tab-content mt-3">
    <div class="tab-pane active" id="posts">
        <?php if ($user['id_user'] == session()->get('id_user')): ?>
            <div class="gridds-button">
                <div class="d-flex justify-content-end mb-3">
                    <div class="ms-auto"> <!-- Use ms-auto to push content to the right -->
                        <button class="btn btn-detail" onclick="redirectToPage('/create/')">
                            <i class="fa-solid fa-plus me-1"></i> Create Photo
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="gridds">
            <?php foreach ($foto as $g): ?>
                <div class="box">
                    <a href="/detail-profile/<?= $g['id_foto']; ?>">
                        <img src="/foto_storage/<?= $g['foto']; ?>" alt="">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="tab-pane" id="saved">
        <div class="tab-pane active" id="posts">
            <?php if ($user['id_user'] == session()->get('id_user')): ?>
                <div class="gridds-button">
                    <div class="d-flex justify-content-end mb-3">
                        <div class="ms-auto"> <!-- Use ms-auto to push content to the right -->
                            <button class="btn btn-detail" onclick="redirectToPage('/create/album')">
                                <i class="fa-solid fa-plus me-1"></i> Buat Album
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="gridds-album">
                <?php foreach ($album as $a): ?>
                    <div class="album">
                        <a href="/detail_album/<?= $a['id_album']; ?>">
                            <img src="/foto_storage/<?= $a['cover_album']; ?>" class="img-thumbnail px-0 py-0"
                                alt="<?= $a['title_album']; ?>">
                            <p class="text-center p-album">
                                <?= $a['title_album']; ?>
                            </p>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>
<?= view('layout/logout_modal') ?>
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.7.10/dist/index.bundle.min.js"></script>
<?= $this->endSection(); ?>