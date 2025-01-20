<?php
use App\Controllers\CourController;

require_once dirname(__DIR__, 1) . "\\Partials\\header.php";
$CourController = new CourController;
?>

    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Categories</h5>
        </div>
        <div class="row g-4 px-4 py-4">
            <?php foreach ($categories as $value) { ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                    <div class="card h-100 shadow-sm border-1 hover-lift">
                        <div class="card-body text-center">
                            <div class="icon-wrapper mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                                    class="bi bi-code-slash text-primary" viewBox="0 0 16 16">
                                    <path
                                        d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z" />
                                </svg>
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
