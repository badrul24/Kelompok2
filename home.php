<div class="row">
    <?php
    include('koneksi.php');
    $news = mysqli_query($db, "SELECT * FROM berita ORDER BY id DESC LIMIT 6");
    while ($data_berita = mysqli_fetch_array($news)) {
    ?>
        <div class="col-4">
            <div class="card h-100" style="width: 18rem;">
                <img src="admin/image/<?= $data_berita['file_upload'] ?>" class="card-img-top" width="200" height="200">
                <div class="card-body d-flex flex-column">
                    <div class="d-inline-block w-100">
                        <p class="card-title text-truncate"><?= $data_berita['judul_berita'] ?></p>
                    </div>
                    <h5 class="card-text"><?= substr($data_berita['isi_berita'], 0, 200) ?>...</h5>
                    <div class="mt-auto">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#beritaModal" 
                            data-bs-judul="<?= $data_berita['judul_berita'] ?>"
                            data-bs-isi="<?= $data_berita['isi_berita'] ?>">Baca Selengkapnya</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<div class="modal fade" id="beritaModal" tabindex="-1" aria-labelledby="beritaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="beritaModalLabel">Judul Berita</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 id="beritaIsi"></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    var beritaModal = document.getElementById('beritaModal');
    beritaModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var judul = button.getAttribute('data-bs-judul');
        var isi = button.getAttribute('data-bs-isi');

        var modalTitle = beritaModal.querySelector('.modal-title');
        var modalBody = beritaModal.querySelector('#beritaIsi');

        modalTitle.textContent = judul;
        modalBody.textContent = isi;
    });
</script>
