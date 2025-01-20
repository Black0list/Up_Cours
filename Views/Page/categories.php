<?php

use App\Controllers\CourController;

require_once dirname(__DIR__, 1) . "\\Partials\\header.php";
$CourController = new CourController;
?>

<div class="card shadow border-0">
    <div class="card-header bg-primary text-white text-center">
        <h5 class="mb-0">Categories</h5>
    </div>

    <div>
        <!-- <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</button> -->
        <button type="button" class="btn-sm mb-4 mt-4 ms-4 btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</button>
        <!-- ============================ MODAL ============================ -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Categorie</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/categorie/create" method="POST">
                            <div class="mb-3">
                                <label for="categorie_name" class="form-label">Categorie Name</label>
                                <input type="text" id="categorie_name" name="categorie_name" class="form-control" placeholder="Enter the name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" placeholder="Enter the description"></textarea>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4 px-4 py-4">
        <?php foreach ($categories as $value) { ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                <div class="card h-100 shadow-sm border-1 hover-lift">
                    <div class="card-body text-center">
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                <i class="bi bi-bookmark"></i>
                            </div>
                        </div>
                        <h5 class="card-title"><?php echo $value->getName() ?></h5>
                        <p class="card-text text-muted"><?php echo $value->getDescription() ?></p>
                    </div>
                    <div class="card-footer bg-light text-center">
                        <form action="/categorie/delete" method="POST" style="display:inline;">
                            <input type="hidden" name="categorie_id" value="<?php echo $value->getId(); ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                        <form action="/categorie/get" method="POST" style="display:inline;">
                            <input type="hidden" name="categorie_id" value="<?php echo $value->getId(); ?>">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php require_once dirname(__DIR__, 1) . "\\Partials\\footer.php"; ?>