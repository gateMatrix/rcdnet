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
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card" style="background: #9694ff;">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4" >
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldBookmark" style="font-size: 3em;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8" >
                                    <h6 class="text font-semibold">Projects</h6>
                                    <h6 class="font-extrabold mb-0">
                                    <?php
                                        $sql = "SELECT COUNT(*) as totalp FROM project"; 
                                        $result = mysqli_query($con, $sql);
                                        $data=mysqli_fetch_assoc($result);
                                        echo $data['totalp'];
                                    ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card" style="background: #57caeb;">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile" style="font-size: 3em;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text font-semibold">Members</h6>
                                    <h6 class="font-extrabold mb-0">
                                            <?php
                                            $sql = "SELECT COUNT(*) as totalstaff FROM users WHERE role!='donor' "; 
                                            $result = mysqli_query($con, $sql);
                                            $data=mysqli_fetch_assoc($result);
                                            echo $data['totalstaff'];
                                            ?>

                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card" style="background: #5ddab4;">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="fa-solid fa-user"></i>
                                        <i class="iconly-boldProfile" style="font-size: 3em;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text font-semibold">Donors</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?php
                                            $sql = "SELECT COUNT(*) as totalstaff FROM users WHERE role='donor' "; 
                                            $result = mysqli_query($con, $sql);
                                            $data=mysqli_fetch_assoc($result);
                                            echo $data['totalstaff'];
                                            ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card" style="background: #ff7976;">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldProfile" style="font-size: 3em;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text font-semibold">Beneficiaries</h6>
                                    <h6 class="font-extrabold mb-0">
                                         <?php
                                            $sql = "SELECT COUNT(*) as totalben FROM beneficiary "; 
                                            $result = mysqli_query($con, $sql);
                                            $data=mysqli_fetch_assoc($result);
                                            echo $data['totalben'];
                                            ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Post</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="../assets/images/faces/2.jpg">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">Congratulations on your graduation!</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="../assets/images/faces/2.jpg">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">Congratulations on your graduation!</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div> 

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; RCDNET</p>
                    </div>
                    <div class="float-end">
                        <p>Created by <a href="http://julybrands.co.ug">JulyBrands Digital</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
<?php include "includes/scripts.php"; ?>
</body>

</html>
