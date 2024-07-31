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
    <title>Form_register</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
        body{
            
            background: rgb(243, 209, 228);
        }
        form{

        }
        form .form .container{
            background: rgba(199, 185, 250, 0.728);
        }
        form .form .container .form1{
            background: white;
            padding-top: 20px;
            padding-left: 10px;
            padding-right:10px;
        }
        form .form .container h2{
            background: white;
            color: brown;
            text-align: center;
        }
        form .form .container .form1 table tr td a{
            text-decoration: none;
            background: blue;
            border-radius:4px;
            color:white;
            font-size: 16px;
            margin:5px 5px;
            font-weight:bold;

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
    <form method="POST" action="">

    <?php
        include_once('dbconn.php');
        $id = $_GET['id'];
        $sqlistm = "SELECT *FROM students WHERE StudentID = $id";
        $result = mysqli_query($conn, $sqlistm);
        while($row = mysqli_fetch_array($result))
        {
            ?>
            

        <div class="form">
            <div class="container">
                <h2>Student Registeration</h2> 
                <div class="row">
                    <div class="col">
                        <label for="">Studentname:</label> <br>

                        <input type="text" name="studentname" value="<?php echo $row['Studentname']?>"> <br>
                        <label for="">Mother:</label> <br>
                        <input type="text" name="mother" id="" value="<?php echo $row['Mother']?>"> <br>
                        <label for="">Classname:</label> <br>
                        <select name="classname" id=""  placeholder="Gender" ><br>
                            <option value="<?php echo $row['Classname']?>" selected>
                                <?php echo $row['Classname']?>
                            </option>
                            <option value="form1">form1</option>
                            <option value="form2">form2</option>
                            <option value="form3">form3</option>
                            <option value="form4">form4</option>
                            <option value="form5">form5</option>
                            <option value="form6">form6</option>
                            <option value="form8">form8</option>
                        </select>


                    </div>
                    <div class="col">
                        <label for="">Sex:</label> <br>
                        <select name="sex" id="" placeholder="Gender"><br>
                            <option value="<?php echo $row['Sex']?>" selected><?php echo $row['Sex']?></option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                        <label for="">Address:</label> <br>
                        <input type="text" name="address" id="" value="<?php echo $row['Address']?>"> <br>
                        <label for="">Fees:</label> <br>
                        <input type="Text" name="fees" id="" placeholder="Enter amount" value="<?php echo $row['Fees']?>"> <br>
                    </div>
                </div>
                <?php }?>
                <button type="submit" name="save">Update</button>
                <!-- <div class="form1">
                    <table class="table" border="1px">
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
                                while($row = mysqli_fetch_array($result)){?>
                                <tr>  
                                    <td><?php echo ($row['StudentID'])?></td>
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
                </div> -->
                
            </div>
        </div>
    </form>
    <?php
    if(isset($_POST['save'])){
        include_once('dbconn.php');
        
        // Create variables
        
        $studentname = $_POST['studentname'];
        // $studentname = mysqli_real_escape_string($conn,$_POST['studentname']);
        $sex = mysqli_real_escape_string($conn,$_POST['sex']);
        $mother = mysqli_real_escape_string($conn,$_POST['mother']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        $classname = mysqli_real_escape_string($conn,$_POST['classname']);
        $fees = mysqli_real_escape_string($conn,$_POST['fees']);

        $sqlistm ="UPDATE students SET studentname = '$studentname', Sex = '$sex', Mother = '$mother', Address = '$address', Classname = '$classname', Fees ='$fees' WHERE StudentID = '$id'";
        if(mysqli_query($conn, $sqlistm)){
            echo("<script>alert('student  has been Updated thanks')</script>");
            header("Location: Dashboard.php");
        }else{
            echo("<script>alert('ERROR: there is an error')</script>").mysqli_error($conn);
            header("Location: index.php");
        }
        mysqli_close($conn);
    
    }




    ?>

    
</body>
</html>