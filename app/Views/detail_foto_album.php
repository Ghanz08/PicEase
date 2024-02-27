<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<link href="/assets/css/form_image.css" rel="stylesheet">
<link href="/assets/css/form_create.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/comments.css" />
<link href="/assets/css/detail.css" rel="stylesheet">

<?php

$logged_in = session()->get('logged_in');
?>

<div class="container mt-5">
    <div class="row">
        <div class="col colku1">
            <div class="window boxshadow">
                <img class="foto" src="/foto_storage/<?= $foto['foto']; ?>" alt="">
            </div>
        </div>


        <div class="col colku2">
            <div class="containerPost border-mix melengkung">
                <div class="row">
                    <div class="col-12">
                        <div class="display-flex">
                            <button type="button" class="battenprofile">
                                <img src="/assets/images/user/<?= $userid['foto']; ?>" alt="" class="user"
                                    onclick="redirectToPage('/profile/<?= $userid['id_user']; ?>')">
                            </button>
                            <span class="centerprofilepost mb-3 fs-4 mx-2 mt-3">
                                <a href="/profile/<?= $userid['id_user']; ?>">
                                    <?= $userid['username']; ?>
                                </a>
                            </span>
                            <?php if (session()->get('id_user') == $foto['id_user']): ?>
                            <div class="ms-auto mt-3"> <!-- Use ms-auto to push content to the right -->
                                <div>
                                    <button class="btn btn-detail mt-1" type="button" data-bs-toggle="modal"
                                        data-bs-target="#deletefotoalbumModal"><i
                                            class="fa-solid fa-trash me-2"></i>Hapus
                                        gambar dari album</button>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <h3 class="mt-3">
                            <?= $foto['title']; ?>
                        </h3>
                        <p>
                            <?= $foto['description']; ?>
                        </p>
                        <div>
                            <?php if ($logged_in == true): ?>
                                <?php if ($liked): ?>
                                    <a href="/unlike/<?= $foto['id_foto']; ?>" class="btn btn-unlike"><i
                                            class="fas fa-heart"></i></a>
                                <?php else: ?>
                                    <a href="/like/<?= $foto['id_foto']; ?>" class="btn btn-like"><i
                                            class="far fa-heart"></i></a>
                                <?php endif; ?>
                                <?php if ($totalLikes > 0): ?>
                                    <span class="ml-2">
                                        <?= $totalLikes; ?>
                                    </span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <p style="opacity: 0.5;" class="created-at">
                            <?= $foto['created_at']; ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <?php if ($logged_in == True): ?>
                        <form action="/comment/save/<?= $fotos['id_foto']; ?>" method="post" enctype="multipart/form-data">
                            <div class="coment-bottom card bg-white p-2 px-4">
                                <div class="d-flex flex-row add-comment-section mb-4">
                                    <img class="img-fluid img-responsive rounded-circle me-2"
                                        src="/assets/images/user/<?= session()->get('foto'); ?>" width="38">
                                    <input type="text" class="form-control me-3" id="comment" name="comment"
                                        autocomplete="off" required placeholder="Add comment">
                                    <button class="btn btn-detail" type="submit">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>
                        </form>
                        <?php foreach ($comment as $comment): ?>
                            <div class="commented-section mt-2 scrolling">
                                <div class="d-flex flex-row align-items-center commented-user">
                                    <h5 class="me-2">
                                        <?= $comment['username']; ?>
                                    </h5><span class="dot mb-1"></span><span class="mb-1 ms-2 created-at">
                                        <?= $comment['created_at']; ?>
                                    </span> <!-- Displayed time -->
                                </div>
                                <div class="comment-text-sm">
                                    <span>
                                        <?= $comment['comment']; ?>
                                    </span>
                                </div>
                                <div class="comment-text-xsmall">
                                    <span>
                                        <a href="/delete_comment/<?= $comment['id_comment']; ?>"
                                            class="comment-text-xsmall">delete</a>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="coment-bottom card bg-white p-2 px-4">
            <div class="d-flex flex-row add-comment-section mb-4">
                <img class="img-fluid img-responsive rounded-circle me-2" src="https://i.imgur.com/qdiP4DB.jpg" width="38">
                <input type="text" class="form-control me-3" disabled placeholder="You cannot comment if you not Login">
                <button class="btn btn-primary" disabled type="button">
                    Comment
                </button>
            </div>
            <?php foreach ($comment as $comment): ?>
                <div class="commented-section mt-2 scrolling">
                    <div class="d-flex flex-row align-items-center commented-user">
                        <h5 class="me-2">
                            <?= $comment['username']; ?>
                        </h5><span class="dot mb-1"></span><span class="mb-1 ms-2 created-at">
                            <?= $comment['created_at']; ?>
                        </span> <!-- Displayed time -->
                    </div>
                    <div class="comment-text-sm">
                        <span>
                            <?= $comment['comment']; ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>



<div class="modal fade" id="deletefotoalbumModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-profile">
            <form action="/album/delete/foto/<?= $fotos['id_fotoalbum'] ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ms-3 my-3">
                    Are you sure you want to Delete this Foto From
                    this Album?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-detail-1" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-detail "><i class="fa-solid fa-trash me-2"></i>Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="/assets/js/calculatetime.js"></script>
<?= $this->endSection(); ?>