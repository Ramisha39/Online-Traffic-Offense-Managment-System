<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<?php
include_once './partials/head.php';
?>
<body>
<div class="sidebar">
<div class="logo-details">
<i ></i>
<a href="home.php" class="logo_name">OTOMS</a>
</div>
<ul class="nav-links">
    <li>
    <a href="home.php" >
        <i class='bx bx-grid-alt' ></i>
        <span class="links_name">Dashboard</span>
        
    </a>
    </li>
    <li>
    <a href="driverList.php">
        <i class='bx bx-box' ></i>
        <span class="links_name">Driver List</span>
    </a>
    </li>
    <li>
    <a href="offenselist.php" >
        <i class='bx bx-list-ul' ></i>
        <span class="links_name">Offense list</span>
    </a>
    </li>
    <li>
    <a href="offenseRecord.php" class="active">
        <i class='bx bx-pie-chart-alt-2' ></i>
        <span class="links_name">Offense Records</span>
    </a>
    </li>

    </li>
    <li class="log_out">
    <a href="logout.php">
        <i class='bx bx-log-out'></i>
        <span class="links_name">Log out</span>
        <!-- <a href="logout.php">Logout</a> -->
    </a>
    </li>
</ul>
</div>
     

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
        <span class="dashboard">
          <div class="container">
               <div class="row" >
                    <div class="col">
                    
                    </div>
                    <div class="col-6">
                         
                    </div>
                    <div class="col" >
                         <b>
                         <h5 style="font-family: 'Kanit', sans-serif;"> { Hello, <?php echo $_SESSION['name']; ?> }</h5>

                         </b>
                    </div>
               </div>
          
          </div>

        </span>
      </div>
      
    </nav>
 
    <div class="home-content">

     <div class="overview-boxes" style="width:100rem;">
        <div class="box">
          <div class="right-side">
          <form action="./controller/addOffenseRecord.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputPassword1">DateTime</label>
                    <input type="datetime-local" class="form-control" id="exampleInputPassword1" placeholder="Date Time" name="DateTime">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">License ID</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="License ID" name="licenseID">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Officer</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Officer" name="Officer">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Status" name="status">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
          </div>
        </div>

    </div> 

      </div> 

<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
</script>


</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>