<?php
session_start();
include 'conexion.php';
if(isset($_SESSION['user'])) {?>
<!DOCTYPE HTML>
<html>
	<head>
        <head>
        
        <meta name="viewport" content="width=device-width, user-scalale=no, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/Style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title></title>

		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
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

<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>
<header>
          <?php include('menu/menutecnico.php') ?>
</header>

        <!--filtros para el grafico-->
        <div class="container row">
            <form action="" class="form-horizontal">
                
                <div class="col-md-3">
                    
                    <label class="control-label" for="tipop1">Ruta:</label>
                    <label class="checkbox-horizontal">
                        <input type="checkbox" id="checkbox1" value="Habilitar" onchange="check(this,tipop1)"> Habilitar
                    </label>
                    <select class="form-control" value="" id="tipop1">
                        <option value="">--Opci&oacute;n--</option>
                        <option value="">Ruta 1</option>
                        <option value="">Ruta 2</option>
                        <option value="">Ruta 3</option>
                        <option value="">Ruta 4</option>
                    </select>
                    
                </div>
                <div class="col-md-3">
                    <label class="control-label" for="tipop">Municipio:</label>
                    <label class="checkbox-horizontal">
                        <input type="checkbox" id="checkbox1" value="Habilitar"> Habilitar
                    </label>
                    <select class="form-control" value="" id="tipop">
                        <option value="">--Opci&oacute;n--</option>
                        <option value="">Municipio 1</option>
                        <option value="">Municipio 2</option>
                        <option value="">Municipio 3</option>
                        <option value="">Municipio 4</option>
                    </select>
                </div>
                <div class="col-md-3">
                                    
                    <label class="control-label" for="fech1">Fecha inicial:</label>
                    <div class="">
                        <input class="form-control" id="fech1" type="date" >
                        
                    </div>
                </div>

                <div class="">

                    <label class="control-label" for="fech2">Fecha final:</label>
                    <div class="col-md-3">
                        <input class="form-control" id="fech2" type="date" >
                    </div>
                    
                </div>
            </form>

        </div>
        <div class="row">
            <br>
        </div>
        <div class=" container row">
            <div class="col-md-3">
                    <label class="control-label" for="tipop">Productor:</label>
                    <label class="checkbox-horizontal">
                        <input type="checkbox" id="checkbox1" value="Habilitar"> Habilitar
                    </label>
                    <select class="form-control" value="" id="tipop">
                        <option value="">--Opci&oacute;n--</option>
                        <option value="">Productor 1</option>
                        <option value="">Productor 2</option>
                        <option value="">Productor 3</option>
                        <option value="">Productor 4</option>
                    </select>
            </div>
            <div class="col-md-3">
                    <label class="control-label" for="tipop">Producto:</label>
                    <label class="checkbox-horizontal">
                        <input type="checkbox" id="checkbox1" value="Habilitar"> Habilitar
                    </label>
                    <select class="form-control" value="" id="tipop">
                        <option value="">--Opci&oacute;n--</option>
                        <option value="">Baba tipo A</option>
                        <option value="">Baba tipo b</option>
                        <option value="">Fermentado Seco</option>
                        <option value="">Fermentado Seco B</option>
                        <option value="">Seco sin Fermentar</option>
                    </select>
            </div>



        </div>
        <br>

        <div class="container">
            <script type="text/javascript">
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
                            valueSuffix: 'Semanas'
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
                            		$sql= "SELECT * FROM tbl_productores_x_producto";
                            		$result = mysqli_query($conexion->getConexion(),$sql);
                            		while ($registros=mysqli_fetch_array($result)) {
                            			?>
                            			<?php echo $registros["precio"] ?>,
                            			<?php
                            		}
                            		?>
                            ]
                        }]
                    });
                });
            </script>
        </div>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <div class="container">
    	<input class="btn btn-info
    	" type="button" name="generar" value="Generar">
    </div>

    <footer class="footer">
        <div class="row">
            <center><h6>Todos los derechos Reservados @CopyRight</h6></center>
        </div>
        
    </footer>
	</body>
</html>
<?php
}else{
    echo '<script> window.location="index.php"; </script>';
}
?>