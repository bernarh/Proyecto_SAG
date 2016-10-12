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
                            // Create the chart
                            $('#container').highcharts({
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Browser market shares. January, 2015 to May, 2015'
                                },
                                subtitle: {
                                    text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
                                },
                                xAxis: {
                                    type: 'category'
                                },
                                yAxis: {
                                    title: {
                                        text: 'Total percent market share'
                                    }

                                },
                                legend: {
                                    enabled: false
                                },
                                plotOptions: {
                                    series: {
                                        borderWidth: 0,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.y:.1f}%'
                                        }
                                    }
                                },

                                tooltip: {
                                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                                },

                                series: [{
                                    name: 'Brands',
                                    colorByPoint: true,
                                    data: [{
                                        name: 'Microsoft Internet Explorer',
                                        y: 56.33,
                                        drilldown: 'Microsoft Internet Explorer'
                                    }, {
                                        name: 'Chrome',
                                        y: 24.03,
                                        drilldown: 'Chrome'
                                    }, {
                                        name: 'Firefox',
                                        y: 10.38,
                                        drilldown: 'Firefox'
                                    }, {
                                        name: 'Safari',
                                        y: 4.77,
                                        drilldown: 'Safari'
                                    }, {
                                        name: 'Opera',
                                        y: 0.91,
                                        drilldown: 'Opera'
                                    }, {
                                        name: 'Proprietary or Undetectable',
                                        y: 0.2,
                                        drilldown: null
                                    }]
                                }],
                                drilldown: {
                                    series: [{
                                        name: 'Microsoft Internet Explorer',
                                        id: 'Microsoft Internet Explorer',
                                        data: [
                                            [
                                                'v11.0',
                                                24.13
                                            ],
                                            [
                                                'v8.0',
                                                17.2
                                            ],
                                            [
                                                'v9.0',
                                                8.11
                                            ],
                                            [
                                                'v10.0',
                                                5.33
                                            ],
                                            [
                                                'v6.0',
                                                1.06
                                            ],
                                            [
                                                'v7.0',
                                                0.5
                                            ]
                                        ]
                                    }, {
                                        name: 'Chrome',
                                        id: 'Chrome',
                                        data: [
                                            [
                                                'v40.0',
                                                5
                                            ],
                                            [
                                                'v41.0',
                                                4.32
                                            ],
                                            [
                                                'v42.0',
                                                3.68
                                            ],
                                            [
                                                'v39.0',
                                                2.96
                                            ],
                                            [
                                                'v36.0',
                                                2.53
                                            ],
                                            [
                                                'v43.0',
                                                1.45
                                            ],
                                            [
                                                'v31.0',
                                                1.24
                                            ],
                                            [
                                                'v35.0',
                                                0.85
                                            ],
                                            [
                                                'v38.0',
                                                0.6
                                            ],
                                            [
                                                'v32.0',
                                                0.55
                                            ],
                                            [
                                                'v37.0',
                                                0.38
                                            ],
                                            [
                                                'v33.0',
                                                0.19
                                            ],
                                            [
                                                'v34.0',
                                                0.14
                                            ],
                                            [
                                                'v30.0',
                                                0.14
                                            ]
                                        ]
                                    }, {
                                        name: 'Firefox',
                                        id: 'Firefox',
                                        data: [
                                            [
                                                'v35',
                                                2.76
                                            ],
                                            [
                                                'v36',
                                                2.32
                                            ],
                                            [
                                                'v37',
                                                2.31
                                            ],
                                            [
                                                'v34',
                                                1.27
                                            ],
                                            [
                                                'v38',
                                                1.02
                                            ],
                                            [
                                                'v31',
                                                0.33
                                            ],
                                            [
                                                'v33',
                                                0.22
                                            ],
                                            [
                                                'v32',
                                                0.15
                                            ]
                                        ]
                                    }, {
                                        name: 'Safari',
                                        id: 'Safari',
                                        data: [
                                            [
                                                'v8.0',
                                                2.56
                                            ],
                                            [
                                                'v7.1',
                                                0.77
                                            ],
                                            [
                                                'v5.1',
                                                0.42
                                            ],
                                            [
                                                'v5.0',
                                                0.3
                                            ],
                                            [
                                                'v6.1',
                                                0.29
                                            ],
                                            [
                                                'v7.0',
                                                0.26
                                            ],
                                            [
                                                'v6.2',
                                                0.17
                                            ]
                                        ]
                                    }, {
                                        name: 'Opera',
                                        id: 'Opera',
                                        data: [
                                            [
                                                'v12.x',
                                                0.34
                                            ],
                                            [
                                                'v28',
                                                0.24
                                            ],
                                            [
                                                'v27',
                                                0.17
                                            ],
                                            [
                                                'v29',
                                                0.16
                                            ]
                                        ]
                                    }]
                                }
                            });
                        });
        </script>
                </div>

            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            <div class="container">
            	<input class="btn btn-info" type="button" name="generar" value="Generar">
            </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>   
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
