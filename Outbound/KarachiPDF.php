<?php 
session_start();
include_once("../include/mysql_connection.php"); 
// include_once("barcode128.php");

error_reporting(0);

date_default_timezone_set("Asia/Karachi");

$ID= $_GET['GETID'];
//$va=$_REQUEST['var1'];
$sql = "SELECT *  FROM `Order` WHERE Order_Number='#$ID'";
// echo $sql;
$result = mysqli_query($mysql, $sql);
$result1 = mysqli_query($mysql, $sql);

$date=date('d-m-Y');

while($row1 = mysqli_fetch_assoc($result1)) 
{
    $num=$row1["Order_Number"];
    //$date=$row["Date"];
    $name=$row1["Name"];
    $add=$row1["Address"];
    $cont=$row1["Contact"];
    $track=$row1["Tracking"];
    $city=$row1["City"];
    $sku=$row1["SKU"];
    $del=$row1["Shipping"];
    $dis=$row1["Discount"];
    $tot=$row1["Total"];
    
    

}

$total="SELECT SUM(Price*Quantity) as tot FROM `Order` WHERE Order_Number='#$ID'";
$res5 = mysqli_query($mysql, $total);
$sub = mysqli_fetch_assoc($res5);
$Subt=$sub['tot']/100*100;
// $gst=$sub['tot']/100*5;

