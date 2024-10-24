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
                <h3>Edit Beneficiary</h3>
            </div>

        </div>
    </div>
<?php
//Create new beneficiary
if (isset($_POST['post'])){
    $category = $_POST['category'];
    $name = $_POST['name'];
    $nin = $_POST['nin'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $marital = $_POST['marital'];
    $disability = $_POST['disability'];
    $religion = $_POST['religion'];
    $occupation = $_POST['occupation'];
    $parent = $_POST['parent'];
    $village = $_POST['village'];
    $subcounty = $_POST['subcounty'];
    $district = $_POST['district'];
    $orphan = $_POST['orphan'];
    $deadparent = $_POST['deadparent'];
    $benid = $_GET['id'];

    include "../includes/connection.php";

    $sql = "UPDATE beneficiary SET category='$category', name='$name', nin='$nin', dob='$dob', gender='$gender', marital='$marital', disability='$disability', religion='$religion', occupation='$occupation', parent='$parent', village='$village', subcounty='$subcounty', district='$district', orphan='$orphan', deadparent='$deadparent' WHERE benid='$benid' ";

    if(mysqli_query($con, $sql)){
        ?>
    <script type="text/javascript"> 
    alert("Beneficiary successfully edited"); 
    window.location.href = "beneficiaries.php";
    </script>
    <?php

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p class='text-subtitle text-muted'>"."Use this form to add a new beneficiary"."</p>";
    }
    ?>

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">


                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Beneficiary Particulars</p>
                                <?php 
                                        $id = $_GET['id'];
                                        include "../includes/connection.php";
                                        $sql = "SELECT * FROM beneficiary INNER JOIN bencategory ON beneficiary.category=bencategory.bid WHERE benid='$id' ";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($result);
                                        ?>
                                <div class="form-group">
                                    <label for="basicInput">Cetgory</label>
                                    <select class="form-control" name="category" id="basicInput">
                                        <?php echo '<option value='.$row['bid'].'>' . $row['name'] . '</option>';?>
                                        <?php
                                        include "../includes/connection.php";
                                        $sql = "SELECT * FROM bencategory";
                                        if($result = mysqli_query($con, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo '<option value='.$row['bid'].'>' . $row['bname'] . '</option>';
                                                }
                                                mysqli_free_result($result);
                                            } else{
                                                echo "No records found.";
                                            }
                                        }
                                        ?>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php
                                        $id = $_GET['id'];
                                        include "../includes/connection.php";
                                        $sql = "SELECT * FROM beneficiary WHERE benid='$id' ";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($result);
                                        ?>
                                <label for="basicInput">Full Name</label>
                                <input type="text" value="<?php echo  $row['name'];?>" name="name" class="form-control"  placeholder="Enter full name">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">NIN</label>
                                <input type="text" value="<?php echo $row['nin'];?>" class="form-control" id="basicInput" name="nin">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Date Of Birth</label>
                                <input type="text" value="<?php echo $row['dob'];?>"  class="form-control" id="basicInput" name="dob">
                                </div>
                                
                                <div class="form-group">
                                    <label for="basicInput">Gender</label>
                                    <select class="form-control" name="gender" required id="basicInput">
                                        <option><?php echo $row['gender'];?></option>
                                        <option>Female</option>
                                        <option>Male</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Marital Status</label>
                                    <select class="form-control" name="marital" required id="basicInput">
                                        <option><?php echo $row['marital'];?></option>
                                        <option>Married</option>
                                        <option>Single</option>
                                        <option>Divorced</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Disability</label>
                                <input type="text" value="<?php echo $row['disability'];?>"  class="form-control" id="basicInput" name="disability" placeholder="Name disability">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Religion</label>
                                <input type="text" value="<?php echo $row['religion'];?>"  class="form-control" id="basicInput" name="religion" placeholder="Religion">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Occupation/Course</label>
                                    <select class="form-control" name="occupation" id="basicInput">
                                        <option><?php echo $row['occupation'];?></option>
                                        <?php
                                        include "../includes/connection.php";
                                        $sql = "SELECT * FROM occupation";
                                        if($result = mysqli_query($con, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo "<option>" . $row['name'] . "</option>";
                                                }
                                                mysqli_free_result($result);
                                            } else{
                                                echo "No records found.";
                                            }
                                        }
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <p>Parent's/Guardian's Particulars</p>
                                <?php 
                                        $id = $_GET['id'];
                                        include "../includes/connection.php";
                                        $sql = "SELECT * FROM beneficiary INNER JOIN parent ON beneficiary.parent=parent.pid WHERE benid='$id' ";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($result);
                                        ?>
                                <div class="form-group">
                                    <label for="basicInput">Parent/Guardian's Name</label>
                                    <select class="form-control" name="parent" id="basicInput">
                                        <?php echo '<option value='.$row['pid'].'>' . $row['name'] . '</option>';?>
                                        <?php
                                        include "../includes/connection.php";
                                        $sql = "SELECT * FROM parent";
                                        if($result = mysqli_query($con, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo '<option value='.$row['pid'].'>' . $row['name'] . '</option>';
                                                }
                                                mysqli_free_result($result);
                                            } else{
                                                echo "No records found.";
                                            }
                                        }
                                        ?>
                                        
                                    </select>
                                </div>

                                 <?php
                                        $id = $_GET['id'];
                                        include "../includes/connection.php";
                                        $sql = "SELECT * FROM beneficiary WHERE benid='$id' ";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($result);
                                        ?>
                                <div class="form-group">
                                <label for="basicInput">Village/Cell</label>
                                <input type="text" value="<?php echo $row['village'];?>" class="form-control" id="basicInput" name="village" placeholder="Enter Village">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Sub County/Division</label>
                                <input type="text" value="<?php echo $row['subcounty'];?>" class="form-control" id="basicInput" name="subcounty" placeholder="Sub County">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">District</label>
                                <input type="text" value="<?php echo $row['district'];?>" class="form-control" id="basicInput" name="district" placeholder="District">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Is beneficiary an orphan?</label>
                                    <select class="form-control" name="orphan" id="basicInput">
                                        <option><?php echo $row['orphan'];?></option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Select lost parent</label>
                                    <select class="form-control" name="deadparent" id="basicInput">
                                        <option><?php echo $row['deadparent'];?></option>
                                        <option>Mother</option>
                                        <option>Father</option>
                                        <option>Both</option>
                                        <option>None</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        

                        <input type="submit" class="btn btn-primary" name="post" value="Update Now">
                    </form>
                    </div> 
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

</html>
