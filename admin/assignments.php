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
                <h3>Project Assignments</h3>
                <a href="assign-project.php" style="margin-bottom: 10px;" class="btn btn-success">Add New</a>
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

$sql = "SELECT * FROM projectassign INNER JOIN project ON projectassign.project=project.prID INNER JOIN users ON projectassign.manager=users.userID"; 
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-striped' id='table5'>";
            echo "<thead>";
             echo "<tr>";
                echo "<th>Project Name</th>";
                echo "<th>Project Manager</th>"; 
                echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . "
                               <a href='editpro.php?id=".$row['paID']."' class='badge bg-success'>Edit</a>
                               <a onclick='return DeleteConfirm()' href='deletepro.php?id=".$row['paID']."' class='badge bg-danger' >Trash</a>
                ". "</td>";
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

<script type="text/javascript">
    function DeleteConfirm() {
      return confirm("Are you sure to delete this project");
     }
 </script>
</html>
