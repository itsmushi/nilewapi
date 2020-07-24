<?php
require_once("../include/functions.php");
require_once("../include/db.php");

require_once("../include/header.php");

?>
<div class="d-flex mr-4">
    <a href="login.php" class="btn btn-primary active ml-auto mb-1" >Login</a>
</div>

<?php


if( isset( $_GET["cafe"] ) ){
    $cafe_name=$_GET["cafe"];
}

    require_once("../include/navigation.php");
?>





<?php
require_once("../include/footer.php");
?>