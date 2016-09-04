<?php 
require_once(dirname(__FILE__).'/../config/dbconfig.php');
require_once(dirname(__FILE__).'/../config/conexReport.php');
require_once(dirname(__FILE__).'/../libs/dompdf/dompdf_config.inc.php');

try{

	$conex = conectaDB();
	$hora = date("Y-m-d H:i:s"); 
	
	$Ids = $_GET['id'];

	$sql = 'SELECT id,foto,nombre,apellido,correo
	    FROM persona
	   WHERE id IN ('.$Ids.');';
	   //echo $sql;
	   $query = $conex->prepare($sql);
	   if(!$query->execute() )return false;
	   if($query->rowCount() == 1):
	   	$nombreReport = 'usuario';
	   	ob_start();
	   	   require_once(dirname(__FILE__).'/../views/1reportpdf.php');
	   	$html = ob_get_clean();

	   	else:
	   		$nombreReport = 'lista_de_usuarios';

	   		ob_start();
	   		   require_once(dirname(__FILE__).'/../views/reportpdf.php');
	   		$html = ob_get_clean();

	   endif;
			$dompdf = new DOMPDF();
	       //$dompdf->set_paper('letter','landscape');
	       //$dompdf->set_paper('legal','landscape');
	       	$html=utf8_decode($html);
	       	$dompdf->load_html($html);
	       	$dompdf->render();
	       	$dompdf->stream($nombreReport."-".$hora.".pdf");


	//echo $sql;


}catch(PDOException $e){
	echo "ERROR: " . $e->getMessage();
}


?>
 