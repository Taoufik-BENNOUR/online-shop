<style>
    .activePage{
    color: #dc3545!important;
}
</style>
<div class="col-3 col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 border-right">
                <a href="index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none ">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item w-100 ">
                        <a href="profile.php" class="nav-link text-white align-middle px-0 <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'activePage' : ''; ?>">
                            <i class="bi bi-house"></i> <span class="ms-1 d-none d-sm-inline">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="categories.php" class="nav-link text-white px-0 align-middle <?php echo basename($_SERVER['PHP_SELF']) == 'categories.php' ? 'activePage' : ''; ?>">
                            <i class="bi bi-box"></i> <span class="ms-1 d-none d-sm-inline">Categories</span></a>
                    </li>
                    <li>
                        <a href="products.php" class="nav-link px-0 align-middle text-white <?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'activePage' : ''; ?>">
                            <i class="bi bi-bag"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                    </li>
                    <li>
                        <a href="users.php" class="nav-link px-0 align-middle text-white <?php echo basename($_SERVER['PHP_SELF']) == 'users.php' ? 'activePage' : ''; ?>">
                            <i class="bi bi-people"></i> <span class="ms-1 d-none d-sm-inline">Users</span> </a>
                    </li>
                    <li>
                        <a href="stock.php" class="nav-link px-0 align-middle text-white <?php echo basename($_SERVER['PHP_SELF']) == 'stock.php' ? 'activePage' : ''; ?>">
                            <i class="bi bi-boxes"></i> <span class="ms-1 d-none d-sm-inline">Stock</span> </a>
                    </li>
                    <li>
                        <a href="orders.php" class="nav-link px-0 align-middle text-white <?php echo basename($_SERVER['PHP_SELF']) == 'orders.php' ? 'activePage' : ''; ?>">
                            <i class="bi bi-cart"></i> <span class="ms-1 d-none d-sm-inline">Orders</span> </a>
                    </li>
                    <li>
                        <a href="stats.php" class="nav-link px-0 align-middle text-white <?php echo basename($_SERVER['PHP_SELF']) == 'stats.php' ? 'activePage' : ''; ?>">
                            <i class="bi bi-bar-chart"></i> <span class="ms-1 d-none d-sm-inline">Stats</span> </a>
                    </li>
                </ul>
         </div>
</div>