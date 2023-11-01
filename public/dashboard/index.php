<?php
require_once("../header/header.php");
require_once("../functions.php");

if (!isset($_SESSION['email'])) {
    header('Location:' . BASE_URL . "/login/index.php");
}



$allRegistrations = readDatabaseFile(DB_FILE_PATH);
usort($allRegistrations, function ($a, $b) {
    return $a['id'] - $b['id'];
});


?>

<section class="vh-100" style="background-color: #eee;">
<!-- <section class="vh-100 text-white parallaxss"> -->
    <div class="container">
        <div class="row">
            <h3 class="mt-5 text-center">Role Management</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="mb-3 d-flex justify-content-end">
                    <a class="btn btn-warning" href="<?php echo BASE_URL; ?>/dashboard/user/create.php">Add New User</a>
                </div>



                <?php if (isset($_GET['success'])) :  ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_GET['success'];
                        ?>
                    </div>
                <?php endif; ?>
                <table class="table-sm table table-striped table-bordered table-hover text-white table-dark">
                    <thead class="text-white">
                        <tr class="text-center">
                            <th scope="col">#SL</th>
                            <th scope="col">ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">

                        <?php if (isset($allRegistrations)) :
                            $i = 0;
                            foreach ($allRegistrations as $data) :
                        ?>
                                <tr>
                                    <td class="text-white text-center"><?php echo ++$i; ?></td>
                                    <td class="text-white text-center"><?php echo $data['id']; ?></td>
                                    <td class="text-white text-center"><?php echo $data['username'] ?? ""; ?></td>
                                    <td class="text-white text-center"><?php echo $data['email'] ?? ""; ?></td>
                                    <td class="text-white text-center"><?php echo $data['role'] ?? ""; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo BASE_URL; ?>/dashboard/user/view.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm">View</a>
                                        <?php if (isAdmin()) : ?>
                                            <a href="<?php echo BASE_URL; ?>/dashboard/user/edit.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <?php endif; ?>
                                        <?php if (isAdmin()) : ?>
                                            <a href="<?php echo BASE_URL; ?>/dashboard/user/delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once("../header/footer.php"); ?>