<?php

$session = session();

?>

<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4"
    style="background:url('<?= base_url('static/admin/'); ?>dist/img/sidepanel.jpg'); background-size: cover; ">

    <!-- Brand Logo -->

    <a href="index3.html" class="brand-link">

        <img src="<?= base_url(); ?>static/admin/dist/img/logo.png" alt="AdminLTE Logo" class=" img-circle"
            height="45px">

        <span class="brand-text text-white">Cafe Management</span>

    </a>



    <!-- Sidebar -->

    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">

                <img src="<?= base_url(); ?>static/admin/dist/img/user.jpg" alt="User">

            </div>

            <div class="info">

                <a href="#" class="d-block text-white">

                    <?= $session->get('fullname'); ?>

                </a>

            </div>

        </div>



        <!-- SidebarSearch Form -->

        <div class="form-inline">

            <div class="input-group" data-widget="sidebar-search">

                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">

                <div class="input-group-append">

                    <button class="btn btn-sidebar">

                        <i class="fas fa-search fa-fw"></i>

                    </button>

                </div>

            </div>

        </div>



        <!-- Sidebar Menu -->

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->





                <li class="nav-item">

                    <a href="<?= base_urL('dashboard'); ?>" class="nav-link">

                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p class="text-white">

                            Dashboard

                        </p>

                    </a>

                </li>



                <li class="nav-item">

                    <a href="<?= base_urL('restaurent'); ?>" class="nav-link">

                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p class="text-white">

                            Restaurents

                        </p>

                    </a>

                </li>



                <li class="nav-item">

                    <a href="<?= base_urL('franchise'); ?>" class="nav-link">

                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p class="text-white">

                            Franchise

                        </p>

                    </a>

                </li>



                <li class="nav-item">

                    <a href="<?= base_urL('tables'); ?>" class="nav-link">

                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p class="text-white">

                            Tables

                        </p>

                    </a>

                </li>





                <li class="nav-header">LABELS</li>

                <li class="nav-item">

                    <a href="<?= base_url('logout'); ?>" class="nav-link">

                        <i class="nav-icon far fa-circle text-danger"></i>

                        <p class="text-white">logout</p>

                    </a>

                </li>

            </ul>

        </nav>

        <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

</aside>