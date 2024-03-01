<?= $this->extend('layout/base'); ?>

<?= $this->section('content'); ?>
<link href="/assets/css/login.css" rel="stylesheet">
<!-- login form -->
<div class="container mt-5 bg yaya">
    <div class="row justify-content-center ">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex ">
                <div class="img " style="background-image: url(/assets/images/auth/bg-login.jpeg);">
                </div>
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Sign In</h3>
                        </div>
                    </div>
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger" id="alert">
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <?= esc($error) ?><br>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success" id="alert">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger" id="alert" role="alert">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php } ?>

                    <form action="/auth/valid_login" method="POST" class="signin-form">
                        <div class="form-group mb-3">
                            <label class="label" for="name">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary border-btn submit px-3">Sign
                                In</button>
                        </div>
                    </form>
                    <p class="text-center">Tidak punya akun? <a data-toggle="tab" href="/register">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        class AlertDisappearance {
            constructor(element, delay) {
                this.element = element;
                this.delay = delay;
            }

            start() {
                setTimeout(() => {
                    this.hide();
                }, this.delay);
            }

            hide() {
                $(this.element).slideUp(500, function () {
                    $(this).fadeOut(500, function () {
                        $(this).remove();
                    });
                });
            }
        }

        const alertElement = document.getElementById("alert");
        const alertDisappearance = new AlertDisappearance(alertElement, 4000); // 3000 milliseconds (3 seconds)
        alertDisappearance.start();
    });
</script>

<?= $this->endSection(); ?>
