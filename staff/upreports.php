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
                <h3>Report Documents</h3>
                
            </div>
            <div class="col-12 col-md-6 order-md-1 order-last">
                <a style="float: right;" href="uploadreport.php" style="margin-bottom: 10px;" class="btn btn-success">Upload New Report</a>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="card">
            <div class="card-header">
                List Of Uploads
            </div>
            <div class="card-body">

<?php
include "../includes/connection.php";
$userid = $_SESSION['userid'];

$sql = "SELECT * FROM reportdoc INNER JOIN users ON reportdoc.user=users.userID WHERE user='$userid' "; 
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-striped' id='table5'>";
            echo "<thead>";
             echo "<tr>";
                echo "<th></th>";
                echo "<th>Date</th>";
                echo "<th>Name</th>";
                echo "<th>Type</th>";
                echo "<th>Status</th>";  
            echo "</tr>";
            echo "</thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo '<td><i style="font-size: 1.4em;" class="bi bi-file-earmark-text"></i></td>';
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . "<a style='margin-right: 10px;' href='#' class='badge bg-info'>". $row['status'] ."</a><a target='_blank' href='../docs/".$row['doc']."' class='badge bg-success'>Download</a>";
            echo "</tr>";
        } 
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>

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
