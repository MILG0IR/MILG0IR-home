<?
    include_once("./db/db_conx.php");
    if($user_ok) {
        header("location: ".$mg_dir['root']."home.php");
    } else {
        header("location: ".$mg_dir['root']."login.php");
    }
?>