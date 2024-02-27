<?= $this->extend('layout/base'); ?>

<?= $this->section('content'); ?>
<link href="/assets/css/form_image.css" rel="stylesheet">
<link href="/assets/css/form_create.css" rel="stylesheet">

<div class="container mt-5">
    <form id="editPostForm" action="/update/album/<?= $album['id_album'] ?>" method="post"
        enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 d-flex justify-content-center mb-3">
                <div id="background-image" class="text-center">
                    <!-- Display the last uploaded image -->
                    <?php if (!empty($album['cover_album'])): ?>
                        <img src="<?= base_url('foto_storage/' . $album['cover_album']) ?>" alt="Uploaded Image">
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center mb-5">
                <label for="foto" id="drop-area">
                    <input type="file" accept="image/*" id="foto" name="foto" hidden required />
                    <div id="img-view">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="mt-4"><i class="fa-solid fa-cloud-arrow-up fa-xl"></i></h5>
                            </div>
                            <div class="col-12">
                                <div class="display-drag">
                                    <h5 class="mt-1" style="font-size: 15px; display: flex; justify-content: center;">
                                        Drag and drop or click here <br> to upload image
                                    </h5>
                                </div>
                                <div class="no-display-drag">
                                    <h5 class="mt-1" style="font-size: 15px; display: flex; justify-content: center;">
                                        Browse file
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </label>
            </div>

            <div class="col-12 d-flex justify-content-center mb-3">
                <div class=" w-50 border-mix melengkung">
                    <div class="containerPost">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-container">
                                    <h4 class="form-title mt-1 mb-3">Edit Album</h4>
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" value="<?= $album['title_album'] ?>"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" rows="10" cols="50"
                                            required><?= $album['description'] ?></textarea>
                                    </div>
                                    <div class="form-submit">
                                        <button type="submit" name="register" class="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="/assets/js/fetch-image.js"></script>
<script>
    // Pemanggilan displayImage dengan URL gambar yang sudah dimiliki
    var imageUrl = <?php echo json_encode(base_url('foto_storage/' . $album['cover_album'])); ?>;
    window.onload = function () {
        displayImage(imageUrl);
    };
</script>

<?= $this->endSection(); ?>