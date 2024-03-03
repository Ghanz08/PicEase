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
        <input id="searchInput" class="me-2 searchbar search-placeholder" type="search" placeholder="Search..."
            aria-label="Search">
    </form>
</ul>
<?= $this->endSection(); ?>

<?= $this->extend('layout/base'); ?>
<?= $this->section('content'); ?>

<div class="gridds">
    <?php foreach ($foto as $g): ?>
        <div class="box" data-name="<?= $g['title']; ?>"> <!-- Gunakan 'title' untuk atribut data-name -->
            <a href="/detail/<?= $g['id_foto']; ?>">
                <img src="/foto_storage/<?= $g['foto']; ?>" alt="">
            </a>
        </div>
    <?php endforeach; ?>
</div>

<script>
    // Tangkap input setiap kali berubah
    document.getElementById('searchInput').addEventListener('input', function () {
        let searchTerm = this.value.toLowerCase(); // Ambil nilai input dan ubah menjadi lowercase
        let boxes = document.querySelectorAll('.box'); // Ambil semua box

        // Loop melalui setiap box
        boxes.forEach(function (box) {
            let name = box.getAttribute('data-name').toLowerCase(); // Ambil nama dari data-name

            // Periksa apakah nama sesuai dengan pencarian, jika ya, tampilkan, jika tidak, sembunyikan
            if (name.includes(searchTerm)) {
                box.style.display = 'block';
            } else {
                box.style.display = 'none';
            }
        });
    });
</script>

<?= $this->endSection(); ?>