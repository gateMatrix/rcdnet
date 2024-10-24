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
    </div>
    </section>

<?php
//Create new beneficiary
if (isset($_POST['newdonor'])){
    $ben = $_GET['id'];
    $newdona = $_POST['dname'];

    include "../includes/connection.php";

    $sql = "UPDATE beneficiary SET donor='$newdona', sponsored='Sponsored' WHERE benid=2";

    if(mysqli_query($con, $sql)){
        ?>
    <script type="text/javascript"> 
    alert("New donor successfully assigned"); 
    window.location.href = "album.php";
    </script>
    <?php

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p class='text-subtitle text-muted'>".""."</p>";
    }
    ?>


 <section class="section">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body"> 
                         <?php
                        include "../includes/connection.php";
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM beneficiary where benid='$id' "; 
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        echo "<h5 class='badge bg-success' style='text-align: center !important;'>"."Beneficiary"."</h5>";
                        echo "<div class='myavatar avatar-lg me-3'>"; 
                        echo "<img src='"."../photos"."/".$row['photo']."' class='card-img-top img-fluid student-img-profile'>";
                        echo "</div>";
                        if ($row['sponsored']=="Not Sponsored") {
                            // code...
                           echo "<div style='text-align: center; margin-top: 20px !important; color: #fff;' class=' bg-danger'>Not Sponsored</div>";
                        }elseif ($row['sponsored']=="Sponsored") {
                            // code...
                            echo "<div style='text-align: center; margin-top: 20px !important; color: #fff;' class=' bg-success'>Sponsored</div>";
                        }

                        echo "<ul style='margin-top: 15px !important;' class='list-group'>";
                                echo "<li class='list-group-item active'>".$row['name']."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Gender</div> "."<div class='headingvalue'>".$row['gender']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Date of birth</div> "."<div class='headingvalue'>".$row['dob']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Village</div> "."<div class='headingvalue'>".$row['village']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Religion</div> "."<div class='headingvalue'>".$row['religion']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Occupation</div> "."<div class='headingvalue'>".$row['occupation']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Marital Status</div> "."<div class='headingvalue'>".$row['marital']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Is student an Orphan?</div> "."<div class='headingvalue'>".$row['orphan']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Lost Parent</div> "."<div class='headingvalue'>".$row['deadparent']."</div></div>"."</li>";
                                
                        echo "</ul>";

                        // Free result set
                        mysqli_free_result($result);
                        ?>


                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                         <?php
                        include "../includes/connection.php";
                        $parentid = $_GET['parent'];
                        $sql = "SELECT * FROM parent where pid='$parentid' "; 
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        
                        echo "<h5 class='badge bg-primary' style='text-align: center !important;'>"."Parent"."</h5>";
                        echo "<div class='myavatar avatar-lg me-3'>"; 
                        echo "<img src='"."../photos"."/".$row['photo']."' class='card-img-top img-fluid student-img-profile'>";
                        echo "</div>";
                        echo "<ul style='margin-top: 15px !important;' class='list-group'>";
                                echo "<li class='list-group-item active'>".$row['name']."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Gender</div> "."<div class='headingvalue'>".$row['gender']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Date of birth</div> "."<div class='headingvalue'>".$row['dob']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Village</div> "."<div class='headingvalue'>".$row['village']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Religion</div> "."<div class='headingvalue'>".$row['religion']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Occupation</div> "."<div class='headingvalue'>".$row['occupation']."</div></div>"."</li>";
                                echo "<li class='list-group-item'>"."<div class='row'><div class='headingg'>Marital Status</div> "."<div class='headingvalue'>".$row['marital']."</div></div>"."</li>";
                                
                                
                        echo "</ul>";
                        // Free result set
                        mysqli_free_result($result);
                        ?>
 
                    </div>
                </div>
            </div>
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
