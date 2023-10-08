<?php
session_start();
if (isset($_POST['pincode'])) {
    include '../connection.php';
    $pincode = $_POST['pincode'];
    $sql = "SELECT * FROM `pincode` WHERE `pincode`='$pincode'";
    $res = mysqli_query($con, $sql);
    
    if ($res) {
        $cnt = mysqli_num_rows($res);
        if (!$cnt > 0) {
            $_SESSION['pincode'] = 1;
            header('Content-Type: application/json'); 
            echo json_encode("failed");
        
        } else {
            if(isset($_SESSION['pincode'])){
                unset($_SESSION['pincode']);
            }
            header('Content-Type: application/json'); 
            echo json_encode("success");
        
        }
}
}
?>