<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Comic Detail</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $comic['cover']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $comic['title']; ?></h5>
                            <p class="card-text"><b>Author : </b><?= $comic['author']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Publisher : </b><?= $comic['publisher']; ?></small></p>

                            <a href="/comic/edit/<?= $comic['slug']; ?>" class="btn btn-warning">Edit</a>

                            <!-- <a href="/comic/delete/<?= $comic['id']; ?>" class="btn btn-danger">Delete</a> -->

                            <!-- delete using method spoofing -->
                            <form action="/comic/<?= $comic['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure?');">Delete</button>
                            </form>

                            <br><br>
                            <a href="/comic">Return to Comic List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>