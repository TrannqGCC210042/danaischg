<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

    .font-family {
        font-family: 'Roboto', sans-serif;
    }

    a.list-group-item {
        background-color: rgb(180, 180, 180);
    }

    a.list-group-item:hover {
        background-color: black
    }
</style>
<div class="col-lg-2 col-md-3 content-left pe-0">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu"><span class="navbar-toggler-icon"></span></button>

        <!-- Brand -->
        <a class="font-family nav-link px-0" href="/manage">
            <h3 class="fw-bold">Administration</h3>
        </a>
    </nav>
    <!-- Navbar -->
    <nav id="sidebarMenu" class="collapse d-md-block">
        <div class="position-sticky">
            <div class="font-family list-group list-group-flush">
                <a href="?page=order" class="list-group-item list-group-item-action py-4 text-light">Order
                    management</a>
                <a href="?page=category" class="list-group-item list-group-item-action py-4 text-light">Category
                    management</a>
                <a href="?page=supplier" class="list-group-item list-group-item-action py-4 text-light">Supplier
                    management</a>
                <a href="?page=productManagement" class="list-group-item list-group-item-action py-4 text-light">Product
                    management</a>
            </div>
        </div>
    </nav>
</div>