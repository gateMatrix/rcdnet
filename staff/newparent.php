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
                <h3>New Parent</h3>
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
    $village = $_POST['village'];
    $subcounty = $_POST['subcounty'];
    $photo = $_POST['photo'];


    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../photos/" . $filename;




    include "../includes/connection.php";

    $sql = "INSERT INTO parent (name, nin, dob, village, religion, gender, marital, subcounty, disability, occupation, photo)
    VALUES ('$name', '$nin', '$dob', '$village', '$religion', '$gender', '$marital', '$subcounty', '$disability', '$occupation', '$filename')";

    if(mysqli_query($con, $sql) and move_uploaded_file($tempname, $folder)){
        ?>
<script type="text/javascript"> 
alert("Parent successfully created"); 
window.location.href = "parent.php";
</script>
<?php

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);

}else{
   echo "<p class='text-subtitle text-muted'>"."Use this form to add a new parent"."</p>";

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
                                <div class="form-group">
                                <label for="basicInput">Full Name</label>
                                <input type="text" class="form-control" id="basicInput" name="name" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">NIN</label>
                                <input type="text" class="form-control" id="basicInput" name="nin" placeholder="Enter NIN">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Date Of Birth</label>
                                <input type="date" class="form-control" id="basicInput" name="dob" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Village</label>
                                <input type="text" class="form-control" id="basicInput" name="village" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Religion</label>
                                <input type="text" class="form-control" id="basicInput" name="religion" placeholder="Father">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Occupation</label>
                                <input type="text" class="form-control" id="basicInput" name="occupation" placeholder="Father">
                                </div>
                                
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">Gender</label>
                                    <select class="form-control" name="gender" id="basicInput">
                                        <option>Select Gender</option>
                                        <option>Female</option>
                                        <option>Male</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Marital Status</label>
                                    <select class="form-control" name="marital" id="basicInput">
                                        <option>Select Status</option>
                                        <option>Married</option>
                                        <option>Single</option>
                                        <option>Divorced</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Sub County</label>
                                <input type="text" class="form-control" id="basicInput" name="subcounty" placeholder="Sub County">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Disability</label>
                                <input type="text" class="form-control" id="basicInput" name="disability" placeholder="Name disability">
                                </div>
                                <div class="form-group">
                                <label for="basicInput">Parent's Photo</label>
                                <input type="file" class="form-control" id="basicInput" name="uploadfile" placeholder="Father">
                                </div>
                            </div>
                        </div>
                        

                        <input type="submit" class="btn btn-primary" name="post" value="Submit Now">
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
