<?php
session_start();
require_once("../include/functions.php");
require_once("../include/db.php");
check_login();
require_once("../include/header.php");

?>

<?php
    //set up admin names and cafe using session
    $admin_name=$_SESSION["admin_name"];
    $cafe_name=$_SESSION["cafe_name"];
    $edit_page=true;
?>


<?php
//editing form values 
    if(isset($_POST["submit"])){
        print_r($_POST);
        $max=$_POST["max"];

        $arr=$_SESSION["arr"];
        
        echo "<br>";
        print_r($arr);
       


        print_r($arr['0']);
        $count=1;
        $cnt=0;
        while($count<$max){
            if(!is_even($count)){
                $sql = "UPDATE menu SET price=$_POST[$count] WHERE id=$arr[$cnt]";
                mysqli_query($conn,$sql);
                echo $arr[$cnt];
                
            }else{
                if(!empty($_POST[$count])){   //if checked
                    $sql=" UPDATE menu SET visible ='1' WHERE id ='$arr[$cnt]'; ";
                    if(mysqli_query($conn,$sql)){
                        echo "checked";
                    }else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }//echo "checked";
                    
                }else{
                    $sql=" UPDATE menu SET visible ='0' WHERE id ='$arr[$cnt]'; ";
                    if(mysqli_query($conn,$sql)){
                        echo "unchecked";
                    }else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }//echo "checked";
                    
                }
                $cnt++;
            }
             $count++;   
             echo "<br>";
        }
       //now here done with update 
       
       redirect("admin_view.php");

    }
?>


<?php
    
    require_once("../include/navigation.php");
   
?>
    <div class="row ml-5">
        <a href="add_food.php" class="btn btn-info col-2 mr-5" >Add food</a>
        
        <?php 
                 //$_POST["max"]=$nm; 
                 //array_push($_POST,$nm);
                 //$_POST["arr"]=$arr; 
                 //array_push($_POST,$arr);
                 $_SESSION["arr"]=$arr;
                // print_r($arr[]);
                 
       ?>
       <input type="hidden" name="max" value="<?php echo $nm; ?>">
 
        <input class="btn btn-secondary ml-4 col-2" type="submit" name="submit" value="Update Menu">
    </div>
 </form>

<div class="d-flex mr-4">

    <a href="admin_view.php" class="btn btn-info active ml-auto mb-1" >Back to view page</a>
</div>


    





<?php
require_once("../include/footer.php");
?>