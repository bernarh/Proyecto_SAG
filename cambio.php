<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['user'])) {?>


<?php

$pw=$_POST['pw'];
$pw1=$_POST['pw1'];
$pw2=$_POST['pw2'];

$hostname ="localhost";
$username= "root";
$pass="";
$db="sag";
$connect=mysqli_connect($hostname,$username,$pass,$db);

$query= "SELECT * FROM tbl_usuario WHERE user='".$_SESSION['user']."'";

$result= mysqli_query($connect,$query);

echo '<table border="1">';

while($row=mysqli_fetch_array($result))
{
	//echo '<td>'.$row['pw'].'</td>';
	//echo $pw;

    if ($pw==$row['pw'])
    {
    	echo "Coinciden";
    	if ($pw1==$pw2)
    	{

    		$query1= "UPDATE tbl_usuario SET pw='".$pw1."' WHERE user='".$_SESSION['user']."' ";
		    $result1=mysqli_query($connect,$query1);
    		if ($result1)
    		{
    				echo "Se actualizó";
    				echo '<script> alert("Se actualizó correctamente, Ingrese de Nuevo.");</script>';
    				echo '<script> window.location="index.php"; </script>';
    		}
    		else{echo "No se actualizó";};
    	}

    	else {echo "No coinciden 2";}
    }
    else{ echo "No coinciden";}
}


echo '</table>';
mysqli_close($connect);
?>

<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>

