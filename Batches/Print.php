<?php
include_once("../include/mysql_connection.php");  


$id=$_REQUEST['var1'];

if(isset($id))
{
    $sql = "SELECT * FROM SKU WHERE Batch_ID='$id'";
    $result = mysqli_query($mysql, $sql);
   
}


?>

<head>
	
	<style>
		h1, h3 ,h4 {
		    margin:0;
		font-family: system-ui;
		font-size: 40px;
		color: black;
		}
		body.qrbody {
		padding: 10px;
		font-family: "Lucida Console", "Courier New", monospace;
		font-size: 24px;
		display: inline-flex;
		flex-direction: column;
	
		}
		h2{
		    font-family: system-ui;
		    width: 300px;
            word-wrap: break-word;
		}
		
        .qr-body{
        display:flex;
        }
       .text-qr {
            margin-left: -16px;
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			align-content: center;
			justify-content: center;
        }
		.site{
			font-size: 28px;
		}
		
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js">
	</script>
</head>
<body>
    <!--  -->
    <form action="" method="POST" class="View">
    <?php
        if (mysqli_num_rows($result) > 0) {
        ?>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
        ?>
        <?php
                                      
                                            
        $SKU=$row["SKU"];
    	//vendor
    	$sql3= "SELECT Name FROM Vendor Where Vendor_ID='".$row['Vendor_ID']."'";
    	$result3= mysqli_query($mysql, $sql3);
        $row3 = mysqli_fetch_array($result3);
    	// $ven=$row3['Name'];
	
	echo "<main class='qr-body'>
    	    <div id='qrcode'>
    	     <img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$SKU&choe=UTF-8'/>
    	    </div>
    	    <div class='text-qr'>
    	       
    	        <h1 id='skuval'>$SKU</h1>
		        <h4 class='site' style='margin:0;'>Swag-kicks.com</h4>
		    </div>
		  </main>";
		echo "<br>";
        ?>
        <?php
        $i++;
        }   
        
        ?>
        <?php
        }
        else{
            echo "No result found";
            }   
        ?>
    </form>
</body>
</html>