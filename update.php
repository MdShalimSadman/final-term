<?php
session_start();
$isPost=false;
$username="";
$email="";
$radio="";
$address="";
$bio="";


if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["uname"]!="")
		$username=$_POST["uname"];
	    

	 //echo "button clicked";
}
$password="";
if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["pass"]!="")
		$password=$_POST["pass"];
	 //echo "button clicked";
}


if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["gender"]!="")
		$radio=$_POST["gender"];
	  //echo "button clicked";
}
if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["address"]!="")
		$address=$_POST["address"];
	    

	 //echo "button clicked";
}
if(isset($_POST["btnClick"]))
{
	$isPost=true;
	if($_POST["bio"]!="")
		$bio=$_POST["bio"];
	    

	 //echo "button clicked";
}
?>
<form action="#" method="post">
<p style="font-size:15px;font-family:'public sans' ">Username: <input type="text" value="<?php echo $_SESSION["uname"]; ?>" id="uname" name="uname">
<?php
if($isPost==true && $password=="")
 echo "<span style='color:red;'>Required</span>";
?>

<br><br>
Password: <input type="password" value="<?php echo $_SESSION["pass"]; ?>" id="pass" name="pass">
<?php
if($isPost==true && $username=="")
 echo "<span style='color:red;'>Required</span>";
?>
<br><br>
Email: <input type="Email" value="<?php echo $_SESSION["email"]; ?>"  id="email" name="email">
<?php
if($isPost==true && $email=="")
 echo "<span style='color:red;'>Required</span>";
?>
<br><br>
Gender: <input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<input type="radio" name="gender" value="Others">Others
<?php
if($isPost==true && $radio=="")
 echo "<span style='color:red;'>Select one</span>";
?>
<br><br>

Expertizes : <input type="checkbox" name="sectors[]" value="Veterinary">Veterinary
<input type="checkbox" name="sectors[]" value="Fisheries ">Fisheries
<input type="checkbox" name="sectors[]" value="Agriculture">Agriculture
<br><br>
Institution: <select name="institute">
<option value="Bangladesh krishi gobeshona institure">Bangladesh krishi gobeshona institure</option>
<option value="Krishi proshikkhon institute">Krishi proshikkhon institute</option>
<option value="Bangladesh poromanu krishi gobeshona institute">Bangladesh poromanu krishi gobeshona institute</option>
<option value="Soil resource development institute">soil resource development institute</option>
<option value="Bangladesh prani shompod gobeshona institute">Bangladesh prani shompod gobeshona institute</option>


</select><br><br>
Address: <textarea name="address" value="<?php echo $_SESSION["address"]; ?>" rowspan="3" colspan="30"></textarea>
<?php
if($isPost==true && $address=="")
 echo "<span style='color:red;'>Required</span>";
?>
<br><br>
Bio: <textarea name="bio" value="<?php echo $_SESSION["bio"]; ?>" rowspan="3" colspan="30"></textarea>
<?php
if($isPost==true && $bio=="")
 echo "<span style='color:red;'>Required</span>";
?>
<br><br>
<input type="submit" style="background-color:RGB(46,139,87); color:white"  value="Submit" name="btnClick">
</form>
<h5 style="float:right">Page 1 of 1</h5><br>
<?php
if($_POST["uname"]!="" && $_POST["pass"]!="" && $_POST["email"]!="" && $_POST["gender"]!="" && $_POST["sectors"]!="" && $_POST["address"]!="" && $_POST["bio"]!="" )
{



$servername="localhost:3306";
$usernamedb="root";
$passwordDB="";
$dbname="agriculturist";
$conn=new mysqli($servernamedb,$username,$passwordDB,$dbname);
if($conn->connect_error)
{
	die("Connection failed:".$conn->connect_error);
}
else
{
	//echo "Successful connection";
	$q="UPDATE agriculturist_info SET user_name='".$_POST["uname"]."',Password='".$_POST["pass"]."',Email='".$_POST["email"]."',Gender='".$_POST["gender"]."',Institute='".$_POST["institute"]."',Address='".$_POST["address"]."',About='".$_POST["bio"]."' WHERE user_name='".$_SESSION["uname"]."'";
	$result=$conn->query($q);
	if($result)
	  echo "data updated";
    else
		echo "data not updated";	

 }
 $_SESSION["uname"] = $_POST["uname"];
$_SESSION["pass"] = $_POST["pass"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["gender"] = $_POST["gender"];
$_SESSION["sectors"] = $_POST["sectors"];
$_SESSION["institute"] = $_POST["institute"];
$_SESSION["address"] = $_POST["address"];
$_SESSION["bio"] = $_POST["bio"];
}
?>
