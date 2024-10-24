<section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                <label for="basicInput">Report name *</label>
                                <input type="text" class="form-control" name="name" required placeholder="Enter report title">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Select Category</label>
                                <select class="choices form-select" name="category">
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

                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Select Category</label>
                                <select class="choices form-select" name="type">
                                        <option value='Management'>Management Highlights</option>
                                        <option value='AuditedBooks'>Audited Books of Accounts</option>
                                        <option value='Accountability'>Accountability Reports</option>
                                        <option value='Financial'>Monthly Financial Reports</option>
                                        <option value='Activity'>Activity Reports</option>
                                        <option value='Events'>Events and Fundraising Documents</option>
                                        <option value='Annual'>Annual Reports</option>
                                        <option value='Quarter'>Quarterly Reports</option>
                                    </select>
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
                                <select class="choices form-select" required name="category">
                                        <option value='<?php echo date(Y)-2; ?>' ><?php echo date(Y)-2; ?></option>
                                        <option value='<?php echo date(Y)-1; ?>' ><?php echo date(Y)-1; ?></option>
                                        <option value='<?php echo date(Y); ?>' ><?php echo date(Y); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                                <div class="form-group">
                                <label for="basicInput">Attach report document(.PDF) *</label>
                                <input type="file" required class="form-control" name="uploadfile">
                                </div>
                        </div>
                        
                        
                        <input type="submit" class="btn btn-primary" name="post" value="Submit Report">
                    </form>
                    </div> 
                </div>
            </div>
        </div>
    </section>