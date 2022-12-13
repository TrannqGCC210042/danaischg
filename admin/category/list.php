<section class="row">
    <?php
    include_once 'admin/nav.php';
    ?>

    <script>
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
            <h1 class="text-center">Category List</h1>
            <div class="text-center mb-2 row">
                <div class="col-6 d-flex justify-content-start align-items-center">
                    <a href="?page=addCategory" class="btn btn-outline-info"><i class="bi bi-plus-circle"></i>
                        Add</a>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <form action="/manage/category" method="GET" class="d-flex input-group w-auto">
                        <input name="search" type="search" class="form-control" placeholder="Search by name" aria-label="Search" aria-describedby="search-addon" />
                        <button class="btn btn-secondary searching" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>

            <table id="tablecategory" class="table table-striped table-bordered m-0" cellspacing="0" width="100%">
                <thead class="justify-content-md-between justify-content-sm-center align-content-center border-bottom border-2 my-2 bg-dark text-light p-3 rounded-3">
                    <tr class="text-center">
                        <th>
                            <strong>ID</strong>
                        </th>
                        <th>
                            <strong>Category Name</strong>
                        </th>
                        <th>
                            <strong>Description</strong>
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
                    $c = new Connect();
                    $dblink = $c->connectToMySQL();

                    $sql = "SELECT * FROM `category`";
                    $re = $dblink->query($sql);
                    
                    while ($row = $re->fetch_assoc()) :
                    ?>
                        <tr>
                            <td class="text-center align-middle"><?= $row['id'] ?></td>
                            <td class="text-center align-middle"><?= $row['name'] ?></td>
                            <td class="align-middle"><?= $row['description'] ?></td>

                            <td class="text-center align-middle">
                                <a href="?page=updateCategory&cat_id=<?= $row['id'] ?>"><i class="bi bi-pen-fill" style="color: black;"></i></a>
                            </td>

                            <td class="text-center align-middle">
                                <a href="?page=category&function=del&id=<?= $row['id'] ?>" onclick="return deleteConfirm()"><i class="bi bi-trash-fill" style="color: red;"></i></a>
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
if (isset($_GET['function']) == "del" && isset($_GET['id'])) :
    $id = $_GET['id'];

    $c = new Connect();
    $dblink = $c->connectToPDO();

    $sql = "DELETE FROM `category` WHERE id = ?";
    $result = $dblink->prepare($sql);
    $result->execute(array("$id"));

    echo "<meta http-equiv='refresh' content='0;url=?page=category'>";

endif;
?>