<?php 
require_once(dirname(__FILE__).'/../config/dbconfig.php');
require_once(dirname(__FILE__).'/../config/conexReport.php');
require_once(dirname(__FILE__).'/../libs/PHPExcel_1.8.0_doc/Classes/PHPExcel.php');

try{

	$conex = conectaDB();
	
	$Ids = $_GET['id'];

	$sql = 'SELECT id,foto,nombre,apellido,correo
	    FROM persona
	   WHERE id IN ('.$Ids.');';
	   //echo $sql;
	   $query = $conex->prepare($sql);
	   if(!$query->execute() )return false;
	   if($query->rowCount() > 0):

	   	$objPHPExcel = new PHPExcel();

	   require_once(dirname(__FILE__).'/../views/reportexcel.php');

	   	//echo "hola es mayor";
	   	
	   	else:

	   		echo"no se encontraron datos para listar";

	   endif;
			


}catch(PDOException $e){
	echo "ERROR: " . $e->getMessage();
}


?>
 