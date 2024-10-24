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

<?php
//Create new beneficiary
if (isset($_POST['post'])){
    $management = $_POST['management'];
    $name = $_POST['name'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $date =  date("d/m/Y");


    include "../includes/connection.php";

    $sql = "INSERT INTO management (reportNote, date, magName, month, year)
    VALUES ('$management', '$date', '$name', '$month', '$year')";

    if(mysqli_query($con, $sql)){
        ?>
    <script type="text/javascript"> 
    alert("Report successfully saved"); 
    window.location.href = "managementreports.php";
    </script>
    <?php 

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);

    }else{
       echo "<p style='display: none;'  class='text-subtitle text-muted'>"."Use this form to make a project report"."</p>";
    }
    ?> 

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">


                    <form method="POST" enctype="multipart/form-data">
                        <section class="section">
                            <div class="row">
                            <div class="col-md-12">
                                 <div class="form-group">
                                <label for="basicInput">Report Name *</label>
                                <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="management" id="default"  rows="30"></textarea>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                <label for="basicInput">Month * <span style="font-weight: 300 !important; font-size: 0.8em;">(End month for periodic reports)</span></label>
                                <select class="choices form-select" required name="month">
                                        <option value='January' >January</option>
                                        <option value='February' >February</option>
                                        <option value='March' >March</option>
                                        <option value='April' >April</option>
                                        <option value='May' >May</option>
                                        <option value='June' >June</option>
                                        <option value='July' >July</option>
                                        <option value='August' >August</option>
                                        <option value='September' >September</option>
                                        <option value='October' >October</option>
                                        <option value='December' >December</option>
                                        <option value='December' >December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Year *</label>
                                <select class="choices form-select" required name="year">
                                        <option value='<?php echo date(Y)-2; ?>' ><?php echo date(Y)-2; ?></option>
                                        <option value='<?php echo date(Y)-1; ?>' ><?php echo date(Y)-1; ?></option>
                                        <option value='<?php echo date(Y); ?>' ><?php echo date(Y); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </section>

                        
                        <input type="submit" class="btn btn-primary" name="post" value="Save Report">
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
<script>
    tinymce.init({ selector: '#default' });
    tinymce.init({ selector: '#dark', toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code', plugins: 'code' });
</script>
</html>
