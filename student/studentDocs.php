<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="js/app.js"></script>
    <link rel="stylesheet" href="css/studentDocs.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
      rel="stylesheet"
    />

    <link rel = "icon" 
    href ="img/plvdocxicon.png" 
    type = "image/x-icon">

    <title>PLV Docx</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  </head>
  
  <body>
    
    <?php
      include('security.php');
      include('includes/navbar.php');
    ?>
  
    <main>
      <?php 
        if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
            echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
            unset($_SESSION['success']);
        }

        if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
            echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
        }
      ?>
        <div class="mytabs">
            <input type="radio" id="tabfree" name="mytabs" checked="checked">
            <label for="tabfree">Forms</label>
            <div class="tab">
              <h2>Forms</h2>
                <div class="wrapper">
                    <div class="img-area">

                        
                        <div class="container">
                          <div class="row">
                            <div class="col-md-12">

                              <div class="modal fade" id="myModal">

                                <div class="modal-dialog modal-lg">
                                  
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1>Forms</h1>
                                    </div>

                                  <form action="documentcode.php" method="POST">
                                  <?php 
                                      if(isset($_POST['docCav_btn'])){
                                        $_SESSION['document_id'] = 1;
                                      }
                                
                                      if(isset($_POST['docInc_btn'])){
                                        $_SESSION['document_id'] = 2;
                                      }
                                
                                      if(isset($_POST['docAbsence_btn'])){
                                        $_SESSION['document_id'] = 3;
                                      }
                                
                                      if(isset($_POST['docTransfer_btn'])){
                                        $_SESSION['document_id'] = 4;
                                      }
                                
                                      if(isset($_POST['docDiploma_btn'])){
                                        $_SESSION['document_id'] = 5;
                                      }

                                      $document_id = $_SESSION['document_id'];

                                      $connection = mysqli_connect("localhost","root","","plvdocx_db");
                                      $query = "SELECT  *

                                                        FROM document_tbl
                                                        
                                                        WHERE document_id = '$document_id';
                                      ";
                                      $query_run = mysqli_query($connection, $query);
                                      $row = mysqli_fetch_assoc($query_run);
                                    ?>
                                    <div class="modal-body">

                                    <!-- Document Name -->
                                    <div class="form-group">
                                        <label> Document Name </label>
                                        <input type="text" name="student_id" class="form-control" placeholder="<?php echo $row['document_name'] ?>" disabled> 
                                    </div>

                                    <!-- Number of pages per copy -->
                                    <div class="form-group">
                                        <label> Number of pages per copy </label>
                                        <input type="text" name="student_fn" class="form-control" placeholder="<?php echo $row['document_pages'] ?>" disabled>
                                    </div>

                                    <!-- Price Per Page -->
                                    <div class="form-group">
                                        <label>Price Per Page</label>
                                        <input type="text" name="student_mn" class="form-control" placeholder="<?php echo $row['document_pricePerPageInPhp'] ?>" disabled>
                                    </div>

                                    <!-- Number of copies -->
                                    <div class="form-group">
                                        <label>Number of copies</label>
                                        <input type="text" name="student_ln" class="form-control" placeholder="Number of copies">
                                    </div>
                                  
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="code.php" method="post">
                                          <button type="submit" name="registerbtn" class="btn btn-primary">Buy</button>
                                        </form>

                                        <form action="code.php" method="post">
                                          <button type="submit" name="registerbtn" class="btn btn-success">Add to cart</button>
                                        </form>
                                    </div>
                                </form>

                                  </div>

                                </div>

                              </div>

                            </div>
                          </div>
                        </div>
                              <div class="single-img"><a class="btnImage" name="docCav_btn" data-bs-toggle="modal" data-bs-target="#myModal"><img src="image/cav.png" class="imgsize"></a></div>
                           
                              <div class="single-img"><button class="btnImage" name="docInc_btn" data-bs-toggle="modal" data-bs-target="#myModal"><img src="image/completion of inc grade.png" class="imgsize"></button></div>
                           
                              <div class="single-img"><button class="btnImage" name="docAbsence_btn" data-bs-toggle="modal" data-bs-target="#myModal"><img src="image/formsleaveofabsence.png" class="imgsize"></button></div>
                           
                              <div class="single-img"><button class="btnImage" name="docTransfer_btn" data-bs-toggle="modal" data-bs-target="#myModal"><img src="image/transfercreds.png" class="imgsize"></button></div>
                            
                              <div class="single-img"><button class="btnImage" name="docDiploma_btn" data-bs-toggle="modal" data-bs-target="#myModal"><img src="image/DIPLOMA.png" class="imgsize"></button></div>
                            
                    </div>
                </div>
            </div>
        
            <input type="radio" id="tabsilver" name="mytabs">
            <label for="tabsilver">Certifications</label>
            <div class="tab">
              <h2>Certifications</h2>
                <div class="wrapper">
                    <div class="img-area">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">

                          <div class="modal fade" id="myCertificates">

                            <div class="modal-dialog">
                              
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1>Certificates</h1>
                                </div>

                              <form action="documentcode.php" method="POST">
                                <div class="modal-body">

                                  <!-- Document Name -->
                                  <div class="form-group">
                                      <label> Document Name </label>
                                      <input type="text" name="student_id" class="form-control" placeholder="Document Name" disabled> 
                                  </div>

                                  <!-- Number of pages per copy -->
                                  <div class="form-group">
                                      <label> Number of pages per copy </label>
                                      <input type="text" name="student_fn" class="form-control" placeholder="Number of pages per copy" disabled>
                                  </div>

                                  <!-- Price Per Page -->
                                  <div class="form-group">
                                      <label>Price Per Page</label>
                                      <input type="text" name="student_mn" class="form-control" placeholder="Price Per Page" disabled>
                                  </div>

                                  <!-- Number of copies -->
                                  <div class="form-group">
                                      <label>Number of copies</label>
                                      <input type="text" name="student_ln" class="form-control" placeholder="Number of copies">
                                  </div>
                                 
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                                  </div>
                                </form>

                              </div>

                            </div>

                          </div>

                        </div>
                      </div>
                    </div>
                        <div class="single-img"><button class="btnImage" data-bs-toggle="modal" data-bs-target="#myCertificates"><img src="image/culmulativegpa.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-bs-toggle="modal" data-bs-target="#myCertificates"><img src="image/description.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-bs-toggle="modal" data-bs-target="#myCertificates"><img src="image/enrollment.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-bs-toggle="modal" data-bs-target="#myCertificates"><img src="image/grades.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-bs-toggle="modal" data-bs-target="#myCertificates"><img src="image/graduation.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-bs-toggle="modal" data-bs-target="#myCertificates"><img src="image/unitsearned.png" class="imgsize"></button></div>
                    </div>
                </div>
            </div>
        
        
          </div>


          <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    </main>
   
  </body>
  </html>