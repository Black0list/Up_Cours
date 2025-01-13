<?php
// die(dirname(__DIR__, 1) . "\\vendor\\autoload.php");
// require_once dirname(__DIR__) . "\\vendor\\autoload.php";
// echo dirname(__DIR__, 1) . "\\Partials\\header.php";
// die();
if(!isset($_SESSION['user'])){
    header('location: /form/auth');
}
// var_dump($_SESSION['user']);
require_once dirname(__DIR__, 1) . "\\Partials\\header.php"?>
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h5 class="mb-0">Applications</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">LastName</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
<?php require_once dirname(__DIR__, 1) . "\\Partials\\footer.php" ?>