<?php
session_start();
require_once("../include/functions.php");
require_once("../include/db.php");
require_once("../include/header.php");

?>



<div class="d-flex mr-4">
    <a href="index.php" class="btn btn-info active ml-auto mb-1" >Back to home as visitor</a>
</div>

<div class="container  ">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card bg-primary text-center ">
            <div class="card-body">
                <h3>Sign in as an Admin</h3>
                <p>Please fill in the spaces</p>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" type="text" placeholder="Username">
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" placeholder="Password">
                    </div>
                    <input type="submit" name="submit" value="login">
                </form>

                <?php
                if(isset($_POST["submit"])){
                    $username=$_POST["username"];
                    $password=$_POST["password"];
                    //check no errors in filling
                    if( empty($username) || empty($password)){
                        ?>
                        <p class="display-6 text-warning">Please fill all the space above</p>
                        
                        <?php
                    }else{
                        $cafe_name=authenticate_user($username,$password);
                        if($cafe_name){
                            $_SESSION["admin_name"]=$username;
                            $_SESSION["cafe_name"]=$cafe_name;
                            
                           
                            redirect("admin_view.php");
                           

                        }else
                            echo "username/password not correct!";

                        
                    }
                }

                ?>
            </div>
    </div>
        </div>
    </div>
    
</div>

<h3>this is the footer</h3>
<?php
mysqli_close($conn)
?>
</body>
</html>