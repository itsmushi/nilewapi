<?php
session_start();
require_once("../include/functions.php");
require_once("../include/db.php");

require_once("../include/header.php");

?>

<?php
    //set up admin names and cafe using session
    $admin_name=$_SESSION["admin_name"];
    $cafe_name=$_SESSION["cafe_name"];
?>


<?php
    require_once("../include/navigation.php");
?>

<div class="d-flex mr-4">
    <a href="edit_menu.php" class="btn btn-info active ml-auto mb-1" >Edit the menu</a>
</div>





<?php
require_once("../include/footer.php");
?>