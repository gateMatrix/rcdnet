<?php include "includes/head.php"; ?>

    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="../assets/images/logo/rcdnetlogo.png" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>


    <?php 
    include "includes/sidebarmenu.php";
    ?>


    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">

    <section class="row">
        <div class="col-12 col-lg-12">

 

            <div class="row">
                <div class="col-6 col-lg-4 col-md-6 col-sm-6">
                    <a href="tempreps.php"><div class="card" style="background: #9694ff; padding-top: 20px; padding-bottom: 20px;">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div style="text-align: center;">
                                <i class="bi bi-folder-fill" style="font-size: 4em; color: #fff;"></i></div>
                                <br>
                                <h5 style="text-align: center; font-size: 1em;">Written Reports
                                </h5>
                            </div> 
                        </div>
                    </div></a>
                </div>
                <div class="col-6 col-lg-4 col-md-6 col-sm-6">
                    <a href="upreps.php"><div class="card" style="background: #57caeb;  padding-top: 20px; padding-bottom: 20px;">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div style="text-align: center;">
                                <i class="bi bi-folder-fill" style="font-size: 4em; color: #fff;"></i></div>
                                <br>
                                <h5 style="text-align: center; font-size: 1em;">Uploaded Reports
                                </h5>
                            </div>
                        </div>
                    </div></a>
                </div>

            </div>





        </div>
    </section>
</div> 

            <footer>
            </footer>
        </div>
    </div>
<?php include "includes/scripts.php"; ?>
</body>

</html>
