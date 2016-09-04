<?php
$file="../model/ModelUsuario.php";
if(file_exists($file)):
  require_once($file);
//print_r($_SESSION);
else:
  echo "no existe";
  
endif;
if(isset($_SESSION['nombre']) ):
  $nom   = $_SESSION['nombre'];
  $apellido   = $_SESSION['apellido'];
  
 
?>
 <div class="container-fluid">
  <div id="header">
    <div class="row">
      <div class="col-md-4">
        <p class="text-left espacio" >Bienvenido Usuario: <?php echo $nom.' '.$apellido;?></p><br>
      </div>
      
      <div class="col-md-2 col-md-offset-5 espacio">

        <a class="text-left label label-danger logout" href="#">Cerrar sesión</a>
      </div>
    </div>
</div>

      <div class="row">

       <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">

            <span id="refrescar" class="label label-success">Actualizar</span>
            <span class="label label-primary" data-toggle="modal" data-target="#modal-user">Agregar</span>
            <span class="label label-info" id="export-exel-checkbox"> Exportar a EXCEL</span>
            <span class="label label-warning"  id="expt-pdf-checkbox">Exportar a PDF</span>

           


          </div>
        </div>
        <table id="table-user" class="table table-striped">

          <thead>
           <tr>
            <th> <span id="delete-multiple" class="label label-danger">Borrar</span></th>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th> <span  class="label label-danger">Borrar</span></th>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </tfoot>
        <tbody></tbody>
      </table>
    </div>
  </div>
  <div id="modal-dialog-mensaje">
    <p class="msj"></p>
  </div>
  
  <div id="modal-dialog-confirm">
    <p class="mjs-confirm"></p>
  </div>

  <div id="modal-dialog-invalid">
    
  </div>

  
  

  <div class="modal fade" id="modal-edit-user" tabindex="2" role="dialog-edit">
    
  </div><!-- /.modal -->


  <div class="modal fade" id="modal-user" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Registro de Nuevo Usuario</h4> 
          <p class="text-left">Todos los campos con <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> son requeridos</p>
          <div id="loading">
          <img src="libs/bootstrap-file-input/img/loading.gif" alt="">
          </div>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-7 col-sm-7 col-xs-7">
              <form class="form-horizontal" id="form-user" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                     <span class="glyphicon glyphicon-asterisk asterisco" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="apellido" class="col-sm-2 control-label">pellido</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="apellido" placeholder="Apellido">
                     <span class="glyphicon glyphicon-asterisk asterisco" aria-hidden="true"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="correo" class="col-sm-2 control-label">Correo</label>
                  <div class="col-sm-10">
                    <input type="email" name="correo" class="form-control" id="correo" placeholder="Correo">
                     <span class="glyphicon glyphicon-asterisk asterisco" aria-hidden="true"></span>
                  </div>
                </div>

                <!--<div class="form-group">
                     <label for="foto" class="col-sm-2 control-label">Foto</label>
                     <div class="col-sm-10">
              <input type="file" id="foto" name="foto" class="filestyle form-control" data-buttonName="btn-primary" data-buttonText="Foto">
                     </div>
                   </div>-->



                   <div class="form-group">
                    <label for="foto" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10" id="cont-input-foto">
                    
                      <input id="foto" name="foto" type="file" data-show-upload="false">
                       
                    </div>
                  </div>


                  
                </div>

                <div class="col-md-5 col-sm-5 col-xs-5">
                
                 <div class="form-group">
                   <div class="kv-avatar center-block">
                    
                   </div>
                 </div>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="modal-footer">
                  <button type="button" id="cancelar-envio" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" id="registrar-user" class="btn btn-primary">
                  <span class="glyphicon glyphicon-save"></span> &nbsp;Registrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->





</div><!-- /.container -->
<?php
else:
  header("Location:../");
endif;
?>