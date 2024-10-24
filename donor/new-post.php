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
                <h3>New Post <?php echo $_SESSION['name']; ?></h3>

<?php
//Create new post
if (isset($_POST['post'])){
    $subject = $_POST['subject'];
    $category = $_POST['category'];
    $notice = $_POST['notice'];
    $phone = $_POST['phone'];

    $member = $_SESSION['name'];




    include "../includes/connection.php";

    $sql = "INSERT INTO notice (category, title, message, user)
    VALUES ('$category', '$subject', '$notice', '$member')";

    if(mysqli_query($con, $sql)){
        ?>
<script type="text/javascript"> 
alert("Your post has been submitted"); 
window.location.href = "notice-board.php";
</script>
<?php

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);

}else{
   echo "<p class='text-subtitle text-muted'>"."Use this form to make posts to the general notice board."."</p>";

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
                        
                        <p>Select Category</p>
                            <fieldset class="form-group">
                                <select class="form-select" name="category">
                                     <option>Select Category</option>
                                    <option>Urgent Notice</option>
                                    <option>General Annoucement</option>
                                    <option>Opportunity</option>
                                    <option>Upcoming Event</option>
                                </select>
                            </fieldset>
                        <div class="form-group">
                            <label for="basicInput">Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="Enter email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Your Notice</label>
                            <textarea class="form-control" name="notice" rows="6"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" name="post" value="Post Now">
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
