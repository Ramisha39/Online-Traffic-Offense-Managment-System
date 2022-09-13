<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include_once 'db_conn.php';
 ?>
<!DOCTYPE html>
<html>
<?php
include_once './partials/head.php';
?>
<body>
      <?php include_once './navbar.php'; ?>     

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
                         <h5 style="font-family: 'Kanit', sans-serif;" > { Hello, <?php echo $_SESSION['name']; ?> } </h5>

                         </b>
                    </div>
               </div>
          
          </div>

        </span>
      </div>
      
    </nav>
 
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Driver's Listed (<?php
              $sql = "SELECT * FROM drivers";
              $result = $conn->query($sql);
              echo $result->num_rows;
            ?>)</div>

          </div>

        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Offenses Committed (<?php
              $sql = "SELECT * FROM offenserecord";
              $result = $conn->query($sql);
              echo $result->num_rows;
            ?>)</div>
          
         </div>
         
        
        </div>

        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Traffic Offenses (<?php
              $sql = "SELECT * FROM offense";
              $result = $conn->query($sql);
              echo $result->num_rows;
            ?>)</div>
          
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