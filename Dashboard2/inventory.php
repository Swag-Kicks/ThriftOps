<?php 
    
    //Initialization
    session_start();
    include_once("mysql.php"); 
    error_reporting(0);
    
    $co = 0;
    $shoeamount = 0;
    $ShoeCount = 0;
    $BeaniesCount = 0;
    $BeaniesRacks = 0;
    $BagsCount = 0;
    $BagsRacks = 0;
    $BeltsCount = 0;
    $BeltsRacks = 0;
    $BottomsCount = 0;
    $BottomsRack = 0;
    $FrocksCount = 0;
    $FormalShoeCount = 0;
    $FormalShoeRack = 0;
    $HighNeckCount = 0;
    $KidsShoesCount = 0;
    $KidsShoesRacks = 0;
    $KidsClothesCount = 0;
    $KidsClothesRacks = 0;
    $LeatherbootsCount = 0;
    $ShirtsCount = 0;
    $SlippersCount = 0;
    $SlippersRacks = 0;
    $SandalsCount = 0;
    $SandalsRacks = 0;
    $SweaterCount = 0;
    $TiesCount = 0;
    $TiesRacks = 0;
    $TopsCount = 0;
    $TopsRacks = 0;
    $TShirtCount = 0;
    $TShirtRacks = 0;
    $HoodieCount = 0;
    $HoodieRacks= 0;
    $MufflerCount = 0;
    $SocksCount = 0;
    $SocksRacks = 0;
    $unaloc = 0;
    $shoesRacks = 0;
    $shoesFilled = 0;
    $shoesPrice = 0;
    $beltsPrice = 0;
    $beaniesPrice = 0;
    $formalPrice = 0;
    
    $sql = "select * from racks";
    //$sql = "Select racks.SKU, racks.Category, racks.Status, Listing.Price from racks left join Listing on racks.SKU = Listing.SKU";
    //$sql = "Select racks.SKU, racks.Category, racks.Status from racks";
    $result = mysqli_query($mysql, $sql);
    while($row = mysqli_fetch_assoc($result)) 
    { 
        // echo $row['Status'];
        if($row['Status'] == 'Empty')
        {
            $unaloc++;
        }
        $co++;
        if($row['Category'] == 1)
        {
            $TopsRacks++;
            if($row['SKU'] <> '')
            {
                $TopsCount++;
            }
        }
        if($row['Category'] == 2)
        {
            $BottomsRack++;
            if($row['SKU'] <> '')
            {
                $BottomsCount++;
            }
        }
        if($row['Category'] == 3)
        {
            
            $shoesRacks++;
            if($row['SKU'] <> '')
            {
                $ShoeCount++;
                $shoesFilled++;
                // $sqlPrice = "Select * from Listing where Listing.SKU='".$row["SKU"]."'";
                // $resultPrice = mysqli_query($mysql, $sqlPrice);
                // $rowPrice = mysqli_fetch_assoc($resultPrice);
                // $shoesPrice = $rowPrice['Price'] + $shoesPrice;
            }
        }
         if($row['Category'] == 5)
        {
            $BeaniesRacks++;
            if($row['SKU'] <> '')
            {
                $BeaniesCount++;
                $sqlPrice = "Select * from Listing where Listing.SKU='".$row["SKU"]."'";
                $resultPrice = mysqli_query($mysql, $sqlPrice);
                $rowPrice = mysqli_fetch_assoc($resultPrice);
                $beaniesPrice = $rowPrice['Cost'] + $beaniesPrice;
            }
        }
        if($row['Category'] == 6)
        {
            $TShirtRacks++;
            if($row['SKU'] <> '')
            {
                $TShirtCount++;
            }
        }
        if($row['Category'] == 7)
        {
            $BagsRacks++;
            if($row['SKU'] <> '')
            {
                $BagsCount++;
            }
        }
        if($row['Category'] == 8)
        {
            $HoodieRacks++;
            if($row['SKU'] <> '')
            {
                $HoodieCount++;
            }
        }
        if($row['Category'] == 10)
        {
            $SandalsRacks++;
            if($row['SKU'] <> '')
            {
                $SandalsCount++;
            }
        }
         if($row['Category'] == 12)
        {
            $KidsClothesRacks++;
            if($row['SKU'] <> '')
            {
                $KidsClothesCount++;
            }
        }
         if($row['Category'] == 17)
        {
            $KidsShoesRacks++;
            if($row['SKU'] <> '')
            {
                $KidsShoesCount++;
            }
        }
          if($row['Category'] == 28)
        {
            $SocksRacks++;
            if($row['SKU'] <> '')
            {
                $SocksCount++;
            }
        }
           if($row['Category'] == 36)
        {
            $CapsRacks++;
            if($row['SKU'] <> '')
            {
                $CapsCount++;
            }
        }
            if($row['Category'] == 37)
        {
            $SlippersRacks++;
            if($row['SKU'] <> '')
            {
                $SlippersCount++;
            }
        }
        if($row['Category'] == 40)
        {
            $MufflersRacks++;
            if($row['SKU'] <> '')
            {
                $MufflersCount++;
            }
        }
        if($row['Category'] == 42)
        {
            $TiesRacks++;
            if($row['SKU'] <> '')
            {
                $TiesCount++;
            }
        }
        if($row['Category'] == 60)
        {
            
            $BeltsRacks++;
            if($row['SKU'] <> '')
            {
                $sqlPrice = "Select * from Listing where Listing.SKU='".$row["SKU"]."'";
                $resultPrice = mysqli_query($mysql, $sqlPrice);
                $rowPrice = mysqli_fetch_assoc($resultPrice);
                $BeltsCount++;
                $beltsPrice = $rowPrice['Cost'] + $beltsPrice;
            }
        }
        if($row['Category'] == 91)
        {
            $FormalShoeRacks++;
            if($row['SKU'] <> '')
            {
                $FormalShoeCount++;
                $resultPrice = mysqli_query($mysql, $sqlPrice);
                $rowPrice = mysqli_fetch_assoc($resultPrice);
                $BeltsCount++;
                $formalPrice = $rowPrice['Cost'] + $formalPrice;
            }
        }
    }
    
    include ("../include/header.php"); 

