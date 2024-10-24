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
            <h3>Students</h3>
            <a href="students.php" style="margin-bottom: 10px;" class="btn btn-success">All Students</a><a href="album.php" style="margin-bottom: 10px; margin-left: 10px;" class="btn btn-success">Students Album</a>
        </div>

        </div>
    </div>


    <section class="section">
        <div class="row">
          
                        <?php
include "../includes/connection.php";

$sql = "SELECT * FROM beneficiary"; 
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            echo "<div class='col-xl-4 col-md-4 col-sm-6'>";
                echo "<div class='card' style='padding: 28px;'>";
                echo "<div class='card-content'>";
                echo "<div class='avatar avatar-lg me-3'>"; 
                echo "<img src='"."../photos"."/".$row['photo']."' class='card-img-top img-fluid student-img'>";
                echo "</div>";
                echo "<div class='avatar avatar-lg me-3' style='margin-right: 0rem!important; margin-left: -40px; border-style: solid; border-width: 5px; border-color: #fff;'>"; 
                echo "<img src='"."../photos/avatar.jpeg"."' class='card-img-top img-fluid student-img'>";
                echo "</div>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title student-name'>".$row['name']."</h5>";
             if ($row['sponsored']=="Not Sponsored") {
                            // code...
                           echo "<div style='text-align: center; margin-top: 20px !important; color: #fff;' class=' bg-danger'>Not Sponsored</div>";
                        }elseif ($row['sponsored']=="Sponsored") {
                            // code...
                            echo "<div style='text-align: center; margin-top: 20px !important; color: #fff;' class=' bg-info'>Sponsored</div>";
                        }
        /*    echo "<p class='card-text'>"."
                                Chocolate sesame snaps apple pie danish cupcake sweet roll jujubes tiramisu.Gummies
                                bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll.".
                            "</p>";*/
                    echo"</div>"; 
                    echo"</div>";
                    echo "<a href='studentprofile.php?id=".$row['benid']."&donor=".$row['donor']."' class='btn btn-success mybtn'>View Profile</a>";
                    echo"</div>";
            echo"</div>";
        
        }
        echo"</div>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
                        
                            
                       
                




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

</html>
