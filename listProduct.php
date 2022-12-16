<div class="col-md-6 col-lg-4 col-xl-3 mb-4">
    <div class="product-grid">
        <div class="product-image">
            <a href="#" class="image">
                <img src="images/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['name'] ?>" />
            </a>
            <ul class="product-links">
                <li><a href="#"><i class="fa fa-search"></i></a></li>
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-random"></i></a></li>
            </ul>
            <a href="detail.php?id_pro=<?= $row['id'] ?>" class="add-to-cart fw-bold">Add to Cart</a>
        </div>
        <div class="product-content">
            <h3 class="title"><a href="#"><?= $row['name'] ?></a></h3>
            <div class="price">$<?= $row['price'] ?></div>
        </div>
    </div>
</div>