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
    <a href="offenselist.php">
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
      <div class="overview-boxes">

        <div class="cardMod">
            <h4>List of Offenses Committed </h4>
            <a href="addOffenseRecord.php" class="addDriver"> + Create </a>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date Time</th>
      <th scope="col">License ID</th>
      <th scope="col">Officer</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include_once 'db_conn.php';
    $sql = "SELECT * FROM offenserecord";
    $i=1;
    $result = $conn->query($sql);
    if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
      echo "<tr>";
      echo "<th scope='row'>$i</th>";
      echo "<td>".$row["DateTime"]."</td>";
      echo "<td>".$row["licenseID"]."</td>"; //check this
      echo "<td>".$row["Officer"]."</td>";
      echo "<td>".$row["status"]."</td>";
      echo "<td>
      <div class='dropdown'>
      <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Action</button>
      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
          <a class='dropdown-item' href='editoffenserecord.php?licenseID=".$row["licenseID"]."'>Edit</a>
          <a class='dropdown-item' href='./controller/deleteOffenseRecord.php?id=".$row["licenseID"]."'>Delete</a>
      </div>
  </div>
      </td>";
      echo "</tr>";
      $i++;
      }
      
    }
        ?>


  </tbody>
</table>
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