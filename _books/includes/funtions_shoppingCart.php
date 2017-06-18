<?php

  function remove_product($ISBN){

    $ISBN=intval($ISBN);
    $max=count($_SESSION['cart']);

    for($i=0;$i<$max;$i++){
      if($ISBN==$_SESSION['cart'][$i]['productid']){
        unset($_SESSION['cart'][$i]);
        break;
      }
    }
    
    $_SESSION['cart']=array_values($_SESSION['cart']);
  }

?>