?> 
<html>
<body>
     <formclass="PR">

  <h1 style="margin-left: 376px;top: 32px;position: relative;">Warehouse Items Report</h1>
  <div class="row">
    <div class="col-md-12">
      <label>
        <b>Unallocated Racks</b>: <?php echo $unaloc ?></label>
      <br>
      <br>
      <br>
      <div class="e-table">
        <div class="table-responsive table-lg">
            <?php
                $shoeDifference  = $shoesRacks - $ShoeCount;
                $bagsDifference  = $BagsRacks - $BagsCount;
                $BeaniesDifference  = $BeaniesRacks - $BeaniesCount; 
                $BeltsDifference  = $BeltsRacks - $BeltsCount; 
                $BottomsDifference  = $BottomsRack - $BottomsCount; 
                $CapsDifference  = $CapsRacks - $CapsCount; 
                $FormalShoeDifference  = $FormalShoeRacks - $FormalShoeCount; 
                $HoodiesDifference  = $HoodieRacks - $HoodieCount; 
                $KidsClothesDifference  = $KidsClothesRacks - $KidsClothesCount; 
                $KidsShoesDifference  = $KidsShoesRacks - $KidsShoesCount; 
                $MufflersDifference  = $MufflersRacks - $MufflersCount; 
                $SocksDifference  = $SocksRacks - $SocksCount; 
                $SlippersDifference  = $SlippersRacks - $SlippersCount; 
                $SandalsDifference  = $SandalsRacks - $SandalsCount; 
                $TiesDifference  = $TiesRacks - $TiesCount; 
                $TopsDifference  = $TopsRacks - $TopsCount; 
                $TShirtsDifference  = $TShirtRacks - $TShirtCount; 
                $sneakersPercent = ($shoesFilled/$shoesRacks)*100;
                
                echo $tableHead = "
                    <table class='table table-bordered' id='crud_table'>
                        <tr>
                            <th>Category</th>
                            <th>Items in WH</th>
                            <th>Total Space</th>
                            <th>Space Available</th>
                            <th>%age utilized</th>
                            <th>Avg Item Value</th>
                            <th>Category Value</th>
                        </tr>
                         <tr>
                            <td>Shoes</td>
                            <td>$ShoeCount</td>
                            <td>$shoesRacks</td>
                            <td>$shoeDifference</td>
                            <td>$sneakersPercent</td>
                            <td>$shoeamount</td>
                            <td>$shoesPrice</td>
                        </tr>
                        <tr>
                            <td>Bags</td>
                            <td>$BagsCount</td>
                            <td>$BagsRacks</td>
                            <td>$bagsDifference</td>
                            <td></td>
                            <td></td>
                            <td>Huehuehue</td>
                        </tr>
                         <tr>
                            <td>Beanies</td>
                            <td>$BeaniesCount</td>
                            <td>$BeaniesRacks</td>
                            <td>$BeaniesDifference</td>
                            <td></td>
                            <td></td>
                            <td>$beaniesPrice</td>
                        </tr>
                        <tr>
                            <td>Belts</td>
                            <td>$BeltsCount</td>
                            <td>$BeltsRacks</td>
                            <td>$BeltsDifference</td>
                            <td></td>
                            <td></td>
                            <td>$beltsPrice</td>
                        </tr>
                        <tr>
                            <td>Bottoms</td>
                            <td>$BottomsCount</td>
                            <td>$BottomsRack</td>
                            <td>$BottomsDifference</td>
                        </tr>
                         <tr>
                            <td>Caps</td>
                            <td>$CapsCount</td>
                            <td>$CapsRacks</td>
                            <td>$CapsDifference</td>
                        </tr>
                        <tr>
                            <td>Formal Shoes</td>
                            <td>$FormalShoeCount</td>
                            <td>$FormalShoeRacks</td>
                            <td>$FormalShoeDifference</td>
                            <td></td>
                            <td></td>
                            <td>$formalPrice</td>
                        </tr>
                        <tr>
                            <td>Hoodies</td>
                            <td>$HoodieCount</td>
                            <td>$HoodieRacks</td>
                            <td>$HoodiesDifference</td>
                        </tr>
                        <tr>
                            <td>Kids Shoes</td>
                            <td>$KidsShoesCount</td>
                            <td>$KidsShoesRacks</td>
                            <td>$KidsShoesDifference</td>
                        </tr>
                        <tr>
                            <td>Kids Clothes</td>
                            <td>$KidsClothesCount</td>
                            <td>$KidsClothesRacks</td>
                            <td>$KidsClothesDifference</td>
                        </tr>
                        <tr>
                            <td>Muffler</td>
                            <td>$MufflersCount</td>
                            <td>$MufflersRacks</td>
                            <td>$MufflersDifference</td>
                        </tr>
                        <tr>
                            <td>Socks</td>
                            <td>$SocksCount</td>
                            <td>$SocksRacks</td>
                            <td>$SocksDifference</td>
                        </tr>
                        <tr>
                            <td>Slippers</td>
                            <td>$SlippersCount</td>
                            <td>$SlippersRacks</td>
                            <td>$SlippersDifference</td>
                        </tr>
                        <tr>
                            <td>Sandals</td>
                            <td>$SandalsCount</td>
                            <td>$SandalsRacks</td>
                            <td>$SandalsDifference</td>
                        </tr>
                        <tr>
                            <td>Ties</td>
                            <td>$TiesCount</td>
                            <td>$TiesRacks</td>
                            <td>$TiesDifference</td>
                        </tr>
                        <tr>
                            <td>Tops</td>
                            <td>$TopsCount</td>
                            <td>$TopsRacks</td>
                            <td>$TopsDifference</td>
                        </tr>
                        <tr>
                            <td>TShirts</td>
                            <td>$TShirtCount</td>
                            <td>$TShirtRacks</td>
                            <td>$TShirtsDifference</td>
                        </tr>";
    	    echo $tableEnd = "
    	               
    	            </table>";
    ?> 
          </table>
        </div>
      </div>
    </div>
  </div>
</form>
<?php include ("../include/footer.php"); ?>
</body>
</html>