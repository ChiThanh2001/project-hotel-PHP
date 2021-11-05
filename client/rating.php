<?php
require('../db/config.php');

if (isset($_POST['comment'])) {
    $id = $_POST['userId'];
    $contentCmt = $_POST['contentCmt'];
    $rating = $_POST['rating'];

    $insert_cmt = "INSERT into comment(userId,comment,rating) values('$id','$contentCmt','$rating')";
    $success =  mysqli_query($conn, $insert_cmt);
    if($success){
        echo "thành công";
    }
    else{
        echo "thất bại";
    }
   
}
