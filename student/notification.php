<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="js/app.js"></script>
    <link rel="stylesheet" href="css/notification.css"/>
    <link rel="stylesheet" href="css/sb-admin-2.css"/>
      <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
      rel="stylesheet"
    />

    <link rel = "icon" 
    href ="img/plvdocxicon.png" 
    type = "image/x-icon">

    <title>PLV Docx</title>
  </head>
  <style>
    .badge {
        position: relative;
        right: 30px;
        top: -1vh;
        color: #fff;
    }

    .link-textCustom-Notif{
        position: relative;
        right: 1.6vh;
        top:1vh;
    }
  </style>
  <body>
    
    <?php
      include('security.php');
      include('includes/navbar.php');
    ?>

    <main>
        <div class="mytabs">
            <input type="radio" id="tabpay" name="mytabs" checked="checked">
            <label for="tabpay">Notification</label>
            <div class="tab">
            <div class="wrapper">
                    <div class="img-area">
                        
                    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Staff Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="documentsCode.php" method="POST">

                                <div class="modal-body">
                                    <!-- Document Name -->
                                    <div class="form-group">
                                        <label> Document Name </label>
                                        <input type="text" name="document_name" class="form-control" placeholder="Enter Document Name">
                                    </div>
                                    <!-- Price Per Page -->
                                    <div class="form-group">
                                        <label>Price Per Page</label>
                                        <input type="text" name="document_pricePerPageInPhp" class="form-control" placeholder="Enter Price Per Page in Php">
                                    </div>
                                
                                    <!-- Pages -->

                                    <div class="form-group">
                                        <label>Pages</label>
                                        <input type="text" name="document_pages" class="form-control" placeholder="Enter Number of Pages">
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="add_document" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                            </div>
                        </div>
                        </div>


                        <div class="container-fluid">

                        <!-- DataTales Example -->
                       
                        

                        <div class="card-body">

                            <div class="table-responsive">
                                
                            <?php 
                                $studentID = $_SESSION['student_id'];
                                $connection = mysqli_connect("localhost","root","","plvdocx_db");
                                $query = "SELECT 
                                                *

                                                from notificationstudent_tbl

                                                where student_id = $studentID;
                                ";
                                $query2 = "UPDATE notificationstudent_tbl
                                            SET notificationstudent_isSeen = 1
                                            WHERE student_id = $studentID
                                            AND notificationstudent_isSeen = 0";
                                $query_run = mysqli_query($connection, $query);
                                $query2_run = mysqli_query($connection, $query2);
                                $_SESSION['notification_number']=0;
                            ?>

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr class="text-center">
                                    <th> Notification ID </th>
                                    <th> Description </th>  
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                
                                    if(mysqli_num_rows($query_run) > 0){
                                        while($row = mysqli_fetch_assoc($query_run)){
                                            ?>

                                        <tr class="text-center">
                                            <td><?php echo $row['notificationStudent_id']; ?></td>
                                            <td><?php echo $row['notificationStudent_description']; ?></td>
                                            <td><?php echo $row['notificationStudent_date']; ?></td>
                                        </tr>

                                            <?php
                                        }
                                    }
                                    else{
                                        echo "No Record Found";
                                    }
                                ?>
                                
                                </tbody>
                            </table>

                            </div>
                        </div>
                  

                </div>


          
                    </div>
                </div>
            </div>
          </div>

       

    </main>
   
  </body>
  </html>