<?php 
    ini_set('display_errors','1');
    // //Initialization
   include_once("mysql.php"); 
error_reporting(0);
   
    //___________________________________________________________________________________________________________________________________________________________________
    //Call category names and queries
    
    // $categoryNameQuery = "SELECT Category as cat ,Query as query FROM Analytics";
    // $analyticsResult = mysqli_query($mysql, $categoryNameQuery);
    // $categoriesArray = array();
    // // Ali
    // $queryArray = array();
    // while($responseRow = mysqli_fetch_assoc($analyticsResult)) 
    // { 
    //     $category = $responseRow['cat'];
    //     $query = $responseRow['query'];
    //     array_push($categoriesArray,$category);
    //     array_push($queryArray,$query);
    // }
    
    
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
    $HoodiesFilled = 0;
    $HoodiePrice= 0;
    $TShirtPrice = 0;
    $BeltsPrice=0;
    $CapsPrice=0;
    $SlippersPrice = 0;
    $SocksPrice = 0;
    $TiesPrice = 0;
    $MufflerPrice = 0;
    $kidsShoesPrice = 0;
    $FormalShoesFilled = 0;
    $HoodiesPrice = 0;
    // $sql = "select * from racks where Status = 'Empty'";
    // $result = mysqli_query($mysql, $sql);
    // while($row = mysqli_fetch_assoc($result)) 
    // { 
    //     $unaloc++;
    // }
    
    // Select shoes.SKU,shoes.Price from shoes inner join racks on shoes.SKU=racks.SKU
    $sql="SELECT racks.Rack_ID ,Listing.Price, racks.Warehouse_ID , racks.Category , racks.number , racks.name , racks.SKU , racks.Status FROM racks LEFT JOIN Listing on racks.SKU = Listing.SKU  "; 
    //$sql = "select * from racks";
    //$sql = "select * from racks where Status = 'Filled'";
    // $sql = "Select shoes.SKU,shoes.Price from shoes inner join racks on shoes.SKU=racks.SKU";
    $result = mysqli_query($mysql, $sql);
    while($row = mysqli_fetch_assoc($result)) 
    { 
        echo "Hi";
        if($row['Status'] == 'Empty')
        {
            $unaloc++;
        }
        $co++;
        // $SKU = $row['SKU'];
        // $check = substr($row['SKU'],0,5);
        // $check4 = substr($row['SKU'],0,4);
        if($row['Category'] == 1)
        {
            $TopsRacks++;
            if($row['SKU'] <> '')
            {
                $TopsCount++;
                $TopsFilled++;
                $TopsPrice = $TopsPrice + $row['Price'];
            }
        }
        if($row['Category'] == 2)
        {
            $BottomsRack++;
            if($row['SKU'] <> '')
            {
                $BottomsCount++;
                $BottomsFilled++;
                $BottomsPrice =  $BottomsPrice + $row['Price'];
            }
        }
        if($row['Category'] == 3)
        {
            $shoesRacks++;
            if($row['SKU'] <> '')
            {
                $ShoeCount++;
                $shoesFilled++;
                $shoesPrice = $shoesPrice + $row['Price'];
                
                
            }
        }
         if($row['Category'] == 5)
        {
            $BeaniesRacks++;
            if($row['SKU'] <> '')
            {
                $BeaniesCount++;
                $BeaniesFilled++;
                $BeaniesPrice = $BeaniesPrice + $row['Price']; 
                
            }
        }
        if($row['Category'] == 6)
        {
            $TShirtRacks++;
            if($row['SKU'] <> '')
            {
                $TShirtCount++;
                $TShirtFilled++;
                $TShirtPrice = $TShirtPrice  + $row['Price'];
            }
        }
        if($row['Category'] == 7)
        {
            $BagsRacks++;
            if($row['SKU'] <> '')
            {
                $BagsCount++;
                $BagsFilled++;
                $BagsPrice = $BagsPrice + $row['Price'];
            }
        }
        if($row['Category'] == 8)
        {
            $HoodieRacks++;
            if($row['SKU'] <> '')
            {
                $HoodieCount++;
                $HoodiesFilled++;
                $HoodiesPrice = $HoodiesPrice + $row["Price"];
            }
        }
        if($row['Category'] == 10)
        {
            $SandalsRacks++;
            if($row['SKU'] <> '')
            {
                $SandalsCount++;
                $SandalsFilled++;
                $SandalsPrice = $SandalsPrice + $row['Price'];
        

            }
        }
         if($row['Category'] == 12)
        {
            $KidsClothesRacks++;
            if($row['SKU'] <> '')
            {
                $KidsClothesCount++;
                $kidsShoesFilled++;
                $KidsClothesPrice = $KidsClothesPrice + $row['Price'];
            }
        }
         if($row['Category'] == 17)
        {
            $KidsShoesRacks++;
            if($row['SKU'] <> '')
            {
                $KidsShoesCount++;
                $kidsShoesFilled++;
                $kidsShoesPrice = $kidsShoesPrice + $row['Price']; 
            }
        }
          if($row['Category'] == 28)
        {
            $SocksRacks++;
            if($row['SKU'] <> '')
            {
                $SocksCount++;
                $SocksFilled++;
                $SocksPrice = $SocksPrice + $row['Price'];
            }
        }
           if($row['Category'] == 36)
        {
            $CapsRacks++;
            if($row['SKU'] <> '')
            {
                $CapsCount++;
                $CapsFilled++;
                $CapsPrice = $CapsPrice + $row['Price'];
            }
        }
            if($row['Category'] == 37)
        {
            $SlippersRacks++;
            if($row['SKU'] <> '')
            {
                $SlippersCount++;
                $SlippersFilled++;
                $SlippersPrice = $SlippersPrice + $row['Price'];
            }
        }
        if($row['Category'] == 40)
        {
            $MufflersRacks++;
            if($row['SKU'] <> '')
            {
                $MufflersCount++;
                $MufflerFilled++;
                $MufflerPrice = $MufflerPrice + $row['Price'];
            }
        }
        if($row['Category'] == 42)
        {
            $TiesRacks++;
            if($row['SKU'] <> '')
            {
                $TiesCount++;
                $TiesFilled++;
                $TiesPrice = $TiesPrice +$row['Price'];
            }
        }
        if($row['Category'] == 60)
        {
            $BeltsRacks++;
            if($row['SKU'] <> '')
            {
                $BeltsCount++;
                $BeltsFilled++;
                $BeltsPrice = $BeltsPrice + $row['Price'];
            }
        }
        if($row['Category'] == 91)
        {
            $FormalShoeRacks++;
            if($row['SKU'] <> '')
            {
                $FormalShoeCount++;
                $FormalShoesFilled++;
                $FormalShoePrice = $FormalShoePrice + $row['Price'];
            }
        }
        
    }
    
   

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
                $shoesPercent = round(($shoesFilled/$shoesRacks)*100);
                $shoeavg = round($shoesPrice/$ShoeCount);
               $TopsPercent = round(($TopsFilled/$TopsRacks)*100);
                $Topsavg = round($TopsPrice/$TopsCount);
                $BottomsPercent= round(($BottomsFilled/$BottomsRack)*100);
                $Bottomsavg =round($BottomsPrice/$BottomsCount);
                $SandalsPercent = round(($SandalsFilled/$SandalsRacks)*100);         // avg = Price/Count
                $Sandalsavg = round($SandalsPrice / $SandalsCount);
                //$BeaniesPercent =round(($B)*100);
                //$Beaniesavg=round(($B));
                $BeaniesPercent=round(($BeaniesFilled/$BeaniesRacks)*100);
                $Beaniesavg = round($BeaniesPrice/$BeaniesCount);
                $BagsPercent = round(($BagsFilled/$BagsRacks)*100);
                $Bagsavg = round($BagsPrice/$BagsCount);

                //$KidsClothesPercent = ($KidsClothesFilled/$KidsClothesRacks)*100;
            //$kidsClothesavg=round($KidsClothesPrice/$KidsClothesCount);
                
                //$HoodiePercent=round(($HoodieFilled/$HoodieRacks)*100);
                //$Hoodieavg=round($HoodiePrice/$HoodieCount);

                $TShirtPercent = round(($TShirtFilled/$TShirtRacks)*100);
                $TShirtavg = round($TShirtPrice/$TShirtRacks);
                $BeltsPercent=round(($BeltsFilled/$BeltsRacks)*100);                                // $BottomsRack++;  $BottomsFilled++;  $BeltsCount BeltsRacks
                $Beltsavg = round($BeltsPrice/$BeltsCount);

                $CapsPercent = round(($CapsFilled/$CapsRacks)*100);
                $Capsavg = round($CapsPrice/$CapsCount);

               
                $SocksPercent = round(($SocksFilled/$SocksRacks)*100);
                $Socksavg = round($SocksPrice/$SocksCount);   

                $SlippersPercent = round(($SlippersFilled/$SlippersRacks)*100);
                $Slippersavg = round($SlippersPrice/$SlippersCount);

                $MufflerPercent = round(($MufflerFilled/$MufflerRacks)*100);
                $Muffleravg  = round($MufflerPrice/$MufflersCount);

                $TiesPercent = round(($TiesFilled/$TiesRacks)*100);
                $Tiesavg = round($TiesPrice/$TiesCount);
                    
                $FormalShoePercent = round(($FormalShoeFilled/$FormalShoeRack)*100);               //  //$FormalShoeRacks FormalShoeCount
                $FormalShoeavg=round($FormalShoePrice/$FormalShoeCount);
                $kidsShoesPercent=round(($kidsShoesFilled/$KidsShoesRacks)*100);
                $kidsShoesavg = round($kidsShoesPrice/$KidsShoesCount);

                $HoodiePercent = round(($HoodieFilled/$HoodieRacks)*100); 
                $Hoodieavg = round($HoodiePrice/$HoodieCount);
                $KidsClothesPercent=round(($KidsClothesFilled/$KidsClothesRacks)*100);                // //$KidsClothesRacks $KidsClothesCount
                $KidsClothesavg=round($KidsClothesPrice/$KidsClothesCount);

                echo  $tableHead = "
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
                            <td>$shoesPercent</td>
                            <td>$shoeavg</td>
                            <td>$shoesPrice</td>
                        </tr>
                        <tr>
                            <td>Bags</td>
                            <td>$BagsCount</td>
                            <td>$BagsRacks</td>
                            <td>$bagsDifference</td>
                            <td>$BagsPercent</td>
                            <td>$Bagsavg</td>
                            <td>$BagsPrice</td>
                        </tr>
                         <tr>
                            <td>Beanies</td>
                            <td>$BeaniesCount</td>
                            <td>$BeaniesRacks</td>
                            <td>$BeaniesDifference</td>
                            <td>$BeaniesPercent</td>
                            <td>$Beaniesavg</td>
                            <td>$BeaniesPrice</td>
                        </tr>
                        <tr>
                            <td>Belts</td>
                            <td>$BeltsCount</td>
                            <td>$BeltsRacks</td>
                            <td>$BeltsDifference</td>
                            <td>$BeltsPercent</td>
                            <td>$Beltsavg</td>
                            <td>$BeltsPrice</td>
                        </tr>
                        <tr>
                            <td>Bottoms</td>
                            <td>$BottomsCount</td>
                            <td>$BottomsRack</td>
                            <td>$BottomsDifference</td>
                            <td>$BottomsPercent</td>
                            <td>$Bottomsavg</td>
                            <td>$BottomsPrice</td>
                        </tr>
                         <tr>
                            <td>Caps</td>
                            <td>$CapsCount</td>
                            <td>$CapsRacks</td>
                            <td>$CapsDifference</td>
                            <td>$CapsPercent</td>
                            <td>$Capsavg</td>
                            <td>$CapsPrice</td>
                        </tr>
                        <tr>
                            <td>Formal Shoes</td>
                            <td>$FormalShoeCount</td>
                            <td>$FormalShoeRacks</td>
                            <td>$FormalShoeDifference</td>
                            <td>$FormalShoePercent</td>
                            <td>$FormalShoeavg</td>
                            <td>$FormalShoePrice</td>
                        </tr>
                        <tr>
                            <td>Hoodies</td>
                            <td>$HoodieCount</td>
                            <td>$HoodieRacks</td>
                            <td>$HoodiesDifference</td>
                            <td>$HoodiePercent</td>
                            <td>$Hoodieavg</td>
                            <td>$HoodiesPrice </td>
                        </tr>
                        <tr>
                            <td>Kids Shoes</td>
                            <td>$KidsShoesCount</td>
                            <td>$KidsShoesRacks</td>
                            <td>$KidsShoesDifference</td>
                            <td>$kidsShoesPercent</td>
                            <td> $kidsShoesavg </td>
                            <td>$kidsShoesPrice</td>
                        </tr>
                        <tr>
                            <td>Kids Clothes</td>
                            <td>$KidsClothesCount</td>
                            <td>$KidsClothesRacks</td>
                            <td>$KidsClothesDifference</td>
                            <td>$KidsClothesPercent</td>
                            <td>$KidsClothesavg</td>
                            <td>$KidsClothesPrice</td>
                        </tr>
                        <tr>
                            <td>Muffler</td>
                            <td>$MufflersCount</td>
                            <td>$MufflersRacks</td>
                            <td>$MufflersDifference</td>
                            <td>$MufflerPercent</td>
                            <td>$Muffleravg</td>
                            <td>$MufflerPrice</td>
                        </tr>
                        <tr>
                            <td>Socks</td>
                            <td>$SocksCount</td>
                            <td>$SocksRacks</td>
                            <td>$SocksDifference</td>
                            <td>$SocksPercent</td>
                            <td>$Socksavg</td>
                            <td>$SocksPrice</td>
                        </tr>
                        <tr>
                            <td>Slippers</td>
                            <td>$SlippersCount</td>
                            <td>$SlippersRacks</td>
                            <td>$SlippersDifference</td>
                            <td>$SlippersPercent</td>
                            <td>$Slippersavg</td>
                            <td>$SlippersPrice</td>
                        </tr>
                        <tr>
                            <td>Sandals</td>
                            <td>$SandalsCount</td>
                            <td>$SandalsRacks</td>
                            <td>$SandalsDifference</td>
                            <td>$SandalsPercent</td>
                            <td>$Sandalsavg</td>
                            <td>$SandalsPrice</td>
                        </tr>
                        <tr>
                            <td>Ties</td>
                            <td>$TiesCount</td>
                            <td>$TiesRacks</td>
                            <td>$TiesDifference</td>
                            <td>$TiesPercent</td>
                            <td>$Tiesavg</td>
                            <td>$TiesPrice</td>
                        </tr>
                        <tr>
                            <td>Tops</td>
                            <td>$TopsCount</td>
                            <td>$TopsRacks</td>
                            <td>$TopsDifference</td>
                            <td>$TopsPercent</td>
                            <td>$Topsavg</td>
                            <td>$TopsPrice</td>
                            
                
                        </tr>
                        <tr>
                            <td>TShirts</td>
                            <td>$TShirtCount</td>
                            <td>$TShirtRacks</td>
                            <td>$TShirtsDifference</td>
                            <td>$TShirtPercent</td>
                            <td>$TShirtavg</td>
                            <td>$TShirtPrice</td>
                        </tr>";
        //     for ($x = 0; $x < count($categoriesArray); $x++) 
        //     {
        //         - = number_format(round($arrSum[$x]/-));
        //         $totalSum = $totalSum + $arrSum[$x];
        //         $totalTotal = $totalTotal + -;
        //         $num_rev = number_format($arrSum[$x]);
        //         echo $e="
    				//     <tr>
        //                     <td>$categoriesArray[$x]</td>
        //                     <td>$num_rev</td>
        //                     <td>-</td>
        //                     <td>-</td>
        //                 </tr>";
    	   // }
    	   // $totalAvg = number_format(round($totalSum/$totalTotal));
    	    
    	   // $totalSum = number_format($totalSum);
    	    echo $tableEnd = "
    	               
    	            </table>";
    	           //  <tr>
                //             <td><b>Total</b></td>
                //             <td><b>$co</b></td>
                //             <td><b>-</b></td>
                //             <td><b>-</b></td>
                //         </tr>
    ?> 
          </table>
        </div>
      </div>
    </div>
  </div>
</form>

</body>
</html>