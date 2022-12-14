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
                                <strong>Product Name</strong>
                            </th>
                            <th>
                                <strong>Images</strong>
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

                        $sql = "SELECT * FROM `product_images` pi JOIN `product` p ON pi.pro_id = p.id";
                        $re = $dblink->query($sql);

                        while ($row = $re->fetch_assoc()) :
                        ?>
                            <tr>
                                <td class="text-center align-middle"><?= $row['name'] ?></td>
                                <td class="text-center align-middle"><img src="images/<?=$row['file_name']?>" alt=""></td>
                                <td class="text-center align-middle">
                                    <a href="?page=updateproduct&cat_id=<?= $row['id'] ?>"><i class="bi bi-pen-fill" style="color: black;"></i></a>
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
            </div>
        </div>
    </section>
    <?php
    if (isset($_GET['id'])) :
        $id = $_GET['id'];

        $c = new Connect();
        $dblink = $c->connectToPDO();

        $sql = "DELETE FROM `product` WHERE id = ?";
        $result = $dblink->prepare($sql);
        $result->execute(array("$id"));

        echo "<meta http-equiv='refresh' content='0;url=?page=productManagement'>";

    endif;
    ?>