<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Charts - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />

        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-home fa-fw"></i></div>
                                Home</a
                            ><a class="nav-link" href="products.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-box-open fa-fw" aria-hidden="true"></i></div>
                                Products</a
                            ><a class="nav-link" href="admins.php"
                                ><div class="sb-nav-link-icon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></div>
                                Admins</a
                            ><a class="nav-link" href="users.php"
                                ><div class="sb-nav-link-icon"><i class="fa fa-users fa-fw" aria-hidden="true"></i></div>
                                Users</a
                            >
                            <div class="sb-sidenav-menu-heading">Reports</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts"
                            ><div class="sb-nav-link-icon"><i class="fas fa-tags fa-fw"></i></div>
                                Sales
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="sales-by-day.php">By Day</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="sales-by-week.php">By Week</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="sales-by-month.php">By Month</a></nav>
                            </div>
                           
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts"
                            ><div class="sb-nav-link-icon"><i class="fas fa-chart-line fa-fw"></i></div>
                            Revenue
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="revenue-by-day.php">By Day</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="revenue-by-week.php">By Week</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="revenue-by-month.php">By Month</a></nav>
                            </div>
                           
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts"
                            ><div class="sb-nav-link-icon"><i class="fas fa-undo fa-fw"></i></div>
                            Returns
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="returns-by-day.php">By Day</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="returns-by-week.php">By Week</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="returns-by-month.php">By Month</a></nav>
                            </div>
                           
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts"
                            ><div class="sb-nav-link-icon"><i class="fas fa-boxes fa-fw"></i></i></div>
                            Inventory
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="inventory-by-day.php">By Day</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="inventory-by-week.php">By Week</a></nav>
                            </div>
                            <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="inventory-by-month.php">By Month</a></nav>
                            </div>
                           

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Charts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Inventory</li>
                            <li class="breadcrumb-item active">By Week</li>
                        </ol>
                        
                      
                        <div id="layoutAuthentication">
                            <div id="layoutAuthentication_content">
                                <main>
                                    <?php
                                          if(isset($_POST['submit'])){
                                            include_once 'includes/connection.inc.php';
                                // GET WEEKLY SALES
                                //Generate date range from week input
                                $firstDayOfWeek = date ("Y-m-d", strtotime($_POST["week"])); // Year 2020
                                $lastDayOfWeek =  date ("Y-m-d", strtotime("+7 day", strtotime($_POST["week"])));
                                //Convert strtotime to date format for displaying on screen
                                $firstDayOfWeekDateFormat =  getdate(strtotime($firstDayOfWeek));
                                $firstDayOfWeekDateFormat = $firstDayOfWeekDateFormat['month'].' '.$firstDayOfWeekDateFormat['mday'].', '.$firstDayOfWeekDateFormat['year'];
                                $lastDayOfWeekDateFormat = getdate(strtotime($lastDayOfWeek));
                                $lastDayOfWeekDateFormat = $lastDayOfWeekDateFormat['month'].' '.$lastDayOfWeekDateFormat['mday'].', '.$lastDayOfWeekDateFormat['year'];


                                            
                                            if(!isset($_POST['group_products'])) 
                                                $_POST['group_products'] = 'no';
                                            
                                                $group_products = $_POST['group_products'];
                                               echo '
                                               
                                               <div class="card mb-4 mt-4">
                            
                                               <div class="card-header"><i class="fas fa-table mr-1"></i>Inventory between '.$firstDayOfWeekDateFormat.' and '.$lastDayOfWeekDateFormat.'</div>
                                               <div class="card-body">
                                                   <div class="table-responsive">
                                                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                           <thead>
                                                               <tr>';
                                                                      if($_POST['group_products'] == 'yes'){
                                                                          echo " <th>Product Brand</th>
                                                                                 <th>Product Name</th>
                                                                                 <th>Total Inventory</th>";
                                                                      } else {
                                                                           echo "<th>Total Inventory</th>";
                                                                      }
                                
                                                    echo           '</tr>
                                                        
                                                           <tbody>';
                                                     //CALCULATE DAILY SALES GROUPED BY PRODUCTS
                                                     if($_POST['group_products'] == 'yes'){
                                                        $sql = "SELECT brand, name, inventory.quantity 
                                                        FROM watches JOIN inventory
                                                        ON watches.ID = inventory.watch_id AND inventory_date = '$lastDayOfWeek';";
                                                         mysqli_query($conn, $sql);
                                                         $result = mysqli_query($conn, $sql);   
                                                         $resultCheck = mysqli_num_rows($result);
                                                           
                                                         
                                                         if($resultCheck > 0){
                                                           while($row = mysqli_fetch_assoc($result)){
                                                            echo "<tr><td>".$row['brand']."</td>". 
                                                              "<td>".$row['name']."</td>".
                                                              "<td>".$row['quantity']."</td>";
                                                          }
                                                       } else {
                                                        echo "<tr><td>N/A</td><td>N/A</td><td>0</td></tr>";
                                                              
                                                    
                                                       } 
                                                      } else { // WITHOUT GROUPING
                                                        $sql = "SELECT SUM(inventory.quantity) AS total_quantity
                                                        FROM watches JOIN inventory
                                                        ON watches.id = inventory.watch_id AND inventory_date = '$lastDayOfWeek';";
                                                         mysqli_query($conn, $sql);
                                                         $result = mysqli_query($conn, $sql);   
                                                         $resultCheck = mysqli_num_rows($result);
                                                           
                                                         if($resultCheck > 0){
                                                           while($row = mysqli_fetch_assoc($result)){
                                                            echo "<td>".$row['total_quantity']."</td>";
                                                          } 
                                                        } else {
                                                          echo "<tr><td>N/A</td><td>N/A</td><td>0</td></tr>";
                                                                
                                                      
                                                         }  
                                                      } 
                                                   
                                               echo            '</tbody>
                                                       </table>
                                                   </div>
                                               </div>
                                           </div>
                                          </div>
                                               
  
                                               
                                               
                                          ';


                                          } else {
                                             echo' <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-12">
                                                    <div class="card rounded-lg mt-0">
                                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Choose a week:</h3></div>
                                                            <div class="card-body">
                                                                <form id="revenueForm" action="test.php" method="POST">
                                                                    
                                                     <div class="form-group row">
                                                        <div class="col-12">
                                                            <input class="form-control" type="week" id="example-date-input" name="week">
                                                        </div>
                                                        </div> 
                                                         
                                                            <div class="form-group row">
                                                                <div class="checkbox ml-3 mr-2">
                                                                    <label><input type="checkbox" name="group_products" value="yes"></label>
                                                                  </div>
                                                                  <label>Group products</label>
                                                              </div>
    
                                                            <button type="submit" name="submit" class="btn btn-success btn-block">Show Inventory</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> ';

                                          }
                                    
                                     
                                    
                                    ?>
                                   
                                </main>
                            </div>
                            
                        </div>
                                
                    </div>
                    
                      

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   
       <!--    <script src="assets/demo/chart-area-demo.js"></script>     -->
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
        <script>
              

        </script>
        



    


    </body>
</html>
