<?php 
session_start();
include_once 'db_conn.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    if (isset($_GET['code'])) {
        $sql = "SELECT * FROM offense WHERE code='".$_GET['code']."'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
          $row=$result->fetch_assoc();
        }
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
    <a href="offenselist.php" class="active">
        <i class='bx bx-list-ul' ></i>
        <span class="links_name">Offense list</span>
    </a>
    </li>
    <li>
    <a href="offenseRecord.php">
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
          <form action="./controller/editoffense.php?code=<?php echo $_GET['code'];?>" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Date Created</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="dateCreated" value="<?php echo $row['dateCreated'];?>" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"> Offense Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name="name" value="<?php echo $row['name'];?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Offense Code</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Code" name="code" value="<?php echo $row['code'];?>" >
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Offense Description</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Description" name="description" value="<?php echo $row['description'];?>" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Offense Charge</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Charge" name="rate" value="<?php echo $row['rate'];?>" >
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
    }
}else{
     header("Location: index.php");
     exit();
}
 ?>