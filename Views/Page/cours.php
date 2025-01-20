<?php

use App\Controllers\CourController;

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
            <div class="row g-4">
                <?php
                $cours = $CourController->getAllBy("enseignant_id", $_SESSION['user']->getId());
                if ($_SESSION['user']->getRole()->getRoleName() == "admin") $cours = $CourController->getAll();
                foreach ($cours as $course) { ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-1 hover-lift">
                            <div class="card-body text-center">
                                <div class="icon-wrapper mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                                        class="bi bi-code-slash text-primary" viewBox="0 0 16 16">
                                        <path
                                            d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z" />
                                    </svg>
                                </div>
                                <h5 class="card-title"><?php echo $course->getTitle() ?></h5>
                                <p class="card-text text-muted"><?php echo $course->getDescription() ?></p>
                            </div>
                            <div class="card-footer bg-light text-center">
                                <form action="/cour/courDetails" method="POST" style="display:inline;">
                                    <input type="hidden" name="cour_id" value="<?php echo $course->getId(); ?>">
                                    <button type="submit" href="/cour/courDetails" class="btn btn-primary">View Details</button>
                                </form>

                                <form action="/cour/delete" method="POST" style="display:inline;">
                                    <input type="hidden" name="cour_id" value="<?php echo $course->getId(); ?>">
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                </form>

                                <form action="/cour/get" method="POST" style="display:inline;">
                                    <input type="hidden" name="cour_id" value="<?php echo $course->getId(); ?>">
                                    <button type="submit" class="btn btn-info"><i class="bi bi-pencil"></i></button>
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