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
                                                <li ><a href="">Nuevo Productor</a></li>
                                                <li><a href="">Ver Datos</a></li>
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
                 <!--contenedor para el grafico-->
                <div class="container">
                   <script type="text/javascript">
                        $(function () {
                            $('#container').highcharts({
                                chart: {
                                    type: 'pie',
                                    options3d: {
                                        enabled: true,
                                        alpha: 45,
                                        beta: 0
                                    }
                                },
                                title: {
                                    text: 'Browser market shares at a specific website, 2014'
                                },
                                tooltip: {
                                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                },
                                plotOptions: {
                                    pie: {
                                        allowPointSelect: true,
                                        cursor: 'pointer',
                                        depth: 35,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.name}'
                                        }
                                    }
                                },
                                series: [{
                                    type: 'pie',
                                    name: 'Browser share',
                                    data: [
                                        ['Firefox', 45.0],
                                        ['IE', 26.8],
                                        {
                                            name: 'Chrome',
                                            y: 12.8,
                                            sliced: true,
                                            selected: true
                                        },
                                        ['Safari', 8.5],
                                        ['Opera', 6.2],
                                        ['Others', 0.7]
                                    ]
                                }]
                            });
                        });
        </script>
                </div>

            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            <div class="container">
            	<input class="btn btn-info" type="button" name="generar" value="Generar">
            </div>

        
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
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