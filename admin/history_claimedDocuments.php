<?php 

//session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-dark">Claimed Documents
    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="copy" style="float: right; margin:1vh;"><i
                                class="fas fa-download fa-sm text-white-50"></i> Copy</button>

    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="csv" style="float: right; margin:1vh;"><i
                                class="fas fa-download fa-sm text-white-50"></i> CSV</button>

    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="excel" style="float: right; margin:1vh;"><i
                                class="fas fa-download fa-sm text-white-50"></i> Excel</button>

    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="pdf" style="float: right; margin:1vh;"><i
                                class="fas fa-download fa-sm text-white-50"></i> pdf</button>
                                
    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="print" style="float: right; margin:1vh;"><i
                                class="fas fa-download fa-sm text-white-50"></i> print</button>
    </h5>

  
    
  </div>

  <div class="card-body">

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


    <div class="table-responsive">
        
  <table  cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody>
  </table>
    <?php 
    
        $connection = mysqli_connect("localhost","root","","plvdocx_db");
        $query = "SELECT  *
                          from transactiondetailed_tbl

                          inner join transactionmaster_tbl
                          on transactiondetailed_tbl.transactionMaster_id = transactionmaster_tbl.transaction_id

                          where transaction_status = 7;
        ";
        $query_run = mysqli_query($connection, $query);
    
    ?>
        <script>
        
        $(document).ready(function() {
          $('#tableData').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          } );
      } );
    </script>
    
      <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center">
            <th> Item Number </th>
            <th> Transaction ID </th>
            <th> Document ID </th>
            <th> Document Subtotal </th>
            <th>Start date</th>
          </tr>
        </thead>
        <tbody>
        <?php
        
            if(mysqli_num_rows($query_run) > 0){
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>

                <tr class="text-center">
                    <td><?php echo $row['transactionDetailed_id']; ?></td>
                    <td><?php echo $row['transactionMaster_id']; ?></td>
                    <td><?php echo $row['document_id']; ?></td>
                    <td><?php echo $row['document_subtotal']; ?></td>
                   
                  
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


<!-- /.container-fluid -->
                    <!-- Content Row -->

               

                </div>
                <!-- /.container-fluid -->

           
            <!-- End of Main Content -->
          </div>
            

  

  
    <?php
    include('includes/scripts.php');
    include('includes/footer.php')

    ?>
  

    

