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
    $note = $_POST['note'];
    $donor =  $_SESSION['userid'];

    include "../includes/connection.php";

    $sql = "UPDATE beneficiary SET donornote='$note', interest='YES', donor = '$donor' WHERE benid='$ben' ";

    if(mysqli_query($con, $sql)){
        ?>
    <script type="text/javascript"> 
    alert("Interest successfully submitted."); 
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
                        $status = $row['sponsored'];
                        echo "<h5 class='card-title' style='text-align: center;'>".$row['name']."</h5>";
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
                        echo "<div class='table-responsive'>";
                                echo "<table class='table table-striped mb-0'>";
                                 echo "<thead>";
                                     echo "<tr>";
                                         echo "<th></th>";
                                         echo "<th></th>";
                                     echo "</tr>";
                                 echo "</thead>";
                                    echo "<tbody>";
                                        echo "<tr>";
                                            echo "<td class='text-bold-500'>"."<strong>"."Date of birth"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['dob']."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                             echo "<td class='text-bold-500'>"."<strong>"."Gender"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['gender']."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                             echo "<td class='text-bold-500'>"."<strong>"."Marital Status"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['marital']."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                             echo "<td class='text-bold-500'>"."<strong>"."Disability"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['disability']."</td>";
                                        echo "</tr>";


                                        echo "<tr>";
                                             echo "<td class='text-bold-500'>"."<strong>"."Religion"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['religion']."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                             echo "<td class='text-bold-500'>"."<strong>"."Village"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['village']."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                             echo "<td class='text-bold-500'>"."<strong>"."Is student an Orphan?"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['orphan']."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                             echo "<td class='text-bold-500'>"."<strong>"."Lost Parent"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['deadparent']."</td>";
                                        echo "</tr>";
                                    echo "</tbody>";
                                echo "</table>";
                            echo "</div>";
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
                        $donorid = $_GET['donor'];
                        $sql = "SELECT * FROM users where userID='$donorid' "; 
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        echo "<h5 class='card-title' style='text-align: center;'>".$row['fullname']."</h5>";
                        echo "<div class='myavatar avatar-lg me-3'>"; 
                        echo "<img src='"."../photos"."/".$row['photo']."' class='card-img-top img-fluid student-img-profile'>";
                        echo "</div>";
                        
                        echo "<div class='table-responsive'>";
                                echo "<table class='table table-striped mb-0'>";
                                 echo "<thead>";
                                     echo "<tr>";
                                         echo "<th></th>";
                                         echo "<th></th>";
                                     echo "</tr>";
                                 echo "</thead>";
                                    echo "<tbody>";
                                        echo "<tr>";
                                            echo "<td class='text-bold-500'>"."<strong>"."Email Address"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['email']."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                             echo "<td class='text-bold-500'>"."<strong>"."Phone Number"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['phone']."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                             echo "<td class='text-bold-500'>"."<strong>"."Address"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['Address']."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                             echo "<td class='text-bold-500'>"."<strong>"."Nationality"."</strong>"."</td>";
                                            echo "<td class='text-bold-500'>".$row['Nationality']."</td>";
                                        echo "</tr>";

                                    echo "</tbody>";
                                echo "</table>";
                            echo "</div>";
                        // Free result set
                        mysqli_free_result($result);
                        ?>
                        <?php 
                       include "../includes/connection.php";
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM beneficiary where benid='$id' "; 
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $status = $row['sponsored'];

                        if ($row['sponsored']=="Not Sponsored") {
                            // code...
                           echo "<div style='text-align: center; margin-top: 20px !important; color: #fff;' class=' bg-danger'>Not Sponsored</div>";
                        }elseif ($row['sponsored']=="Sponsored") {
                            // code...
                            echo "";
                        }
                         ?>
                        <hr>
                          <form class="greyform" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="basicInput">Interested in supporting this student? Write your interest note below.</label>
                                    <textarea class="form-control" name="note" id="basicInput">
                                        
                                    </textarea>
                                   
                                </div>
                        <input type="submit" class="btn btn-primary" name="newdonor" value="Submit Interest">
                    </form>
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
