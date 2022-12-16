<style>
    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .page-link {
        position: relative;
        display: block;
        color: #17a2b8 !important;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #17a2b8 !important;
    }

    .page-link:hover {
        z-index: 2;
        color: #fff !important;
        background-color: #17a2b8;
        border-color: #024dbc;
    }

    .page-link:focus {
        z-index: 3;
        outline: 0;
        box-shadow: none;
    }

    .active {
        background-color: #17a2b8;
        color: #fff !important;
    }
</style>

<div class="container-fluid">
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
                <h1 class="text-center">Product List</h1>
                <div class="text-center mb-2 row">
                    <div class="col-6 d-flex justify-content-start align-items-center">
                        <a href="?page=addProduct" class="btn btn-outline-dark"><i class="bi bi-plus-circle pe-2"></i>Add</a>
                    </div>
                </div>
                <table id="tableproduct" class="table table-striped table-bordered m-0" cellspacing="0" width="100%">
                    <thead class="justify-content-md-between justify-content-sm-center align-content-center border-bottom border-2 my-2 bg-dark text-light p-3 rounded-3">
                        <tr class="text-center">
                            <th>
                                <strong>ID</strong>
                            </th>
                            <th>
                                <strong>Product Name</strong>
                            </th>
                            <th>
                                <strong>Status</strong>
                            </th>
                            <th>
                                <strong>Images</strong>
                            </th>
                            <th>
                                <strong>Description</strong>
                            </th>
                            <th>
                                <strong>Price</strong>
                            </th>
                            <th>
                                <strong>Quantity</strong>
                            </th>
                            <th>
                                <strong>Gender</strong>
                            </th>
                            <th>
                                <strong>Category</strong>
                            </th>
                            <th>
                                <strong>Supplier</strong>
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

                        $sql = "SELECT * FROM `product` p;";
                        $re = $dblink->query($sql);

                        while ($row = $re->fetch_assoc()) :
                        ?>
                            <tr>
                                <td class="text-center align-middle"><?= $row['id'] ?></td>
                                <td class="text-center align-middle"><?= $row['name'] ?></td>
                                <td class="text-center align-middle"><?= $row['status'] ?></td>
                                <td class="text-center align-middle"><img src="images/<?= $row['image'] ?>" alt="<?= $row['name'] ?>" height="100" width="70"></td>
                                <td class="text-center align-middle"><?= $row['description'] ?></td>
                                <td class="text-center align-middle"><?= $row['price'] ?></td>
                                <td class="text-center align-middle"><?= $row['quantity'] ?></td>
                                <td class="text-center align-middle"><?= $row['for_gender'] ?></td>
                                <td class="text-center align-middle"><?= $row['cate_id'] ?></td>
                                <td class="text-center align-middle"><?= $row['sup_id'] ?></td>
                                <td class="text-center align-middle">
                                    <a href="?page=updateProduct&id=<?= $row['id'] ?>"><i class="bi bi-pen-fill" style="color: black;"></i></a>
                                </td>
                                <td class="text-center align-middle">
                                    <a href="?page=productManagement&id=<?= $row['id'] ?>" onclick="return deleteConfirm()"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
                <!-- <div class="wrapper mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link active" href="/manage/product?page=1">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="/manage/product?page=2">2</a></li>
                            <li class="page-item"><a class="page-link" href="/manage/product?page=3">3</a></li>
                            <li class="page-item"><a class="page-link" href="/manage/product?page=2">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div> -->
            </div>
        </div>
    </section>
    <?php
    if (isset($_GET['id'])) :
        $id = $_GET['id'];

        $c = new Connect();
        $dblink = $c->connectToPDO();

        $sql = "SELECT `image` FROM `product` WHERE id = ?";
        $result = $dblink->prepare($sql);
        $result->execute(array("$id"));
        $rows = $result->fetch(PDO::FETCH_BOTH);

        $img = $rows['image'];
        echo $img;
        unlink("images/" . $img);

        $sql = "DELETE FROM `product` WHERE id = ?";
        $result = $dblink->prepare($sql);
        $result->execute(array("$id"));

        header("Location: ?page=productManagement");
    endif;
    ?>