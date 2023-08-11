<?php

session_start();
include_once("../include/mysql_connection.php"); 
error_reporting(0);
$cr=$_SESSION['Username'];
$year=date('Y');
$year=$year."-";
if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
{
      
}
else
{
    echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
}

    

$sql1 = "SELECT * FROM marketplace WHERE Shop='Ebay'";
$result1 = mysqli_query($mysql, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$Token=$row1['Token'];




$main=$_REQUEST['var1'];
$sql = "SELECT * FROM Ebay WHERE id='$main'";
$result = mysqli_query($mysql, $sql);

while($row = mysqli_fetch_assoc($result)) 
{  
    
    $title = $row['Title'];
    $category =$row['Category_ID'];
    $price =$row['Price'];
    $currency =$row['Currency'];
    $country =$row['Country'];
    $postal=$row['Postal_code'];
    $quantity=$row['Quantity'];
    $condition_id=$row['Cndition'];
    $gender=$row['Gender'];
    echo $gender;
    $size=$row['Size'];
    $type=$row['Type'];
    $material=$row['Material'];
    $brand=$row['Brand'];
    $colour=$row['Colour'];
    $mpn=$row['MPN'];
    $Discription=strip_tags($row['Description']);
    $domestic=$row['Domestic_Courier'];
    $inter=$row['International_Courier'];
    $style=$row['Style'];
    $sizetype=$row['Size_Type'];
    $int_price=$row['International_Charges'];
    $dom_price=$row['Domestic_Charges'];
    $loc=$row['Location'];
    $image1=$row['Image_1'];
    $image2=$row['Image_2'];
    $image3=$row['Image_3'];
    $image4=$row['Image_4'];
    $image5=$row['Image_5'];
   
}

$sql2 = "SELECT * FROM Ebay_Site WHERE Site_ID='$country'";
$result2 = mysqli_query($mysql, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$short=$row2['Country'];


$im1="https://backup.thriftops.com/Ebay/uploads/".$image1;
$im2="https://backup.thriftops.com/Ebay/uploads/".$image2;
$im3="https://backup.thriftops.com/Ebay/uploads/".$image3;
$im4="https://backup.thriftops.com/Ebay/uploads/".$image4;
$im5="https://backup.thriftops.com/Ebay/uploads/".$image5;


if($inter!='' & $int_price!='')
{
    
    $post="<?xml version='1.0' encoding='utf-8'?>
    <AddFixedPriceItemRequest xmlns='urn:ebay:apis:eBLBaseComponents'>    Ag****N
    
    <WarningLevel>High</WarningLevel>
    <Item>
        <Title>$title</Title>
        <Description>$Discription</Description>
        <PrimaryCategory>
          <CategoryID>$category</CategoryID>
        </PrimaryCategory>
        <StartPrice>$price</StartPrice>
        <ConditionID>$condition_id</ConditionID>
        <Country>$short</Country>
        <Currency>$currency</Currency>
        <DispatchTimeMax>1</DispatchTimeMax>
        <ListingDuration>GTC</ListingDuration>
        <ListingType>FixedPriceItem</ListingType>
        <Location>$loc</Location>
        <PictureDetails>
          <PictureURL>$im1</PictureURL>
          <PictureURL>$im2</PictureURL>
          <PictureURL>$im3</PictureURL>
          <PictureURL>$im4</PictureURL>
          <PictureURL>$im5</PictureURL>
        </PictureDetails>
        <PostalCode>$postal</PostalCode>
        <ProductListingDetails>
          <IncludeStockPhotoURL>true</IncludeStockPhotoURL>
          <IncludeeBayProductDetails>true</IncludeeBayProductDetails>
          <UseFirstProduct>true</UseFirstProduct>
          <ReturnSearchResultOnDuplicates>true</ReturnSearchResultOnDuplicates>
        </ProductListingDetails>
         <ItemSpecifics> 
        <NameValueList> 
            <Name>Department</Name>
            <Value>$gender</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Size</Name>
            <Value>$size</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Type</Name>
            <Value>$type</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Material</Name>
            <Value>$material</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Style</Name>
            <Value>$style</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Brand</Name>
            <Value>$brand</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Colour</Name>
            <Value>$colour</Value>
        </NameValueList>
        <NameValueList> 
            <Name>MPN</Name>
            <Value>$mpn</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Size Type</Name>
            <Value>$sizetype</Value>
        </NameValueList>
        </ItemSpecifics>
        <Quantity>$quantity</Quantity>
        <ReturnPolicy>
          <ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption>
          <RefundOption>MoneyBack</RefundOption>
          <ReturnsWithinOption>Days_30</ReturnsWithinOption>
          <ShippingCostPaidByOption>Buyer</ShippingCostPaidByOption>
        </ReturnPolicy>
        <ShippingDetails>
        <ApplyShippingDiscount>false</ApplyShippingDiscount>
        <SalesTax>
          <SalesTaxPercent>0.0</SalesTaxPercent>
          <ShippingIncludedInTax>false</ShippingIncludedInTax>
        </SalesTax>
        <ShippingServiceOptions>
          <ShippingService>$domestic</ShippingService>
          <ShippingServiceCost currencyID='$currency'>$dom_price</ShippingServiceCost>
          <ShippingServicePriority>1</ShippingServicePriority>
          <ExpeditedService>false</ExpeditedService>
          <ShippingTimeMin>2</ShippingTimeMin>
          <ShippingTimeMax>8</ShippingTimeMax>
        </ShippingServiceOptions>
        <InternationalShippingServiceOption>
          <ShippingService>$inter</ShippingService>
          <ShippingServiceCost currencyID='$currency'>$int_price</ShippingServiceCost>
          <ShippingServicePriority>1</ShippingServicePriority>
          <ShipToLocation>Worldwide</ShipToLocation>
        </InternationalShippingServiceOption>
        <ShippingType>Flat</ShippingType>
        <ThirdPartyCheckout>false</ThirdPartyCheckout>
        <ShippingDiscountProfileID>0</ShippingDiscountProfileID>
        <InternationalShippingDiscountProfileID>0</InternationalShippingDiscountProfileID>
        <SellerExcludeShipToLocationsPreference>true</SellerExcludeShipToLocationsPreference>
      </ShippingDetails>
      <ShipToLocations>Worldwide</ShipToLocations>
      
  </Item>
</AddFixedPriceItemRequest>";
    $curl = curl_init();

    
    curl_setopt($curl,CURLOPT_URL ,'https://api.ebay.com/ws/api.dll');
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_ENCODING , '');
    curl_setopt($curl,CURLOPT_MAXREDIRS , 10);
    curl_setopt($curl,CURLOPT_TIMEOUT , 0);
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION , true);
    curl_setopt($curl,CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST , 'POST');
    curl_setopt($curl,CURLOPT_POSTFIELDS ,$post);
    curl_setopt($curl,CURLOPT_HTTPHEADER , array(
        "X-EBAY-API-SITEID: $country",
        "X-EBAY-API-COMPATIBILITY-LEVEL: 967",
        "X-EBAY-API-CALL-NAME: AddFixedPriceItem",
        "X-EBAY-API-IAF-TOKEN: $Token",
        "Content-Type: application/xml"
     ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    //echo $response;
    $result = preg_split('/_R1/', $response);
    $first = explode($year, $result[1], 2);
    $item_id=$item_id=strip_tags($first[0]);
    $sql3 = "Update Ebay SET Ebay_ID='$item_id' WHERE id='$main'";
    $result3 = mysqli_query($mysql, $sql3);
    if($item_id=='')
    {
        echo $item_id;
    }
    else
    {
        echo '<script>alert("Uploaded Successfully");window.location.href="Listing_Ebay.php";</script>';
    }
}

else if($inter=='' & $int_price=='')
{
    $post1="<?xml version='1.0' encoding='utf-8'?>
    <AddFixedPriceItemRequest xmlns='urn:ebay:apis:eBLBaseComponents'>    Ag****N
    
    <WarningLevel>High</WarningLevel>
    <Item>
        <Title>$title</Title>
        <Description>$Discription</Description>
        <PrimaryCategory>
          <CategoryID>$category</CategoryID>
        </PrimaryCategory>
        <StartPrice>$price</StartPrice>
        <ConditionID>$condition_id</ConditionID>
        <Country>$short</Country>
        <Currency>$currency</Currency>
        <DispatchTimeMax>1</DispatchTimeMax>
        <ListingDuration>GTC</ListingDuration>
        <ListingType>FixedPriceItem</ListingType>
        <Location>$loc</Location>
        <PictureDetails>
          <PictureURL>$im1</PictureURL>
          <PictureURL>$im2</PictureURL>
          <PictureURL>$im3</PictureURL>
          <PictureURL>$im4</PictureURL>
          <PictureURL>$im5</PictureURL>
        </PictureDetails>
        <PostalCode>$postal</PostalCode>
        <ProductListingDetails>
          <IncludeStockPhotoURL>true</IncludeStockPhotoURL>
          <IncludeeBayProductDetails>true</IncludeeBayProductDetails>
          <UseFirstProduct>true</UseFirstProduct>
          <ReturnSearchResultOnDuplicates>true</ReturnSearchResultOnDuplicates>
        </ProductListingDetails>
         <ItemSpecifics> 
        <NameValueList> 
            <Name>Department</Name>
            <Value>$gender</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Size</Name>
            <Value>$size</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Type</Name>
            <Value>$type</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Material</Name>
            <Value>$material</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Style</Name>
            <Value>$style</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Brand</Name>
            <Value>$brand</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Colour</Name>
            <Value>$colour</Value>
        </NameValueList>
        <NameValueList> 
            <Name>MPN</Name>
            <Value>$mpn</Value>
        </NameValueList>
        <NameValueList> 
            <Name>Size Type</Name>
            <Value>$sizetype</Value>
        </NameValueList>
        </ItemSpecifics>
        <Quantity>$quantity</Quantity>
        <ReturnPolicy>
          <ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption>
          <RefundOption>MoneyBack</RefundOption>
          <ReturnsWithinOption>Days_30</ReturnsWithinOption>
          <ShippingCostPaidByOption>Buyer</ShippingCostPaidByOption>
        </ReturnPolicy>
        <ShippingDetails>
        <ApplyShippingDiscount>false</ApplyShippingDiscount>
        <SalesTax>
          <SalesTaxPercent>0.0</SalesTaxPercent>
          <ShippingIncludedInTax>false</ShippingIncludedInTax>
        </SalesTax>
        <ShippingServiceOptions>
          <ShippingService>$domestic</ShippingService>
          <ShippingServiceCost currencyID='$currency'>$dom_price</ShippingServiceCost>
          <ShippingServicePriority>1</ShippingServicePriority>
          <ExpeditedService>false</ExpeditedService>
          <ShippingTimeMin>2</ShippingTimeMin>
          <ShippingTimeMax>8</ShippingTimeMax>
        </ShippingServiceOptions>
        <ShippingType>Flat</ShippingType>
        <ThirdPartyCheckout>false</ThirdPartyCheckout>
        <ShippingDiscountProfileID>0</ShippingDiscountProfileID>
        <InternationalShippingDiscountProfileID>0</InternationalShippingDiscountProfileID>
        <SellerExcludeShipToLocationsPreference>true</SellerExcludeShipToLocationsPreference>
      </ShippingDetails>
      <ShipToLocations>Worldwide</ShipToLocations>
      
  </Item>
</AddFixedPriceItemRequest>";
    $curl = curl_init();

    
    curl_setopt($curl,CURLOPT_URL ,'https://api.ebay.com/ws/api.dll');
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_ENCODING , '');
    curl_setopt($curl,CURLOPT_MAXREDIRS , 10);
    curl_setopt($curl,CURLOPT_TIMEOUT , 0);
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION , true);
    curl_setopt($curl,CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST , 'POST');
    curl_setopt($curl,CURLOPT_POSTFIELDS ,$post1);
    curl_setopt($curl,CURLOPT_HTTPHEADER , array(
        "X-EBAY-API-SITEID: $country",
        "X-EBAY-API-COMPATIBILITY-LEVEL: 967",
        "X-EBAY-API-CALL-NAME: AddFixedPriceItem",
        "X-EBAY-API-IAF-TOKEN: $Token",
        "Content-Type: application/xml"
     ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;
    $result = preg_split('/_R1/', $response);
    $first = explode($year, $result[1], 2);
    $item_id=strip_tags($first[0]);
    $sql3 = "Update Ebay SET Ebay_ID='$item_id' WHERE id='$main'";
    $result3 = mysqli_query($mysql, $sql3);
    if($item_id=='')
    {
        echo $item_id;
    }
    else
    {
        echo '<script>alert("Uploaded Successfully");window.location.href="Listing_Ebay.php";</script>';
    }
    
    
}