if($st=='Edited')
{
    if($dis==0 && $del==0)
    {
     
        $fi=$Subt+$del+$del;
        
    }    
    else if($dis==0 && $del!=0)
    {
        
        $fi=$Subt;
    }
    
    
    
    else if($dis!=0 && $del==0)
    {
     
        $fi=$Subt+$del-$dis;
        
    }    
    else if($dis!=0 && $del!=0)
    {
        
        $fi=($Subt+$del)-$dis;
    }

}
else
{

    if($dis==0 && $del==0)
    {
     
        $fi=$Subt+$del+$del;
        
    }    
    else if($dis==0 && $del!=0)
    {
        
        $fi=$Subt+$del;
    }
    
    
    
    else if($dis!=0 && $del==0)
    {
     
        $fi=$Subt+$del-$dis;
        
    }    
    else if($dis!=0 && $del!=0)
    {
        
        $fi=($Subt+$del)-$dis;
    }

}
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Order confirmation </title>
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;" />
<style type="text/css">
td {
    font-weight: bold;
}
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
  body { margin: 0; padding: 0; background: #e1e1e1; }
  div, p, a, li, td { -webkit-text-size-adjust: none; text-align: left !important; }
  .ReadMsgBody { width: 100%; background-color: #ffffff; }
  .ExternalClass { width: 100%; background-color: #ffffff; }
  body { width: 100%; height: 100%; background-color: #e1e1e1; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
  html { width: 100%; }
  p { padding: 0 !important; margin-top: 0 !important; margin-right: 0 !important; margin-bottom: 0 !important; margin-left: 0 !important; }
  .visibleMobile { display: none; }
  .hiddenMobile { display: block; }

  @media only screen and (max-width: 600px) {
  body { width: auto !important; }
  table[class=fullTable] { width: 96% !important; clear: both; }
  table[class=fullPadding] { width: 85% !important; clear: both; }
  table[class=col] { width: 45% !important; }
  .erase { display: none; }
  }

  @media only screen and (max-width: 420px) {
  table[class=fullTable] { width: 100% !important; clear: both; }
  table[class=fullPadding] { width: 85% !important; clear: both; }
  table[class=col] { width: 100% !important; clear: both; }
  table[class=col] td { text-align: left !important; }
  .erase { display: none; font-size: 0; max-height: 0; line-height: 0; padding: 0; }
  .visibleMobile { display: block !important; }
  .hiddenMobile { display: none !important; }
  }
</style>


<!-- Header -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tr>
    <td height="20"></td>
  </tr>
  <tr>
    <td>
      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
        <tr class="hiddenMobile">
          <td height="40"></td>
        </tr>
        <tr class="visibleMobile">
          <td height="30"></td>
        </tr>

        <tr>
          <td>
            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding" >
              <tbody>
                <tr>
                  <td>
                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                      <tbody>
                        <tr>
                          <td align="left"> <img src="https://cdn.shopify.com/s/files/1/0164/5304/2230/files/S-K_Logo_TEXT_2.0_RED_-01_1.png?v=1646152470" width="120" height="30" alt="logo" border="0" /></td>
                        </tr>
                        <tr class="hiddenMobile">
                          <td height="10"></td>
                        </tr>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 20px; vertical-align: top; ">
                                B-165, Block D North Nazimabad Town, <br> Karachi, Sindh 74600 Pakistan<br> T: 0300 203 0317<br> E: contact@swag-kicks.com <br><?php  echo "<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$track&choe=UTF-8' style='width: 100px;'/>"?>
                              </td>
                        </tr>
                      </tbody>
                    </table>
                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                      <tbody>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                          <td height="5"></td>
                        </tr>
                        <tr>
                          <td style="font-size: 18px; color: #000; letter-spacing: -1px; font-family: 'Open Sans', sans-serif; line-height: 1; vertical-align: top; text-align: right !important;">
                            Billing Information
                          </td>
                        </tr>
                        <tr>
                          <td style="font-size: 12px; color: #000; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                            <small><?php echo $date ?></small><br />
                            <small>ORDER</small> <?php echo $num ?><br />
                            <?php echo $name ?><br> <?php echo $add ?><br> T:<?php echo $cont ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<!-- /Header -->
<!-- Order Details -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
            <tr class="hiddenMobile">
              <td height="20"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="10"></td>
            </tr>
            <tr>
              <td>
              <?php
        if (mysqli_num_rows($result) > 0) {
      ?>
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody style="text-align-last: center;">
                    <tr>
                     
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="left">
                        <small><strong>SKU</strong></small>
                      </th>
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="center">
                        <strong>Quantity</strong>
                      </th>
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="right">
                        <strong>Subtotal</strong>
                      </th>
                    </tr>
                    <tr>
                      <td height="1" style="background: #bebebe;" colspan="4"></td>
                    </tr>
                    <tr>
                      <td height="10" colspan="4"></td>
                    </tr>
                    <?php
                        $i=0;
                            while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">
                        <?php echo $row["SKU"]; ?>
                      </td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center"><?php echo $row["Quantity"]; ?></td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right"><?php echo $a=$row["Quantity"]*$row["Price"]; ?></td>
                      
                    </tr>
                    <?php
                        $i++;
                        }   
                        ?>
                    <tr>
                      <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                    </tr>
                    <!-- <tr>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #ff0000;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">Beats RemoteTalk Cable</td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small>MHDV2G/A</small></td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center">1</td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right">$29.95</td>
                    </tr> -->
                    <tr>
                      <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                    </tr>
                  </tbody>
                </table>
                <?php
                        }
                        else{
                            echo "No result found";
                        }   
                        ?>
              </td>
            </tr>
            <tr>
              <td height="20"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Order Details -->
<!-- Total -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
              <td>

                <!-- Table Total -->
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding" style="border-radius: 10px 10px 0 0;">
                  <tbody>
                    <tr>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                        <strong>Subtotal</strong>
                      </td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                        <strong><?php echo $Subt; ?></strong>
                      </td>
                    </tr>
                    
                    
                    <!--<tr>-->
                    <!--  <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">-->
                    <!--    GST 5%-->
                    <!--  </td>-->
                    <!--  <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">-->
                    <!--    <?php //echo $gst; ?>-->
                    <!--  </td>-->
                    <!--</tr>-->
                    
                     <tr>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                       <strong> Discount</strong>
                      </td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                        <strong><?php echo $dis; ?></strong>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                        <strong>Shipping &amp; Handling</strong>
                      </td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                        <strong><?php echo $del; ?></strong>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right;  ">
                        <strong>Grand Total (Incl.Tax)</strong>
                      </td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                        <strong><?php echo $fi; ?></strong>
                      </td>
                    </tr>
                    <!--<tr style="position: absolute; bottom: 35%;">-->
                    <!--      <td style="margin-right:-25px !important; line-height: 18px; vertical-align: top; text-align: right;"> </td>-->
                    <!--    </tr>-->
                    <!--    <tr >-->
                    <!--      <td height="20"></td>-->
                    <!--    </tr>-->
                    <!--<tr>-->
                        <td style="font-size: 12px; color: #000; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: center;"><br>
                           <strong>Thank you <?php echo $name ?> for shopping with us</strong>
                          </td>
                    </tr>    
                    <tr >
                          <td height="20"></td>
                        </tr>
                  </tbody>
                </table>
                <!-- /Table Total -->

              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Total -->
<!-- Information -->