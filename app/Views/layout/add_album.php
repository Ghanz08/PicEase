<div class="modal fade" id="addAlbumModal" tabindex="-1" aria-labelledby="addAlbumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-profile">
            <div class="modal-header">
                <h5 class="modal-title" id="addAlbumModalLabel">Add Album</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ms-2">
                <form id="addAlbumForm" action="/addfotoalbum/<?= $foto['id_foto']; ?>" method="post">
                    <div class="form-group">
                        <label for="title">Select Album</label>
                        <select class="form-select" id="album" name="album" aria-label="Default select example">
                            <option selected disabled>Select Album</option>
                            <?php if(empty($album)): ?>
                                <option disabled>Anda tidak memiliki album</option>
                            <?php else: ?>
                                <?php foreach ($album as $album): ?>
                                    <option value="<?= $album['id_album']; ?>">
                                        <?= $album['title_album']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-detail-1" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-detail-1 mt-1" id="addPhotoToAlbumBtn"><i
                        class="fa-solid fa-plus me-1"></i>Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addPhotoToAlbumBtn = document.getElementById('addPhotoToAlbumBtn');
        const addAlbumForm = document.getElementById('addAlbumForm');

        addPhotoToAlbumBtn.addEventListener('click', function () {
            addAlbumForm.submit();
        });
    });
</script>