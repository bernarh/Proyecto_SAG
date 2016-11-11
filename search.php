<?php  
include 'conexion.php';
  $conexion= new Conexion();
  # conectare la base de datos
 $connect = $conexion->getConexion();  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM tbl_productores WHERE nombre_productor LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["nombre_productor"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Country Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  