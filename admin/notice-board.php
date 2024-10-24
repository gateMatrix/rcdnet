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
                <h3>Notice Board</h3>
            </div>
            <div class="col-12 col-md-6 order-md-1 order-last">
                <a style="float: right; margin-right: 10px;" href="myposts.php" style="margin-bottom: 20px;" class="btn btn-success">My Posts</a><a style="float: right; margin-right: 10px;" href="new-post.php" style="margin-bottom: 20px;" class="btn btn-success">Make A Post</a>
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

                    $sql = "SELECT * FROM notice WHERE category = 'Urgent Notice' ORDER BY noticeid DESC LIMIT 5 ";
                    if($result = mysqli_query($con, $sql)){
                    if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        echo "<a href='post.php?id=".$row['noticeid']."'".">";
                        echo "<div class='alert alert-danger alert-dismissible show fade'>";
                            echo "<h4 style='color: #fff;'>".$row['title']."</h4>";
                            echo "<p style='color: #fff;'>" ."Posted By ".$row['user']." | ".substr($row['date'], 0, -10);"</p>";
                            echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                        echo "</div>";
                        echo "</a>";
                    } 
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                    } else{
                    echo "No urgent notices found.";
                    }
                    } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                ?>



                <?php
                    include "../includes/connection.php";

                    $sql = "SELECT * FROM notice WHERE category in ('Opportunity', 'General Annoucement', 'Upcoming Event') ORDER BY noticeid DESC LIMIT 5 ";
                    if($result = mysqli_query($con, $sql)){
                    if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        echo "<a href='post.php?id=".$row['noticeid']."'".">";
                        echo "<div class='alert alert-success alert-dismissible show fade'>";
                            echo "<h4 style='color: #fff;'>".$row['title']."</h4>";
                            echo "<p style='color: #fff;'>" ."Posted By ".$row['user']." | ".substr($row['date'], 0, -10);"</p>";
                            echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                        echo "</div>";
                        echo "</a>";
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
