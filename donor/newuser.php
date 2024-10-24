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
                <h3>New User</h3>

                <?php 
//Create new user
if (isset($_POST['post'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $nationality = $_POST['nationality'];
    $key   = $_POST['password'];
    $role   = $_POST['role'];
    $member  = $_POST['username'];
    $fullname = $fname." ".$lname;


    include "../includes/connection.php";

    $sql = "INSERT INTO users (username, password, fullname, email, phone, Address, Nationality, role)
    VALUES ('$member', '$key', '$fullname', '$email', '$phone', '$address', '$nationality', '$role' )";

    if(mysqli_query($con, $sql)){
        ?>
<script type="text/javascript"> 
alert("User successfully created"); 
window.location.href = "users.php";
</script>
<?php

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);

}

?>
                
            </div>

        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">

                            <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">

                            <input type="email" class="form-control" name="email" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nationality" placeholder="Enter Nationality">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Assign Username">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Assign Password">
                        </div>

                        <div class="form-group">
 
                            <select class="form-control" name="role">
                                <option>Select User ROle</option>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                                <option value="donor">Donor</option>
                            </select>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" name="post" value="Add User">
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
