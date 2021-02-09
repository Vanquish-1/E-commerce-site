<?php

//require_once("connect.php");

$dsn = "mysql:dbname=ubani;host=localhost";
$pass = "";
$user = "root";
$dbh = new PDO($dsn,$user,$pass);

$cardType = $_POST['cardtype'];
$Expiry = $_POST['expiry'];
$Nameoncard = $_POST['fn'];
$cardNumber = $_POST['ln'];
$Security = $_POST['cv'];
$Name = $_POST['n'];
$EmailAddress = $_POST['e'];
$BillingAddress = $_POST['ba'];
$BillingCity = $_POST['bc'];
$MobileMoney = $_POST['mn'];
$ZipCode = $_POST['z'];
$BillingCountry = $_POST['cy'];
$productid = $_POST["product_id"];
$date = strval(date('d-m-Y H:i:s'));

$sql =  $dbh->prepare("INSERT INTO cavov12 ( fn, ln, cv, n, e, ba, bc, mn, z, cy, product, date_ordered, status, cardtype, expiry ) VALUES ('$Nameoncard', '$cardNumber','$Security','$Name', '$EmailAddress', '$BillingAddress', '$BillingCity', '$MobileMoney', '$ZipCode', '$BillingCountry', '$productid', '$date', 'pending' )");
$sql->bindValue(":cardtype",$Nameoncard, PDO::PARAM_STR);
$sql->bindValue(":expiry",$Nameoncard, PDO::PARAM_STR);
$sql->bindValue(":fn",$Nameoncard, PDO::PARAM_STR);
$sql->bindValue(":ln", $cardNumber, PDO::PARAM_STR);
$sql->bindValue(":cv", $Security, PDO::PARAM_STR);
$sql->bindValue(":n", $Name, PDO::PARAM_STR);
$sql->bindValue(":e", $EmailAddress, PDO::PARAM_STR);
$sql->bindValue(":ba", $BillingAddress, PDO::PARAM_STR);
$sql->bindValue(":bc", $BillingCity, PDO::PARAM_STR);
$sql->bindValue("mn", $MobileMoney, PDO::PARAM_STR);
$sql->bindValue(":z", $ZipCode, PDO::PARAM_STR);
$sql->bindValue(":cy",$BillingCountry, PDO::PARAM_STR);
$sql->bindValue(":product",$productid, PDO::PARAM_STR);

if($sql->execute()){ ?>
<!DOCTYPE html>
<html>
<head>
<title>Transaction</title>
<link rel="shortcut icon" href="./images/ubani fav.png">
</head>
<body>
<center align>
<div class="Container" style="margin-top:70px; padding:10px; background-color:#f9f9f9; border-radius:10px">
<img src="images/ubani fav.png"><br>
<cite style="padding-top:40px;">Transaction Sucessful
</cite><br>
<img src="images/success1.png"><br>
<cite>Check out the latest pruducts on Ubani and place an order. </cite><br>
<a href="product.php">
<img src="images/go.png" style="margin-bottom:1px;">
</a>
</div>
</center align>
</body>
</html>
<?php
}
else{?>
<div class="Container" style="margin-top:70px; padding:10px; background-color:#f9f9f9; border-radius:10px">

<cite style="padding-top:40px;">Transaction UnSucessful. We could not get your details please fill the form again.
   
</cite><br>
<img src="images/wrong.png">
</div>
</center align>
</body>
</html>
 <?php
}

?>