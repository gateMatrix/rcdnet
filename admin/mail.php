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
<!-- Hoverable rows start -->
<section class="section">
<div class="row" id="table-hover-row">
<div class="col-12"> 
    <div class="bd-callout bd-callout-info">
<strong>This is an info callout.</strong> Example text to show it in action.
</div>
    <br>
    <!-- table hover -->
<?php
$threadid = $_GET['id'];
include "../includes/connection.php";
$sender = $_SESSION['userid'];

$sql = "SELECT * FROM mail INNER JOIN users ON mail.sender=users.userID WHERE threadid='$threadid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
echo "<h5>" . $row['subject']. "</h5>";

echo "<div class='card' style='padding: 20px;''>
      <div class='card-content'>";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
            echo "<p class='smallpara'>" .$row['fullname'].' '. '('.substr($row['time'], 0, 16).')'. "</p>";
            echo "<p>" . $row['message']. "</p>";
            echo "<a href='../photos/".$row['file']."'>".$row['file']."</a>";
            echo "<hr></hr>";
        }
  
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

//Reply Email
if (isset($_POST['reply'])){
$sql = "SELECT * FROM mail INNER JOIN users ON mail.sender=users.userID WHERE threadid='$threadid' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

    $recepient  = '';
    $subject    = $row['subject'];
    $message    = $_POST['message'];

    $n          = 12;
    $thread     = $row['threadid'];
    $filename   = $_FILES["uploadfile"]["name"];
    $tempname   = $_FILES["uploadfile"]["tmp_name"];
    $folder     = "../photos/" . $filename;

    include "../includes/connection.php";

    $sql = "INSERT INTO mail (threadid, recepient, subject, message, sender, file)
    VALUES ('$thread', '$recepient', '$subject', '$message', '$sender', '$filename')";

    if(mysqli_query($con, $sql) OR move_uploaded_file($tempname, $folder)){
        ?>
    <script type="text/javascript"> 
    alert("Mail Sent"); 
    window.location.href = "inbox.php";
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
            </div>
        </div>
<div class="card">
<div class="card-content">
    <div class="table-responsive" style="padding: 20px;">
    <h2></h2>
                <form method="POST" enctype="multipart/form-data">
                        <section class="section">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group" >
                                        <textarea name="message" id="default"  rows="12"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                 <div class="form-group">
                                <label for="basicInput">Attachement</label>
                                <input type="file" class="form-control" name="uploadfile" >
                                </div>
                            </div>
                        </div>
                        </section>

                        <input type="submit" class="btn btn-primary" name="reply" value="Send Message">
                        <br>
                    </form>
                </div>
            </div>
            </div>
            </div> 
        </div>
    </section>
    <!-- Hoverable rows end -->
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
<script>
    // Simple Datatable
    let table5 = document.querySelector('#table5');
    let dataTable = new simpleDatatables.DataTable(table5);
</script>

<script type="text/javascript">
    function DeleteConfirm() {
      return confirm("Are you sure to delete this project");
     }
 </script>
 <script>
    tinymce.init({ selector: '#default' });
    tinymce.init({ selector: '#dark', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code', plugins: 'code' });
</script>
</html>
