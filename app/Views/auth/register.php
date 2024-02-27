<?= $this->extend('layout/base'); ?>

<?= $this->section('content'); ?>
<link href="assets/css/login.css" rel="stylesheet">
<!-- login form -->
<div class="container mt-5 bg yaya">
    <div class="row justify-content-center ">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex ">
                <div class="img" style="background-image: url(assets/images/auth/bg-login.jpeg);">
                </div>
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Register</h3>
                        </div>
                    </div>
                    <form action="/auth/valid_register" method="POST" class="signin-form">
                        <div class="form-group mb-3">
                            <label class="label" for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="username">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label class="label" for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                                        required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa-regular fa-eye-slash" id="togglePassword"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="label" for="confirm_password">Confirm</label>
                                <div class="input-group">
                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm..."
                                        required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa-regular fa-eye-slash" id="togglePassword1"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary border-btn submit px-3">Sign
                                Up</button>
                        </div>
                    </form>
                    <p class="text-center">Have an account? <a data-toggle="tab" href="/login">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script>
    const togglePassword = document
        .querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', () => {
        // Toggle the type attribute using
        // getAttribure() method
        const type = password
            .getAttribute('type') === 'password' ?
            'text' : 'password';
        password.setAttribute('type', type);
        // Toggle the eye and bi-eye icon
        this.classList.toggle('bi-eye');
    });
    const togglePassword1 = document
        .querySelector('#togglePassword1');
    const password1 = document.querySelector('#confirm_password');
    togglePassword1.addEventListener('click', () => {
        // Toggle the type attribute using
        // getAttribure() method
        const type1 = password1
            .getAttribute('type') === 'password' ?
            'text' : 'password';
        password1.setAttribute('type', type1);
        // Toggle the eye and bi-eye icon
        this.classList.toggle('bi-eye');
    });
</script>
<?= $this->endSection(); ?>