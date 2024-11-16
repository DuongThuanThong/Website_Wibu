<?php
    include ("/Z.Xampp-PHP/xampp/htdocs/_DoAnWeb/components/connect.php");
    function getMoreProduct($sanpham, $conn){
        $product = "SELECT * FROM `$sanpham`";
        $result = $conn->query($product);
        return $result;
    }


?>