<?php

use App\Controllers\CategorieController;
use App\Controllers\CourController;
use App\Controllers\TagController;

// Include header
require_once dirname(__DIR__, 1) . "\\Partials\\header.php";

$CourController = new CourController;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <style>
        @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);
        /* Bootstrap Icons */
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");

        .service-card {
            perspective: 1000px;
            height: 400px;
        }

        .service-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.8s;
            transform-style: preserve-3d;
            cursor: pointer;
        }

        .service-card:hover .service-card-inner {
            transform: rotateY(180deg);
        }

        .service-card-front,
        .service-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .service-card-front {
            background: linear-gradient(45deg, #6366f1, #8b5cf6);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 2rem;
        }

        .service-card-back {
            background: white;
            color: #1f2937;
            transform: rotateY(180deg);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .feature-list li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .feature-list li:last-child {
            border-bottom: none;
        }

        .hover-lift {
            transition: transform 0.2s;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body style="background: linear-gradient(to right, #f8f9fa, #e9ecef);">

    <div class="card shadow border-0 mb-4">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Catalogue</h5>
        </div>
        <div class="table-responsive p-4">
            <div>
                <!-- <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</button> -->
                <button type="button" class="btn-sm mb-4 btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" <?php if ($_SESSION['user']->getRole()->getRoleName() == "enseignant") {
                                                                                                                                echo "style = 'display:block;'";
                                                                                                                            } else {
                                                                                                                                echo "style = 'display:none;'";
                                                                                                                            } ?>>Create</button>
                <!-- ============================ MODAL ============================ -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/cour/create" method="POST">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter the title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea id="description" name="description" class="form-control" placeholder="Enter the description"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Content</label>
                                        <input type="url" id="content" name="content" class="form-control" placeholder="Enter the content URL" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categorie" class="form-label">Categorie</label>
                                        <select id="categorie" name="categorie" class="form-select" required>
                                            <?php
                                            $CategorieController = new CategorieController;
                                            $categories = $CategorieController->getAll();
                                            foreach ($categories as $value) { ?>
                                                <option value="<?php echo $value->getId() ?>"><?php echo $value->getName() ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tags</label>
                                        <div>
                                            <?php
                                            $TagController = new TagController;
                                            $tags = $TagController->getAll();
                                            foreach ($tags as $value) { ?>
                                                <div class="form-check form-check-inline">
                                                    <label for="<?php echo $value->getName() ?>" class="form-check-label"><?php echo $value->getName() ?></label>
                                                    <input id="<?php echo $value->getName() ?>" name="tags[]" class="form-check-input" type="checkbox" value="<?php echo $value->getId() ?>">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" id="enseignant" name="enseignant" value="<?php echo $_SESSION['user']->getId() ?>" required>
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
            <div class="row g-4">
                <?php
                $cours = $CourController->getAllBy("enseignant_id", $_SESSION['user']->getId());
                if ($_SESSION['user']->getRole()->getRoleName() == "admin" || $_SESSION['user']->getRole()->getRoleName() == "etudiant") $cours = $CourController->getAll();
                foreach ($cours as $course) { ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-1 hover-lift">
                            <div class="card-body text-center">
                                <div class="icon-wrapper mb-3">
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-secondary text-white text-lg rounded-circle">
                                            <i class="bi bi-book"></i></i>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title"><?php echo $course->getTitle() ?></h5>
                                <p class="card-text text-muted" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 200px;"><?php echo $course->getDescription() ?></p>
                            </div>
                            <div class="card-footer bg-light text-center">
                                <form action="/cour/courDetails" method="POST" style="display:inline;">
                                    <input type="hidden" name="cour_id" value="<?php echo $course->getId(); ?>">
                                    <button type="submit" href="/cour/courDetails" class="btn btn-primary">View Details</button>
                                </form>

                                <form action="/cour/get" method="POST" <?php if ($_SESSION['user']->getRole()->getRoleName() == "etudiant") {
                                                                            echo "style = 'display:none;'";
                                                                        } else {
                                                                            echo "style = 'display:inline;'";
                                                                        } ?>>
                                    <input type="hidden" name="cour_id" value="<?php echo $course->getId(); ?>">
                                    <button type="submit" class="btn btn-info"><i class="bi bi-pencil"></i></button>
                                </form>

                                <form action="/cour/delete" method="POST" <?php if ($_SESSION['user']->getRole()->getRoleName() == "etudiant") {
                                                                                echo "style = 'display:none;'";
                                                                            } else {
                                                                                echo "style = 'display:inline;'";
                                                                            } ?>>
                                    <input type="hidden" name="cour_id" value="<?php echo $course->getId(); ?>">
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php
    // Include footer
    require_once dirname(__DIR__, 1) . "\\Partials\\footer.php";
    ?>