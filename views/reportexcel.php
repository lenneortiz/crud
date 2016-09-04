<?php 
$hora = date("Y-m-d H:i:s"); 

 // Se asignan las propiedades del libro
 $objPHPExcel->getProperties()->setCreator("lenneortiz") // Nombre del autor
     ->setLastModifiedBy("lenne") //Ultimo usuario que lo modificó
     ->setTitle("Reporte Excel") // Titulo
     ->setSubject("Reporte Excel de listado usuarios") //Asunto
     ->setDescription("Reporte de usuarios") //Descripción
     ->setCategory("Reporte excel"); //Categorias

     $tituloReporte = "Listado de Usuarios Activos";
     $titulosColumnas = array('ID','NOMBRE', 'APELLIDO', 'CORREO');

// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:D1');
 
// Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',$tituloReporte) // Titulo del reporte
    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B3',  $titulosColumnas[1])
    ->setCellValue('C3',  $titulosColumnas[2])
    ->setCellValue('D3',  $titulosColumnas[3]);

    $i = 4; //Numero de fila donde se va a comenzar a rellenar
     while ($fila = $query->fetch()) {
         $objPHPExcel->setActiveSheetIndex(0)
             ->setCellValue('A'.$i, $fila['id'])
             ->setCellValue('B'.$i, $fila['nombre'])
             ->setCellValue('C'.$i, $fila['apellido'])
             ->setCellValue('D'.$i, $fila['correo']);
         $i++;
     }


     $estiloTituloReporte = array(
         'font' => array(
             'name'      => 'Verdana',
             'bold'      => true,
             'italic'    => false,
             'strike'    => false,
             'size' =>16,
             'color'     => array(
                 'rgb' => 'FFFFFF'
             )
         ),
         'fill' => array(
           'type'  => PHPExcel_Style_Fill::FILL_SOLID,
           'color' => array(
                 'argb' => 'FF220835')
       ),
         'borders' => array(
             'allborders' => array(
                 'style' => PHPExcel_Style_Border::BORDER_NONE
             )
         ),
         'alignment' => array(
             'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
             'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
             'rotation' => 0,
             'wrap' => TRUE
         )
     );
      
     $estiloTituloColumnas = array(
         'font' => array(
             'name'  => 'Arial',
             'bold'  => true,
             'color' => array(
                 'rgb' => 'FFFFFF'
             )
         ),
         'fill' => array(
             'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
       'rotation'   => 90,
             'startcolor' => array(
                 'rgb' => 'c47cf2'
             ),
             'endcolor' => array(
                 'argb' => 'FF431a5d'
             )
         ),
         'borders' => array(
             'top' => array(
                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                 'color' => array(
                     'rgb' => '143860'
                 )
             ),
             'bottom' => array(
                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                 'color' => array(
                     'rgb' => '143860'
                 )
             )
         ),
         'alignment' =>  array(
             'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
             'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
             'wrap'      => TRUE
         )
     );
      
     $estiloInformacion = new PHPExcel_Style();
     $estiloInformacion->applyFromArray( array(
         'font' => array(
             'name'  => 'Arial',
             'color' => array(
                 'rgb' => '000000'
             )
         ),
         'fill' => array(
       'type'  => PHPExcel_Style_Fill::FILL_SOLID,
       'color' => array(
                 'argb' => 'FFd9b7f4')
       ),
         'borders' => array(
             'left' => array(
                 'style' => PHPExcel_Style_Border::BORDER_THIN ,
           'color' => array(
                   'rgb' => '3a2a47'
                 )
             )
         )
     ));


     $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->applyFromArray($estiloTituloReporte);
     $objPHPExcel->getActiveSheet()->getStyle('A3:D3')->applyFromArray($estiloTituloColumnas);
     $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:D".($i-1));


     for($i = 'A'; $i <= 'D'; $i++){
         $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
     }


     // Se asigna el nombre a la hoja
     $objPHPExcel->getActiveSheet()->setTitle('Usuarios');
      
     // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
     $objPHPExcel->setActiveSheetIndex(0);
      
     // Inmovilizar paneles
     //$objPHPExcel->getActiveSheet(0)->freezePane('A4');
     $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);


     // Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
     header('Content-Disposition: attachment;filename="'.$hora.'.xlsx"');
     header('Cache-Control: max-age=0');
      
     $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
     $objWriter->save('php://output');
     exit;
 ?>