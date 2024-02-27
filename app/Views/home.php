<?= $this->extend('layout/base'); ?>
<?= $this->section('select'); ?>
<ul class="navbar-nav ms-2 mb-lg-0 home" id="inihome">
    <button class="batten active" type="button" onclick="redirectToPage('/home')">Home</button>
</ul>
<ul class="navbar-nav ms-2 mb-lg-0 create" id="inicreate">
    <button class="batten" type="button" onclick="redirectToPage('/create')">Create</button>
</ul>
<ul class="navbar-nav mb-lg-0 hom" id="inicreate">
    <button class="battenhome" type="button" onclick="redirectToPage('/home')"><i
            class="fa-solid fa-house fa-xl"></i></button>
</ul>
<ul class="navbar-nav mb-lg-0 plus" id="inicreate">
    <button class="battenplus" type="button" onclick="redirectToPage('/create')"><i
            class="fa-solid fa-plus fa-xl"></i></button>
</ul>
<ul class="navbar-nav ms-2 emes mx-auto mb-lg-0 d-flex justify-content-center">
    <form role="search">
        <input class="me-2 searchbar search-placeholder" type="search" placeholder="Search..." aria-label="Search">
    </form>
</ul>
<?= $this->endSection(); ?>

<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<div class="gridds">
    <?php foreach ($foto as $g): ?>
        <div class="box">
            <a href="/detail/<?= $g['id_foto']; ?>">
                <img src="/foto_storage/<?= $g['foto']; ?>" alt="">
            </a>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>