<?php
    $id = $_POST['id'];
    include 'ad.php';
    $ad= new Ad();
    $ad->addOne($id);
echo "kashyapa";