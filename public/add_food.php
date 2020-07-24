<?php
session_start();
require_once("../include/functions.php");
require_once("../include/db.php");
check_login();
require_once("../include/header.php");

?>

<?php
$cafe_name=$_SESSION["cafe_name"];

?>

<div class="d-flex mr-4">
    <a href="index.php" class="btn btn-info active ml-auto mb-1" >Back to home as visitor</a>
</div>

<div class="container  ">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card bg-primary text-center ">
            <div class="card-body">
                <h3>Add another food to your menu</h3>
                <p>Please fill in the spaces</p>
                <form action="add_food.php" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="food_name" type="text" placeholder="Food Name">
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="food_price" type="number" placeholder="Food Price">
                    </div>
                    <input class="btn btn-secondary" type="submit" name="submit" value="Add food">
                </form>

                <?php
                if(isset($_POST["submit"])){
                    $food_name=$_POST["food_name"];
                    $food_price=$_POST["food_price"];
                    //check no errors in filling
                    if( empty($food_name) || empty($food_price)){
                        ?>
                        <p class="display-6 text-warning">Please fill all the space above</p>
                        
                        <?php
                    }else{
                        $sql = "INSERT INTO menu (food, price, cafe_name)
VALUES ('$food_name', '$food_price', '$cafe_name')";
                            mysqli_query($conn, $sql);
                           
                            redirect("edit_menu.php");
                           

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