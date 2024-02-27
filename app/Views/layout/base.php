<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="/assets/css/navbar.css" rel="stylesheet">
    <link href="/assets/css/grids.css" rel="stylesheet">
    <link href="/assets/css/auth.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/978438a1fc.js" crossorigin="anonymous"></script>
    <title>PicEase</title>

</head>

<body>

    <header>
        <!-- navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home">
                    <img src="/assets/images/logo/Logo.png" alt="" width="40" height="40" class="d-inline-block ">
                    <span class="brand">PicEase</span>
                </a>

                <?= $this->renderSection('select') ?>

                <?php if (!session()->has('username')): ?>
                    <ul class="navbar-nav ms-0 me-1 mb-lg-0" id="inihome">
                        <button class="battenlogin active" type="button" onclick="redirectToPage('/login')">Login</button>
                    </ul>
                <?php endif; ?>

                <?php if (session()->has('username')): ?>
                    <ul class="navbar-nav ms-1 me-0 mb-lg-0">
                        <button type="button" class="battenprofile">
                            <img src="/assets/images/user/<?= session('foto') ?>" alt="" draggable="false" class="user"
                                onclick="redirectToPage('/profile/<?= session()->get('id_user'); ?>')">
                        </button>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
        <!-- end navbar -->
    </header>

    <div class="bungkus">
        <?= $this->renderSection('content') ?>
    </div>
    <script src="/assets/js/onclick.js"></script>
    <script src="/assets/js/hide-button.js"></script>
</body>

</html>