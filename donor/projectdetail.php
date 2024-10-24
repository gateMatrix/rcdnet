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
            
<div class="page-content">
    <section class="row">
            <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">

            </div>
 
        </div>
    </div>

       <!-- Hoverable rows start -->
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <br>
                        <!-- table hover -->
                        <div class="table-responsive" style="padding-right: 20px; padding-left: 20px;">
                            
                             <?php
                        include "../includes/connection.php";
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM project INNER JOIN users ON project.donor=users.userID where prID='$id' "; 
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        echo "<h5>".$row['name']."</h5>";
                        
                        echo "<div class='row'>
                              <div class='col-md-6'>
                                <ul style='margin-top: 15px !important;' class='list-group'>
                                    <li class='list-group-item'>"."<div class='row'><div class='headingg'>Fund Souce</div> "."<div class='headingvalue'>".$row['fundsource']."</div></div>"."</li>
                                    <li class='list-group-item'>"."<div class='row'><div class='headingg'>Donor(s)</div> "."<div class='headingvalue'>".$row['fullname']."</div></div>"."</li>
                                    <li class='list-group-item'>"."<div class='row'><div class='headingg'>Target Group</div> "."<div class='headingvalue'>".$row['targetgroup']."</div></div>"."</li>
                                    
                                </ul>
                              </div>

                              <div class='col-md-6'>
                                <ul style='margin-top: 15px !important;' class='list-group'>
                                    <li class='list-group-item'>"."<div class='row'><div class='headingg'>Start Date</div> "."<div class='headingvalue'>".$row['startdate']."</div></div>"."</li>
                                    <li class='list-group-item'>"."<div class='row'><div class='headingg'>End Date</div> "."<div class='headingvalue'>".$row['stopdate']."</div></div>"."</li>
                                    <li class='list-group-item'>"."<div class='row'><div class='headingg'>Budget</div> "."<div class='headingvalue'>".$row['budget']."</div></div>"."</li>
                                    
                                </ul>
                              </div>
                        </div>";
                        echo "<div class='divider divider-left'>
                            <h5 class='divider-text'>Description</h5>
                        </div>";

                        echo "<p>".$row['description']."</p>";

                        // Free result set
                        mysqli_free_result($result);
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
    <!-- Hoverable rows end -->
</div>
    </section>
</div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>Created by <a href="http://julybrands.co.ug">JulyBrands Digital</a></p>
            </div>
        </div>
    </footer>
</div>
    </div>
<?php include "includes/scripts.php"; ?>
</body>
<script>
    // Simple Datatable
    let table5 = document.querySelector('#table5');
    let dataTable = new simpleDatatables.DataTable(table5);
</script>
</html>
