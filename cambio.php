<?php
session_start();
include 'conexion.php';
if(isset($_SESSION['user'])) {?>


<?php
function encriptar($cadena){
                $key='sag';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
                $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
                return $encrypted; //Devuelve el string encriptado
         
            }
 function desencriptar($cadena){
             $key='sag';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
             $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
            return $decrypted;  //Devuelve el string desencriptado
        }


$pw=$_POST['pw'];
$pw1=$_POST['pw1'];
$pw2=$_POST['pw2'];
$conexion=new Conexion();
$connect=$conexion->getConexion();
$query= "SELECT * FROM tbl_usuarios WHERE user='".$_SESSION['user']."'";
$result= mysqli_query($connect,$query);
echo '<table border="1">';
while($row=mysqli_fetch_array($result))
{
	//echo '<td>'.$row['pw'].'</td>';
	
    $pw=encriptar($pw);
    if ($pw==$row['pw'])
    {
    	echo "Coinciden";
    	if ($pw1==$pw2)
    	{
            //echo $pw;
            $pw1=encriptar($pw1);
    		$query1= "UPDATE tbl_usuarios SET pw='".$pw1."' WHERE user='".$_SESSION['user']."' ";
		    $result1=mysqli_query($connect,$query1);
    		if ($result1)
    		{
    				echo "Se actualizo";
    				echo '<script> alert("Se actualizó correctamente, Ingrese de Nuevo.");</script>';
    				echo '<script> window.location="index.php"; </script>';
    		}
    		else{
                if ($_SESSION['codigotipousuario']===1){
                    echo '<script> alert("No se actualizó correctamente, Ingrese de Nuevo.");</script>';
                    echo '<script> window.location="cambiarpwadmin.php"; </script>';
                } else if ($_SESSION['codigotipousuario']===2){
                    echo '<script> alert("No se actualizó correctamente, Ingrese de Nuevo.");</script>';
                    echo '<script> window.location="cambiarpwd.php"; </script>';
                }else if ($_SESSION['codigotipousuario']===3){
                    echo '<script> alert("No se actualizó correctamente, Ingrese de Nuevo.");</script>';
                    echo '<script> window.location="cambiarpw.php"; </script>';
                }
                echo "No se actualizo";};
    	}
    	else {
        if ($_SESSION['codigotipousuario']===1){
                    echo '<script> alert("No se actualizó correctamente, Ingrese de Nuevo.");</script>';
                    echo '<script> window.location="cambiarpwadmin.php"; </script>';
                } else if ($_SESSION['codigotipousuario']===2){
                    echo '<script> alert("No se actualizó correctamente, Ingrese de Nuevo.");</script>';
                    echo '<script> window.location="cambiarpwd.php"; </script>';
                }else if ($_SESSION['codigotipousuario']===3){
                    echo '<script> alert("No se actualizó correctamente, Ingrese de Nuevo.");</script>';
                    echo '<script> window.location="cambiarpw.php"; </script>';
                }
        }
    }
    else{ 
        if ($_SESSION['codigotipousuario']===1){
                    echo '<script> alert("No se actualizó correctamente, Ingrese de Nuevo.");</script>';
                    echo '<script> window.location="cambiarpwadmin.php"; </script>';
                } else if ($_SESSION['codigotipousuario']===2){
                    echo '<script> alert("No se actualizó correctamente, Ingrese de Nuevo.");</script>';
                    echo '<script> window.location="cambiarpwd.php"; </script>';
                }else if ($_SESSION['codigotipousuario']===3){
                    echo '<script> alert("No se actualizó correctamente, Ingrese de Nuevo.");</script>';
                    echo '<script> window.location="cambiarpw.php"; </script>';
                }}
}
echo '</table>';
mysqli_close($connect);
?>

<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>