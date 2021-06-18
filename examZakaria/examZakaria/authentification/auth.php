<?php




$isLoggedIn = false;



            if(isset($_SESSION['userId']) ){
                $isLoggedIn = true;

            }


if($isLoggedIn){
    echo "Logged in";
} else {
    require_once "login.php";
}


?>