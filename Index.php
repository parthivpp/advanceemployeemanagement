<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <?php 
       session_start();
        if(isset($_SESSION['role'])){
            if($_SESSION["role"] == "Employee"){
                header("location:./Employee/Index.php");
            }
            if($_SESSION["role"] == "HR"){
                header("location:./HR/Index.php");
            }
        }
        
     ?>
    <section>
        <h2>Login</h2>
        <div class="main">
            <?php
                $Email = "";
                $password = "";
                if(isset($_POST["submit"])){
                    if(isset($_POST["Email"]) && $_POST["Email"] == ""){
                        $Email = "Enter Email";
                    }
                    if(isset($_POST["Password"]) && $_POST["Password"] == ""){
                        $password = "Enter Password";
                    }
                     
                     $conn = new PDO('mysql:host=localhost;dbname=employeemanagementsystem',"root","");
                     try{
                        $conn = new PDO('mysql:host=localhost;dbname=employeemanagementsystem',"root","");
                        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    }
                    catch(PDOException $p){
                        
                        echo $p;
                        
                    }
                    $query = 'Select * from users where email = "'.$_POST["Email"].'" and password = "'.$_POST["Password"].'"';
                    $stmt =$conn->prepare($query);
                    $result = $stmt->execute();
                    if($stmt->rowCount() > 0){
                        if(!isset($_SESSION["role"]) && !isset($_SESSION["email"])){
                            foreach($stmt as $row){
                                $_SESSION["id"] = $row["Id"];
                                $_SESSION["email"] = $row["email"];
                                $_SESSION["role"] = $row["typeofuser"];
                                if($_SESSION["role"] == "Employee"){
                                    header("location:./Employee/Index.php");
                                }
                                if($_SESSION["role"] == "HR"){
                                    header("location:./HR/Index.php");
                                }
                            }    
                        }
                        
                    }
                    
                    
                }
            ?>
            <form action="" method="Post" >
                <div class="form-group">
                        <label for="" >Email</label>
                        <input type="email" name="Email" class="form-control" value="<?php echo isset($_POST['Email']) ? $_POST['Email']:"" ?>" >
                        <span><?php echo $Email ?></span>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="Password" class="form-control">
                    <span><?php echo $password ?></span>
                </div>
                <button type="submit" name="submit" class="btn">Submit</button>
            </form>
        </div>
    </section>
</body>
</html>