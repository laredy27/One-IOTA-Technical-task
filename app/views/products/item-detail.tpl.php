<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
?>
<div class="item-details" style="clear: both">
    <h3> <?php echo $product->name ?> </h3>
    <img src="<?php echo $product->mainImage ?>" style="float: none" width="250px;" />
    <ul style="float: right; width: 800px;" >
        <?php foreach ( $product as $key => $value ): 
            if(is_array($value) ){
                $value = implode(' , ', $value);
            }else if(is_object($value) && $key == "price" ) {
                $value = str_replace("GBP", "£", $value->currency. " " .$value->amount);
            } else if( $key == "mainImage" || $key == "id" ){
                continue;
            }
        ?>

        <li> <?php echo ucfirst($key);  ?> : <?php echo $value ?> </li>
        <?php endforeach; ?>
        
        
    </ul>
    <div class="clear"></div>
</div>

