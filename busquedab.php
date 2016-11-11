
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
 
<body onload="lista('');">
    

        
    
    <div class="container">
         <div class="row form-horizontal">
            
        </div>
        </br>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_consultar">
                <div class="row form-horizontal">
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-4  text-right">
                                    <label for="buscar" class="control-label">Buscar:</label>
                                </div>
                                <div class="col-xs-4">
                                    <input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="lista(this.value);" placeholder="Ingrese codigo de registro o nombre usuario"/>

                                </div>
                            </div>
                            <div class="form-group">
                                <div id="lista"></div> 
                            </div> 
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
                
        </div>
    </div>
    <script src="js/jquery-1.11.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tabla4.js"></script>
</body>
</html>

    