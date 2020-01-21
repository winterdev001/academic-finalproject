<?php 
    session_start();
?>
<?php
$conn= mysqli_connect("127.0.0.1", "root", "", "conzult");
if ($conn-> connect_error) {
   die("Connection failed:". $conn-> connect_error);
  }

            $sql = "SELECT * FROM users where availability='Available' ";
            $result = $conn-> query($sql); 
              // delete user
             if (isset($_GET['del'])) {
             $del=$_GET['del'];
               //SQL query for deletion.
            $query1 ="delete from users where ID='$del'";
            $result2=mysqli_query($conn,$query1);
            if($result2===true){
                                                
             echo"deleted";
             }
                                                
                                            
            else{ 
                 echo "ERROR: Could not able to execute $sql. "   . $mysqli->error; 
                } 
                                    
            header("Location:admindash.php");
            }
            //update user
            if (isset($_GET['updat'])) {
                $del=$_GET['updat'];
                  //SQL query for deletion.
               $query4 ="update users set availability='Busy' where ID='$del'";
               $result4=mysqli_query($conn,$query4);
               if($result4===true){
                                                   
                echo"hired";
                header("Location:allhiredusers.php");
                }
                                                   
                                               
               else{ 
                    echo "ERROR: Could not able to execute $query4. "   . $mysqli->error; 
                   } 
                                       
              
               }

   
   ?> 

<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Adminto - Responsive Admin Dashboard Template</title>

        <!-- DataTables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Multi Item Selection examples -->
        <link href="assets/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

           
                <!-- Start content -->
                <div class="">
                    <div class="">

                        
                            
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card  table-responsive" style="margin:150px;">
                                    <h4 class="" style="text-align:center;">Available Users</h4>                                    

                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                             <th >ID</th>
                                             <th scope="col">Username</th>
                                             <th scope="col">Firstname</th>
                                             <th scope="col">Lastname</th>
                                             <th scope="col">Email</th>
                                             <th scope="col">availability</th>
                                             <th scope="col">Department</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>

                                        </tbody>
                                    </table>
 	
                                    <form action="downloadpdf.php" method="post">
<input type="submit" name="submit" value="Download File" />
</form>                            </div>
                        </div>
                        <!-- end row -->


                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2019 © Conzult.com
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            
        
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>

        <!-- Key Tables -->
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="assets/plugins/datatables/dataTables.select.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            });

        </script>


    </body>

<!-- Mirrored from coderthemes.com/adminto/dark_menu/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Feb 2019 15:37:57 GMT -->
</html>