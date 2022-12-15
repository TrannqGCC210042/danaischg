<section class="row">
    <?php
    include_once 'admin/nav.php';
    ?>

    <script>
        // Function to check if the user wants to delete or not.
        function deleteConfirm() {
            if (confirm("Are you sure to delete!")) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <div class="col-lg-10 col-md-9 col-12">
        <div class="pt-2 mb-2">
            <h1 class="text-center">Supplier List</h1>
            <div class="text-center mb-2 row">
                <div class="col-6 d-flex justify-content-start align-items-center">
                    <a href="?page=addSupplier" class="btn btn-outline-dark"><i class="bi bi-plus-circle pe-2"></i>Add</a>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <form action="/manage/supplier" method="GET" class="d-flex input-group w-auto">
                        <input name="search" type="search" class="form-control" placeholder="Search by name" aria-label="Search" aria-describedby="search-addon" />
                        <button class="btn btn-secondary searching" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
            <table class="table table-striped table-bordered m-0" cellspacing="0" width="100%">
                <thead class="justify-content-md-between justify-content-sm-center align-content-center border-bottom border-2 my-2 bg-dark text-light p-3 rounded-3">
                    <tr class="text-center">
                        <th>
                            <strong>ID</strong>
                        </th>
                        <th>
                            <strong>Supplier Name</strong>
                        </th>
                        <th>
                            <strong>Telephone</strong>
                        </th>
                        <th>
                            <strong>Address</strong>
                        </th>
                        <th>
                            <strong>Edit</strong>
                        </th>
                        <th>
                            <strong>Delete</strong>
                        </th>
                    </tr>
                </thead>

                <tbody class="justify-content-md-between justify-content-sm-center border-bottom border-2 my-2 bg-light p-2 rounded-3">
                    <?php
                    // Display the list of supplier
                    $c = new Connect();
                    $dblink = $c->connectToMySQL();

                    $sql = "SELECT * FROM `supplier`";
                    $stmt = $dblink->query($sql);

                    while ($row = $stmt->fetch_assoc()) :
                    ?>
                        <tr>
                            <td class="text-center align-middle"><?= $row['id'] ?></td>
                            <td class="text-center align-middle"><?= $row['name'] ?></td>
                            <td class="text-center align-middle"><?= $row['phone'] ?></td>
                            <td class="align-middle"><?= $row['address'] ?></td>

                            <td class="text-center align-middle">
                                <a href="?page=updateSupplier&id=<?= $row['id'] ?>"><i class="bi bi-pen-fill" style="color: black;"></i></a>
                            </td>
                            <td class="text-center align-middle">
                                <a href="?page=supplier&id=<?= $row['id'] ?>" onclick="return deleteConfirm()"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php
$c = new Connect();
$dblink = $c->connectToPDO();

// Delete a data
if (isset($_GET['id'])) :

    $id = $_GET['id'];
    $sqlSelect = "DELETE FROM `supplier` WHERE `id` = ?";
    $stmt = $dblink->prepare($sqlSelect);
    $execute = $stmt->execute(array("$id"));

    if($execute):
        header("Location: ?page=supplier");
    endif;
        echo "Failed".$execute;
endif;
?>