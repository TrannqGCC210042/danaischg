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
            <h1 class="text-center">OrderDetail List</h1>

            <table id="tablecategory" class="table table-striped table-bordered m-0" cellspacing="0" width="100%">
                <thead class="justify-content-md-between justify-content-sm-center align-content-center border-bottom border-2 my-2 bg-dark text-light p-3 rounded-3">
                    <tr class="text-center">
                        <th>
                            <strong>Order ID</strong>
                        </th>
                        <th>
                            <strong>Product ID</strong>
                        </th>
                        <th>
                            <strong>Product Quantity</strong>
                        </th>
                    </tr>
                </thead>

                <tbody class="justify-content-md-between justify-content-sm-center border-bottom border-2 my-2 bg-light p-2 rounded-3">
                    <?php
                    if (isset($_GET['id'])) :
                        $orderid = $_GET['id'];
                        $c = new Connect();
                        $dblink = $c->connectToPDO();

                        $sql = "SELECT * FROM `orderDetail` od JOIN `product` p ON od.pro_id = p.id WHERE order_id = ?";
                        $re = $dblink->prepare($sql);
                        $re->execute([$orderid]);
                        $rows = $re->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($rows as $row) :
                    ?>
                            <tr>
                                <td class="text-center align-middle"><?= $row['order_id'] ?></a></td>
                                <td class="text-center align-middle"><img src="images/<?= $row['image'] ?>" alt="<?= $row['name'] ?>" height="100" width="70"></td>
                                <td class="align-middle text-center"><?= $row['quantity'] ?></td>
                            </tr>
                    <?php
                        endforeach;
                    endif;
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

    $sql = "DELETE FROM `category` WHERE id = ?";
    $result = $dblink->prepare($sql);
    $result->execute(array("$id"));

endif;
?>