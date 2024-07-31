<?php
session_start();
include('dbconn.php')
?>
<?php
if(!$_SESSION['username']){
    header("Location: login.php");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.2/css/dataTables.dataTables.min.css">
</head>
<style>
        body{
            
            background: rgb(243, 209, 228);
        }
        form{
            width: 100%;
            margin:none;

        }
        form .form .container{
            background: rgba(199, 185, 250, 0.728);

        }
        form .form .container .form1{
            background: white;
            padding-top: 20px;
            padding-left: 10px;
            padding-right:10px;
            text-align: left;
        }
        form .form .container h2{
            background: white;
            color: brown;
            text-align: center;
        }
        form .form .container .form1 table tr td a{
            text-decoration: none;
            background: rgb(0, 255, 8);
            border-radius:4px;
            color:white;
            font-size: 16px;
            margin:5px 5px;
            font-weight:bold;
            padding:10px 20px;

        }
        form .form .container .form1 table{
            text-align: left;
        }
        .nav {
            padding-top:10px;
            padding-bottom:20px;
            background: rgb(127, 17, 230);
            
        }
        .nav .container{
            display:flex;
            justify-content:space-between;
        }
        .nav .container ul{
            display: flex;
            justify-content: space-between;
            color:white ;
            align-items:center;


        }
        .nav .container ul li{
            list-style:none;
        }
        .nav .container ul li a{
            text-decoration:none;
            color:white;
            background:rgb(86, 10, 158);
            padding: 28px 30px;


        }
        .nav .container ul li a:hover{
            background: whitesmoke;
            color: rgb(96, 88, 10);
        }
        .nav .container .user h3{
            font-size:28px;
        }
    </style>
<body>
    <?php
    // include_once('index.php');
    ?>
    <div class="nav">
        <div class="container">
            <div class="user">
                    <h3>Welcome <small style="color:rgb(96, 88, 10); font-style:italic;"><?php echo $_SESSION['username'];?></small> </h3>
                </div>
                <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="">users</a></li>
                    <li><a href="Dashboard.php">students</a></li>
                    <li><a href="">Teachers</a></li>
                    <li><a href="">Workers</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
       </div>    </div>
    </div>
<form action="" method="post">
    <div class="form">
        <div class="container">
            <div class="form1">
                <table class="table" id="myTable">
                    <thead>
                      <tr class="tr">
                          <th>StudentID</th>
                          <th>Student name</th>
                          <th>Sex</th>
                          <th>Mother</th>
                          <th>Classname</th>
                          <th>Address</th>
                          <th>Amount</th>
                          <th>Update</th>
                          <th>Delete</th>
                      </tr>
                
                  </thead> 
                  <tbody>
                    <?php
                    include_once('dbconn.php');
                    $sqlistm = "SELECT *FROM students";
                    if ($result = mysqli_query($conn, $sqlistm)){
                        if(mysqli_num_rows($result)>0){
                            $i = 0;
                            while($row = mysqli_fetch_array($result)){
                                $i++;
                                ?>
                            <tr>  
                                <td><?php echo $i?></td>
                                <td><?php echo ($row['Studentname'])?></td>
                                <td><?php echo ($row['Sex'])?></td>
                                <td><?php echo ($row['Mother'])?></td>
                                <td><?php echo ($row['Classname'])?></td>
                                <td><?php echo ($row['Address'])?></td>
                                <td><?php echo ($row['Fees'])?></td>
                                <td><a href="updateEmployee.php?id=<?php echo $row['StudentID'];?>">Update</a></td>
                                <td><a href="DeleteStudent.php?id=<?php echo $row ['StudentID'];?>">Delete</a></td>
                
                            </tr>
                            <?php
                            }
                
                        }
                    }
                    ?>
                  </tbody> 
                </table>
            </div>

        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <script src="//cdn.datatables.net/2.1.2/js/dataTables.min.js"></script> 
 <script>
    let table = new DataTable('#myTable');
 </script>  
</body>
</html>