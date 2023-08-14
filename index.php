<?php
//connect te database
$servername = "localhost";
$username ="root";
$password = "";
$database = "crud";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
  echo "faile to connect";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $title = $_POST['title'];
  $desc = $_POST['description'];

  
  

// Connecting to the Database


  // Submit these to a database
  // Sql query to be executed 
  $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$desc')";
  $result = mysqli_query($conn, $sql);

  if($result){
    echo '<script> alert("record has been inserted successfully !")</script>';
  }
  else{
      // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      echo '<script>alert("Sorry ! can you please try after some time!")</script>';
  }

}




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap.js"></script>
    <title>Crud App</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light ">
        
        <button class="navbar-toggler bg-info" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand text-success"><h4>Crud </h4></a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
               <li class="nav-item active">
                 <a class="nav-link mr-md-4" href="#">Home <span
                     class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                 <a class="nav-link mr-md-4 " href="#">about</a>
               </li>
               <li class="nav-item">
                <a class="nav-link mr-md-4 " href="#">Contact Us</a>
              </li>
            
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search By Place" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        
        </div>
    </div>
      </nav>
      </nav>


      <div class="container my-4">
        <h3 class="text-center">Notes</h3>
        <form action="./index.php" method="post">
           <div class="form-group">
               <label for="username">Note Title</label>
               <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
               
           </div>
           <div class="form-group">
               <label for="text">Note Disription</label>
               <textarea class="form-control" name="description" id="description" cols="12" rows="5"></textarea>
           </div>
          
            
           <button type="submit" class="btn btn-primary">Submit</button>
        </form>
       </div>

       <div class="container">
        
          



       
        <table class="table">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>title</th>
              <th>description</th>
              <th>actions</th>

          </tr>
        </thead>
        <tbody>
        <?php 
        
        
        
        $sql = "SELECT * FROM `notes`";
        $result = mysqli_query($conn, $sql);
        while($raw = mysqli_fetch_assoc($result)){
          //echo $raw["sr_no"]."title".$raw["title"]."<br>".$raw["description"];
          //INSERT INTO `notes` (`sr_no`, `title`, `description`, `time`)
          // VALUES (NULL, 'what', 'whats your name', current_timestamp());



          echo "<tr>
          <th scope 'row'>".$raw["sr_no"]."</th>
          <td>".$raw["title"]."</td>
          <td>".$raw["description"]."</td>
          <td><button type='button' class='btn btn-sm btn-primary'>update</button>
          <button type='button' class='btn btn-sm btn-danger my-2'>delete</button></td>
          </tr>";


        }


        ?>

          
        </tbody>
      
        </table><br><br><br>




       </div>
   
</body>
</html>