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
<?php
//Create new comment
if (isset($_POST['comment'])){
    $message = $_POST['message'];
    $postid = $_GET['id'];
    $member = $_SESSION['name'];


    include "../includes/connection.php";

    $sql = "INSERT INTO comment (message, user, post)
    VALUES ('$message', '$member', '$postid')";

    if(mysqli_query($con, $sql)){
        ?> 
<script type="text/javascript">
alert("Comment submitted successfully"); 
window.location.href = "post.php?id=<?php echo $_GET['id'];?>";
</script>
<?php

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);

}else{

}

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
                <h3>Notice Board</h3>
            </div>
            
        </div> 
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                     <div class="card-body">

                        <?php
include "../includes/connection.php";

$postid = $_GET['id'];

$sql = "SELECT * FROM notice WHERE noticeid = $postid";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
            echo "<a href='post.php?id=".$row['noticeid']."'".">";
            echo "<div class='alert alert-secondary'>";
                echo "<h4>".$row['title']."</h4>";
                echo "<p style='color: #000; margin-top: -10px;'>" ."Posted By ".$row['user']." | ".substr($row['date'], 0, -10);"</p>";
                echo "<hr>";
                echo "<p style=''>" .$row['message']."</p>";
            echo "</div>";
            echo "</a>";
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




                <div class="card">
                    <div class="card-body">
                        <div class="form-floating">
                            <form method="POST" action="">
                            <textarea class="form-control" placeholder="Type your comment here" name="message"></textarea>
                            <input style="margin-top: 12px;" type="submit" class="btn btn-primary" name="comment" value="Submit Comment">
                    </form>
                        </div>
                    </div>



                    <div class="list-group">
                        <?php
                        include "../includes/connection.php"; 
                        $postid = $_GET['id'];
                        $sql = "SELECT *  FROM comment  WHERE post= $postid ORDER BY commentid DESC";
                        if($result = mysqli_query($con, $sql)){ 
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<a class='list-group-item list-group-item-action'>
                                    <div class='d-flex w-100 justify-content-between'>";
                                    echo "<h5 class='mb-1'>".$row['user']."</h5>";
                                    echo "<small>".substr($row['date'], 0, -3)."</small>";
                                    echo "</div>";
                                    echo "<p class='mb-1'>".$row['message']."</p>";
                                    echo  "</a>";

                                } 
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

            <div class="col-md-4">
                <div class="card">
                     <div class="card-body">
                        <ul class="list-group">
                                <li class="list-group-item active">CATEGORIES</li>
                                <li class="list-group-item">
                                    <?php
                                    include "../includes/connection.php"; 
                                    $sql = "SELECT COUNT(category) AS namba FROM notice  WHERE category='General Annoucement' ";
                                    if($result = mysqli_query($con, $sql)){ 
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){

                                                    echo  "<namba class='namba'>".$row['namba']."</namba>"." General Annoucements";

                                            } 
                                            mysqli_free_result($result);
                                        } else{
                                            echo "No records matching your query were found.";
                                        }
                                    } else{
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                    }
                                    ?>

                              </li>
                                <li class="list-group-item">
                                    <?php
                                    include "../includes/connection.php"; 
                                    $sql = "SELECT COUNT(category) AS namba FROM notice WHERE category='Upcoming Event' ";
                                    if($result = mysqli_query($con, $sql)){ 
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){

                                                    echo  "<namba class='namba'>".$row['namba']."</namba>"." Upcoming Events";

                                            } 
                                            mysqli_free_result($result);
                                        } else{
                                            echo "No records matching your query were found.";
                                        }
                                    } else{
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                    }
                                    ?>
                                </li> 
                                <li class="list-group-item">
                                    <?php
                                    include "../includes/connection.php"; 
                                    $sql = "SELECT COUNT(category) AS namba FROM notice WHERE category='Opportunity' ";
                                    if($result = mysqli_query($con, $sql)){ 
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){

                                                    echo  "<namba class='namba'>".$row['namba']."</namba>"." Opportunities";

                                            } 
                                            mysqli_free_result($result);
                                        } else{
                                            echo "No records matching your query were found.";
                                        }
                                    } else{
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                    }
                                    ?>
                                </li>
                                <li class="list-group-item">
                                    <?php
                                    include "../includes/connection.php"; 
                                    $sql = "SELECT COUNT(category) AS namba FROM notice WHERE category='Urgent Notice' ";
                                    if($result = mysqli_query($con, $sql)){ 
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){

                                                    echo  "<namba class='namba'>".$row['namba']."</namba>"." Urgent Notice";

                                            } 
                                            mysqli_free_result($result);
                                        } else{
                                            echo "No records matching your query were found.";
                                        }
                                    } else{
                                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                    }
                                    ?>
                                </li>

                            </ul>
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
