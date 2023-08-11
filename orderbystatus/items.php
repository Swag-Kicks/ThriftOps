<?php

include_once("../include/mysql_connection.php");

if(isset($_POST['id']))
{
    $id=$_POST['id'];
    $records2 = "SELECT * FROM `Order` WHERE Order_ID='$id'"; 
    $result = mysqli_query($mysql, $records2);
    while($row = mysqli_fetch_array($result))
    {
        //items sku
        $records1 = mysqli_query($mysql,"SELECT * FROM addition WHERE SKU='".$row["SKU"]."'"); 
        $data1 = mysqli_fetch_array($records1);
        $img= $data1['Image_1'];
        $title= $data1['Title'];
        $proid= $data1['SKU'];
        
        $input.=" <li>
                    <div class='media'><img class='img-fluid rounded-circle me-3' src='$img' alt=''>
                      <div class='media-body'><a href='../ShopifyPush/viewProduct.php?id=$proid' target='_blank'><span>'".$row["SKU"]."'</span></a>
                        <p class='f-12 light-font'>$title</p>
                      </div>
                      <p class='f-12'>Rs.".$row["Price"]."</p>
                    </div>
                  </li>";
    }
    // $input.="<li class='text-center'> <a class='f-w-700' href='javascript:void(0)'>See All </a></li>";
    echo $input;
}
              ?>