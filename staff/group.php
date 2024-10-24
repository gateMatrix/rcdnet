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
        <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Group Mail</h3>
            </div>
            </div>
        </div>

<?php
//Create new group email
if (isset($_POST['post'])){
    $recepient = $_POST['group'];
    $subject = $_POST['subject'];
    $message = $_POST['message']; 
    $sender = $_SESSION['userid'];
    $n = 12;
    $thread = bin2hex(random_bytes($n));
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../photos/" . $filename;

    include "../includes/connection.php";

    $sql = "INSERT INTO mail (threadid, mailgroup, subject, message, sender, file)
    VALUES ('$thread', '$recepient', '$subject', '$message', '$sender', '$filename')";

    if(mysqli_query($con, $sql) OR move_uploaded_file($tempname, $folder)){
        ?>
    <script type="text/javascript"> 
    alert("Mail Sent"); 
    window.location.href = "sent.php";
    </script>
    <?php

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p class='text-subtitle text-muted'>"."Use this form to compose email"."</p>";
    }
    ?>
    <section class="section">
        <div class="row"> 
            <div class="col">
                <div class="card">
                    <div class="card-body">

                    <form method="POST" enctype="multipart/form-data">
                        <section class="section">
                        <div class="row" style="z-index: 100;"> 
                            <div class="col-md-12">
                                 <div class="form-group">
                                <label for="basicInput">Recipient *</label>
                                <select class="choices form-select" name="group" style="z-index: 100 !important;">
                                <?php
                                include "../includes/connection.php";
                                $sql = "SELECT * FROM mailgroup ";
                                if($result = mysqli_query($con, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                                echo '<option value='.$row['groupid'].'>' . $row['name'] . '</option>';
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

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                 <div class="form-group">
                                <label for="basicInput">Subject</label>
                                <input type="text" class="form-control" name="subject" required>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group" >
                                        <textarea name="message" id="default"  rows="12"></textarea>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="col-md-12">
                                 <div class="form-group">
                                <label for="basicInput">Attachement</label>
                                <input type="file" class="form-control" name="uploadfile" >
                                </div>
                            </div>
                        
                        <input type="submit" class="btn btn-primary" name="post" value="Send Message">
                    </form>
                    </div> 
                </div> 
            </div>
        </div>
    </section>

 
</div>
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
    tinymce.init({ selector: '#default' });
    tinymce.init({ selector: '#dark', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code', plugins: 'code' });
</script>
</html>
