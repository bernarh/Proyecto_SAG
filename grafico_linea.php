<?php
session_start();
include 'conexion.php';
if(isset($_SESSION['user'])) {
    
    $where=" ";
   
      if (isset($_POST["xruta"])){
        $zona=$_POST['xruta'];

      }  
      if (isset($_POST["bd-desde"])){
        $fechaini=$_POST['bd-desde'];
        
      } 
      if (isset($_POST["bd-hasta"])){
        $fechafin=$_POST['bd-hasta'];
       }
      if (isset($_POST["xmunicipio"])){
        $municipio=$_POST['xmunicipio'];
      }
      if (isset($_POST["xproducto"])){
        $producto=$_POST['xproducto'];

      }  
      if (isset($_POST["xproductor"])){
        $productor=$_POST['xproductor'];
   
      } 


    if(isset($_POST['buscar'])){  

        if(empty($_POST['xmunicipio']) and empty($_POST['bd-desde']) and empty($_POST['bd-hasta']) and empty($_POST['xproductor']) and empty($_POST['xproducto'])){
        $where="where D.ubicacion = '".$zona."' ";
        
        }else if( empty($_POST['xruta']) and empty($_POST['bd-desde']) and empty($_POST['bd-hasta']) and empty($_POST['xproductor']) and empty($_POST['xproducto'])){
        $where="where C.nombre_municipio= '".$municipio."' ";


        }else if( empty($_POST['xruta']) and empty($_POST['xmunicipio']) and empty($_POST['bd-hasta']) and empty($_POST['xproductor']) and empty($_POST['xproducto'])){
        $where="where A.fecha_ingreso_producto >= '".$fechaini."' ";

        }else if( empty($_POST['xruta']) and empty($_POST['xmunicipio']) and empty($_POST['bd-desde']) and empty($_POST['xproductor']) and empty($_POST['xproducto']) ){
            $where="where C.nombre_municipio= '".$municipio."' ";

        }else if( empty($_POST['xruta']) and empty($_POST['xmunicipio']) and empty($_POST['bd-desde']) and empty($_POST['bd-hasta']) and empty($_POST['xproducto']) ){
                    $where="where B.nombre_productor='".$productor."' ";

                }else if( empty($_POST['xruta']) and empty($_POST['xmunicipio']) and empty($_POST['bd-desde']) and empty($_POST['bd-hasta']) and empty($_POST['xproductor']) ){
                    $where="where CONCAT(E.descripcion_producto,' ',F.nombre_tipo_cacao) as descripcion_producto='".$producto."' ";

                        }else if( empty($_POST['xproducto']) and empty($_POST['bd-desde']) and empty($_POST['bd-hasta']) and empty($_POST['xruta']) ){
                            $where="where D.ubicacion= '".$zona."' AND C.nombre_municipio= '".$municipio."' ";

                        }else if(empty($_POST['xruta']) and empty($_POST['bd-desde']) and empty($_POST['bd-hasta']) and empty($_POST['xproductor']) ){
                                   $where="where C.nombre_municipio= '".$municipio."' AND CONCAT(E.descripcion_producto,' ',F.nombre_tipo_cacao) as descripcion_producto='".$producto."' ";

                                }else if(empty($_POST['xmunicipio']) and empty($_POST['bd-desde']) and empty($_POST['bd-hasta']) and empty($_POST['xproductor']) ){
                                   $where="where D.ubicacion= '".$zona."'".$municipio."' AND CONCAT(E.descripcion_producto,' ',F.nombre_tipo_cacao) as descripcion_producto='".$producto."' ";

                                }else {
                                            $where="where D.ubicacion='".$zona."' AND A.fecha_recoleccion between '".$fechaini."' AND '".$fechafin."' ";
                                            
                                        }
    }
      
     $sqli="SELECT A.fecha_recoleccion, A.precio  FROM tbl_productores_x_producto A 
    INNER JOIN tbl_productores B 
    ON (A.codigo_productor=B.codigo_productor) 
    INNER JOIN tbl_municipios C 
    ON (B.codigo_municipio=C.codigo_municipio) 
    INNER JOIN tbl_zonas D 
    ON (B.codigo_zona=D.codigo_zona) 
    INNER JOIN tbl_productos E 
    ON (A.codigo_producto=E.codigo_producto) 
    INNER JOIN tbl_tipos_de_cacao F 
    ON (E.codigo_tipo_cacao=F.codigo_tipo_cacao) $where";
    ?>
<!DOCTYPE HTML>
<html>
	<head>
        <head>
        
        <meta name="viewport" content="width=device-width, user-scalale=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/Style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title></title>

		<script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>

		<script> 
			function check(checkbox,id) {
    			var elCampo = document.getElementById(id);
    			elCampo.disabled = checkbox.checked;
            }

            
		</script> 
		
	</head>
	<body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<header>
            <div class="row">
                <div class="container-fluid" id="logos">
                    <div class="">
                        <img class="col-xs-10 col-sm-10 col-md-10"src="imagenes/logos.png">
                    </div>                  
                    <div class="clearfix visible-xs-block"></div>
                    <div class="clearfix visible-sm-block"></div>
                    <br>        
                </div>
                <div class="container-fluid">
                    <nav class="navbar navbar-default ">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
                                        <span class="sr-only">Menu</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>

                                    
                                    <a class="navbar-brand">
                                        <img id="icono" alt="Brand" src="imagenes/cacao.ico">
                                    </a>
                                    <a href="#icono" class="navbar-brand">PROCACAHO</a>
                                    
                                </div>

                                <div class="collapse navbar-collapse" id="navbar-1">
                                    <ul class="nav navbar-nav">
                                        <li><a href="registrar.php">Registrar</a></li>
                                        <li ><a href="new_productor.php">Nuevo Productor</a></li>
                                        <li><a href="ver_datos.php">Ver Datos</a></li>
                                        <li><a href="">Reportes</a></li>
                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle active" data-toggle="dropdown" role="button" >Graficos<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="grafico_barra.php">Grafico de Barras</a></li>
                                                <li><a href="grafico_linea.php">Grafico de Linea</a></li>
                                                <li><a href="grafico_pastel.php">Grafico Circular</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Grafico Precio Internacional</a></li>

                                            </ul>
                                        </li>
                                        <li class="dropdown ">
                                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" >Opci&oacute;n<span class="caret"></span></a>           
                                            <ul href="opcion" class="dropdown-menu">
                                                <li><a href="#">Cerrar Sesi&oacute;n</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Cambiar Contrase&ntilde;a</a></li>
                                                <li><a href="#">Mi Perfil</a></li>
                                                

                                            </ul>
                                        </li>


                                    </ul>

                                    <form action="" class="navbar-form navbar-right hidden-sm" role="search">
                                        <div class="form-group">
                                            <input type="text" class="form-control " placeholder="Buscar">

                                        </div>

                                    </form>
                                </div>
                            </div>
                    </nav>
                </div>
            </div>
</header>

        <!--filtros para el grafico-->
        <div class="container row">
            <form method="POST" action="" class="form-horizontal">
                
                <div class="col-md-3">
                    
                    <label class="control-label" for="xruta">Ruta:</label>
                    <select name="xruta" class="form-control" value="" id="xruta">
                        <option value="">--Opci&oacute;n--</option>
                        <?php
                         $conexion= new Conexion();
                                    $sql= "select * from tbl_zonas";
                                    $result = mysqli_query($conexion->getConexion(),$sql);
                                    while ($ruta=mysqli_fetch_array($result)) {
                             
                                        echo '<option value="'.$ruta['ubicacion'].'">'.$ruta['ubicacion'].'</option>';
                            
                                    }
                        $conexion->cerrarConexion();  
                      ?>
                    </select>
                    
                </div>
                <div class="col-md-3">
                    <label class="control-label" for="tipop">Municipio:</label>
                    <select class="form-control" value="" name="xmunicipio" id="tipop">
                        <option value="">--Opci&oacute;n--</option>
                        <?php
                                    $conexion= new Conexion();
                                    $sql= " select * from tbl_municipios";
                                    $result = mysqli_query($conexion->getConexion(),$sql);
                                    while ($ruta=mysqli_fetch_array($result)) {
                             
                                        echo '<option value="'.$ruta['nombre_municipio'].'">'.$ruta['nombre_municipio'].'</option>';
                            
                                    }
                                     $conexion->cerrarConexion(); 
                            ?>
                    </select>
                </div>
                <div class="col-md-3">
                                    
                    <label class="control-label" for="bd-desde">Fecha inicial:</label>
                    <div class="">
                        <input class="form-control" name="bd-desde" type="date" >
                        
                    </div>
                </div>

                <div class="">

                    <label class="control-label" for="bd-hasta">Fecha final:</label>
                    <div class="col-md-3">
                        <input class="form-control" name="bd-hasta" type="date" >
                    </div>
                    
                </div>
            

                </div>
                <div class="row">
                    <br>
                </div>
                <div class=" container row">
                    <div class="col-md-3">
                            <label class="control-label" for="tipop">Productor:</label>
                            <select class="form-control" value="" name="xproductor" id="tipop">
                                <option value="">--Opci&oacute;n--</option>
                                <?php
                                            $conexion= new Conexion();
                                            $sql= " select nombre_productor from tbl_productores";
                                            $result = mysqli_query($conexion->getConexion(),$sql);
                                            while ($ruta=mysqli_fetch_array($result)) {
                                     
                                                echo '<option value="'.$ruta['nombre_productor'].'">'.$ruta['nombre_productor'].'</option>';
                                    
                                            }
                                            $conexion->cerrarConexion(); 
                                    ?>
                            </select>
                    </div>
                    <div class="col-md-3">
                            <label class="control-label" for="tipop">Producto:</label>
                            <select class="form-control" value="" name="xproducto" id="tipop">
                                <option value="">--Opci&oacute;n--</option>
                                <?php
                                            $conexion= new Conexion();
                                            $sql= "SELECT CONCAT(A.descripcion_producto,' ',B.nombre_tipo_cacao) as descripcion_producto FROM tbl_productos A 
                                                    INNER JOIN tbl_tipos_de_cacao B 
                                                    ON (A.codigo_tipo_cacao=B.codigo_tipo_cacao)";
                                            $result = mysqli_query($conexion->getConexion(),$sql);
                                            while ($ruta=mysqli_fetch_array($result)) {
                                     
                                                echo '<option value="'.$ruta['descripcion_producto'].'">'.$ruta['descripcion_producto'].'</option>';
                                    
                                            }
                                             $conexion->cerrarConexion(); 
                                    ?>
                            </select>
                    </div>
                    
                    <div class="col-sm-3 col-md-3">
                        <button class="btn btn-info " name="buscar" type="submit">Graficar</button> 
                    </div>

            </form>
        </div>
        <br>
        <div class="container">
            <script type="text/javascript">
            //graficar al cargar la pagina
            $(function () {
                    $('#container').highcharts({
                        title: {
                            text: 'PROCACAHO',
                            x: -20 //center
                        },
                        subtitle: {
                            text: 'Movimientos en el Precio de el Cacao',
                            x: -20
                        },
                        xAxis: {
                            categories: [
                                <?php 
                                    $conexion= new Conexion();
                                    $sql= "SELECT * FROM tbl_productores_x_producto";
                                    $result = mysqli_query($conexion->getConexion(),$sql);
                                    while ($registros=mysqli_fetch_array($result)) {
                                        ?>
                                        '<?php echo $registros["fecha_ingreso_producto"] ?>',
                                        <?php
                                    }
                                    $conexion->cerrarConexion(); 
                                    ?>
                            ]
                        },
                        yAxis: {
                            title: {
                                text: 'Precio Lps.'
                            },
                            plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                        },
                        tooltip: {
                            valueSuffix: ' Lps.'
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                            borderWidth: 0
                        },
                        series: [{
                            name: 'Precio',
                            data: [
                                <?php 
                                    $conexion= new Conexion();
                                    $result = mysqli_query($conexion->getConexion(),$sqli);
                                    while ($registros=mysqli_fetch_array($result)) {
                                        ?>
                                         <?php echo $registros["precio"] ?>,
                                        <?php
                                    }
                                    $conexion->cerrarConexion(); 
                                    ?>
                            ]
                        }]
                    });
                });
            //graficar al presionar el boton generar
            function graficar(){
                
                $(function () {
                    $('#container').highcharts({
                        title: {
                            text: 'PROCACAHO',
                            x: -20 //center
                        },
                        subtitle: {
                            text: 'Movimientos en el Precio de el Cacao',
                            x: -20
                        },
                        xAxis: {
                            categories: [
                            	<?php 
                            		$conexion= new Conexion();
                            		$sql= "SELECT * FROM tbl_productores_x_producto";
                            		$result = mysqli_query($conexion->getConexion(),$sql);

                            		while ($registros=mysqli_fetch_array($result)) {
                            			?>
                            			'<?php echo $registros["fecha_ingreso_producto"] ?>',
                            			<?php
                            		}
                                    $conexion->cerrarConexion(); 
                            		?>
                            ]
                        },
                        yAxis: {
                            title: {
                                text: 'Precio Lps.'
                            },
                            plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                        },
                        tooltip: {
                            valueSuffix: ' Lps.'
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle',
                            borderWidth: 0
                        },
                        series: [{
                            name: 'Precio',
                            data: [
                            	<?php 
                            		$conexion= new Conexion();
                                    
                            		$result = mysqli_query($conexion->getConexion(),$sqli);
                            		while ($registros=mysqli_fetch_array($result)) {
                            			?>
                            			 <?php echo $registros["precio"] ?>,
                            			<?php
                            		}
                                    $conexion->cerrarConexion(); 
                            		?>
                            ]
                        }]
                    });
                });
            }
            </script>
        </div>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <div class="container">
    	<input class="btn btn-info" type="button" name="exportar" value="Exportar">
    </div>


	</body>
	<footer class="footer">
        <div class="row">
            <center><h6>Todos los derechos Reservados @CopyRight</h6></center>
        </div>
        
    </footer>
</html>
<?php
}else{
    echo '<script> window.location="index.php"; </script>';
}
?>