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
                <h3>New Beneficiary Category</h3>
            </div>

        </div>
    </div>
<?php
//Create new beneficiary category
if (isset($_POST['post'])){ 
    $name = $_POST['name'];
    $description = $_POST['description'];

    include "../includes/connection.php";

    $sql = "UPDATE bencategory SET bname='$name', description='$description'";

    if(mysqli_query($con, $sql)){
        ?>
<script type="text/javascript"> 
alert("Your category has been successfully updated	"); 
window.location.href = "bencategory.php";
</script>
<?php

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    // Close connection
    mysqli_close($con);

}else{
   echo "<p class='text-subtitle text-muted'>"."Use this form to a new beneficiary category."."</p>";
}

?>
    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <form method="POST" >
                    	<?php
                        $id = $_GET['id'];
                        include "../includes/connection.php";
                        $sql = "SELECT * FROM bencategory WHERE bid='$id' ";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        ?>
                        <div class="form-group">
                            <label for="basicInput">Category Name</label>
                            <input type="text" value="<?php echo  $row['bname'];?>" name="name" class="form-control" id="basicInput" placeholder="Enter Category">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="6"><?php echo  $row['description'];?></textarea>
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
