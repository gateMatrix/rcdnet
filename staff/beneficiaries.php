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
                <h3>Beneficiaries</h3>
            </div>

        </div>
    </div>


    <section class="section"> 
        <div class="card">
            <div class="card-header">
                List Of Users
            </div>
            <div class="card-body">

<?php
include "../includes/connection.php";

$sql = "SELECT * FROM beneficiary INNER JOIN bencategory ON beneficiary.category=bencategory.bid"; 
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-striped' id='table1'>";
            echo "<thead>";
             echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Gender</th>";
                echo "<th>Category</th>"; 
                echo "<th>Occupation</th>";
                echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['bname'] . "</td>";
                echo "<td>" . $row['occupation'] . "</td>";
                echo "<td>" . "<a href='beneficiary.php?id=".$row['benid']."&parent=".$row['parent']."' class='badge bg-info'>View Details</a>
                               
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
</body>
<?php include "includes/scripts.php"; ?>
<script>
    function DeleteConfirm() {
      confirm("Are you sure to delete this beneficiary");
     }
 </script>
</html>
