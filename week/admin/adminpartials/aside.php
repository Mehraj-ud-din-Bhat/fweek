    <?php
    require_once('controllers/AdminController.php');
    $admin=new AdminManager();
    
    ?>
    
    
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
          
            <!-- search form -->
            
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header"></li>
                <li>
                    <a href="addscientist.php">
                        <i class="fa fa-th"></i> <span>HOME</span>

                    </a>
                </li>
                <li>
                    <a href="addscientist.php">
                    <i class="fa fa-plus-circle"></i> <span>Add Scientist</span>

                    </a>
                </li>
                <li>
                    <a href="viewall.php">
                    <i class="fa fa-list-alt"></i><span>View Scientists</span>

                    </a>
                </li>

                <li >
                    <a href="logout.php">
                    <i class="fa fa-user"></i><span>Logout</span>

                    </a>
                </li>

               

        </section>
        <!-- /.sidebar -->
    </aside>

    <script>


    </script>