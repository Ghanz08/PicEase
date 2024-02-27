<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-profile">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ms-3 my-3">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-profile btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="<?= route_to('logout') ?>" class="btn-profile btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>