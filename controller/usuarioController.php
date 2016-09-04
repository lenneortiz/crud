<?php
$file="../model/ModelUsuario.php";
require_once($file);
		$classUser=new Usuario();


		if(isset($_GET['action'])){
			
		   sleep(1);
		   if($_GET['action']=='get_data'){
		     $classUser->get_user();
		   }
		   else if($_GET['action']=='guardar'){

		    //Comprobamos que sea una petición ajax;
		    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'):
		    
		    	$classUser->Guardar();
		    else:
		        throw new Exception("Error procesando el requerimiento", 1);   
		    endif;
		    
		    //echo $_POST['correo'];
		   }
		   else if($_GET['action']=='delete_user'){

		   		//Comprobamos que sea una petición ajax;
		   		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'):
		   			//echo '<pre>';
		   			//print_r($_GET);
		   			//echo '</pre>';
		   			//$resp[0]=$_POST;
		   			//var_dump($_POST);

		   			//print_r(json_encode($_POST));
		   		
		   			$classUser->deleteUser();
		   		else:
		   		    throw new Exception("Error procesando el requerimiento", 1);   
		   		endif;

		       
		   }
		   else if($_GET['action']=='ver_user'){

		     $user_view =  $classUser->BuscarUser($_GET['id']);

		   	?>

		   		
		   		  <div class="modal-dialog">
		   		    <div class="modal-content">
		   		      <div class="modal-header">
		   		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		   		        <h4 class="modal-title">Editar Usuario</h4> 
		   		        <p class="text-left">Todos los campos con <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> son requeridos</p>
		   		        <div id="loading">
		   		        <img src="libs/bootstrap-file-input/img/loading.gif" alt="">
		   		        </div>
		   		      </div>
		   		      <div class="modal-body">
		   		        <div class="row">
		   		          <div class="col-md-7 col-sm-7 col-xs-7">
		   		            <form class="form-horizontal" id="form-edit-user" enctype="multipart/form-data">
		   		              <div class="form-group">
		   		                <label for="get-nombre" class="col-sm-2 control-label">Nombre</label>
		   		                <div class="col-sm-10"> 
		   		                  <input type="text" class="form-control" id="get-nombre" placeholder="Nombre" name="get-nombre" value="<?php echo $user_view[0]['nombre']; ?>">
		   		                  <span class="glyphicon glyphicon-asterisk asterisco" aria-hidden="true"></span>
		   		                </div>
		   		              </div>
		   		              <div class="form-group">
		   		                <label for="get-apellido" class="col-sm-2 control-label">pellido</label>
		   		                <div class="col-sm-10">
		   		                  <input type="text" class="form-control" id="get-apellido" placeholder="Apellido" name="get-apellido" value="<?php echo $user_view[0]['apellido']; ?>">
		   		                  <span class="glyphicon glyphicon-asterisk asterisco" aria-hidden="true"></span>
		   		                </div>
		   		              </div>

		   		              <div class="form-group">
		   		                <label for="get-correo" class="col-sm-2 control-label">Correo</label>
		   		                <div class="col-sm-10">
		   		                  <input type="email" class="form-control" id="get-correo" placeholder="Correo" name="get-correo" value="<?php echo $user_view[0]['correo']; ?>">
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
		   		                  <label for="get-foto" class="col-sm-2 control-label">Foto</label>
		   		                  <div class="col-sm-10" id="cont-input-foto">
		   		                    <input id="get-foto" name="get-foto" type="file" data-show-upload="false">
		   		                  </div>
		   		                </div>


		   	<input type="hidden" name="foto-user"  id="foto-user" value="<?php echo $user_view[0]['foto']; ?>">
		   	<input type="hidden" name="id-user" id="id-user" value="<?php echo $user_view[0]['id']; ?>">

		   		              </div>

		   		              <div class="col-md-5 col-sm-5 col-xs-5">
		   		               <!--<img src="upload/avatar.png" alt="" id="avatar">-->
		   		               <div class="form-group">
		   		                 <div class="kv-avatar center-block">
		   		          
		 <img src="upload/<?php echo ''.$user_view[0]['foto'].'" style="width:160px;height:140px;"/>'; ?>
		   		                 </div>
		   		               </div>
		   		             </div>
		   		             <div class="col-md-12 cols-sm-12 col-xs-12">
		   		              <div class="modal-footer">
		<span class="label label-warning"  id="expt-pdf" style="float:left" data-id="<?php echo $user_view[0]['id']; ?>">Exportar a PDF</span>
		   		                <button type="button" id="cancelar-envio" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		   		                <button type="button" id="edit-user" class="btn btn-primary">Actualizar</button>
		   		              </form>
		   		            </div>
		   		          </div>
		   		        </div>
		   		      </div>
		   		    </div><!-- /.modal-content -->
		   		  </div><!-- /.modal-dialog -->
		   		



		   	<?php

		   }
		   else if($_GET['action']=='update_user'){
		      $classUser->updateUsuario();
		   	//echo $_POST['id-user'];
		   }
		   else if($_GET['action']=='delete_multiple'){
		       $classUser->DeleteMultipleUser();
		   		//print_r($_POST);
		   }
		   else if($_GET['action']=='data_json'){
		       $classUser->get_data_json();
		   }
		   else if($_GET['action']=='login'){

		   	$classUser->loginUser();
		       //$resp[0]='1';

		       //print_r(json_encode($resp));
		   }else if($_GET['action']=='logout'){

		   	//print getcwd() . "\n"; //Obtiene el directorio actual en donde se esta trabajando

		   	session_destroy();
		   	$_SESSION['nombre'] = "0";
		   	$_SESSION['apellido'] = "";
		   	header("Cache-Control: private");
		   	header("Location:../");

		   }
		   
		   
		}



?>