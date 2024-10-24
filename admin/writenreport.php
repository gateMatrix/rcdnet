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

    <section class="section">  
        <div class="card">
            <div class="card-body">
                <div class="report-wrapper">
                    <h3 style="text-align: center; margin-top: 20px; font-size: 2em;">Rwenzori Community Development<br> Network</h3>
                    <?php
                    
                    $reportid  = $_GET['id'];
 
                    $sql = "SELECT * FROM writtenrep WHERE repID = '$reportid' "; 
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);  
                    echo '<p class="protitle"> Activity Report </p>';
                    echo '<p style="text-align: center;">'.$row['month'].' '.$row['year'].' </p>';

                    echo "<div class='actionpoints'>"."<p style='font-weight: 600; text-decoration: underline;'>". $row['reportNote']."</div>";
                    echo "<p> Prepared By Mugisha </p>";
                    ?>
                </div>
            </div>
        </div>

    </section>
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
<script>
    function DeleteConfirm() {
      return confirm("Are you sure to delete this beneficiary");
     }
 </script>
</html>
