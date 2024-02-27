<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-profile">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ms-3 my-3">
                Apakah Kamu Ingin Menghapus Postingan Ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-detail-1" data-bs-dismiss="modal">Cancel</button>
                <a href="/delete_post/<?= $foto['id_foto'] ?>" class="btn btn-detail "><i
                        class="fa-solid fa-trash me-2"></i>Delete</a>
            </div>
        </div>
    </div>
</div>