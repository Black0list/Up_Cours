<?php
if (!isset($_SESSION['user'])) {
    header('location: /form/auth');
}
require_once dirname(__DIR__, 1) . "\\Partials\\header.php";
?>
<div class="card shadow border-0 mb-7">
    <div class="card-header bg-primary text-white text-center">
        <h5 class="mb-0">Utilisateurs</h5>
    </div>
    <div class="table-responsive p-4">
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $value) { ?>
                    <tr>
                        <td><?php echo $value->getName(); ?></td>
                        <td><?php echo $value->getEmail(); ?></td>
                        <td><?php echo $value->getRole()->getRoleName(); ?></td>
                        <td><?php echo $value->getStatus(); ?></td>
                        <?php
                        if (strtolower($value->getRoleName()) != "admin") { ?>
                            <td>
                                <form action="/user/delete" method="POST" style="display:inline;">
                                    <input type="hidden" name="user_id" value="<?php echo $value->getId(); ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                                <form action="/user/get" method="POST" style="display:inline;">
                                    <input type="hidden" name="user_id" value="<?php echo $value->getId(); ?>">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </td>
                        <?php }
                        ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once dirname(__DIR__, 1) . "\\Partials\\footer.php"; ?>