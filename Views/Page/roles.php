<?php
use App\Controllers\CourController;

require_once dirname(__DIR__, 1) . "\\Partials\\header.php";
$CourController = new CourController;
?>

        <div class="card shadow border-0 bg-white">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="mb-0">Roles</h5>
            </div>
            <div class="row g-4 px-4 py-4">
                <?php foreach ($roles as $role) { ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-1 border-primary">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo $role->getRoleName(); ?></h5>
                                <p class="card-text text-muted"><?php echo $role->getDescription(); ?></p>
                            </div>
                            <div class="card-footer bg-light text-center">
                                <button class="btn btn-primary">View Role</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


<?php require_once dirname(__DIR__, 1) . "\\Partials\\footer.php"; ?>
