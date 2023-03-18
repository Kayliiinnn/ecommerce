<?php
include_once "dblecture_conn.php";


if(isset($_POST['u_itemid'])){
    $table = "products";
    
    $p_item_id  = $_POST['u_itemid'];
    $p_item_name = $_POST['u_itemname'];
    $p_item_price = $_POST['u_itemprice'];
    
    
    $fields = array( 'item_name' => $p_item_name
                   , 'item_price' => $p_item_price
                   );
    $filter = array( 'item_id' => $p_item_id );

    
    
   
   if( update($conn, $table, $fields, $filter )){
       header("location: index.php?update_status=success");
       exit();
   }
    else{
        header("location: index.php?update_status=failed");
        exit();
    }
 }
?>