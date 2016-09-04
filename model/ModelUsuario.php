<?php
session_start();
date_default_timezone_set("America/Caracas");
$file="../config/database.php";
require_once($file);

$file="../libs/dompdf/dompdf_config.inc.php";
if(file_exists($file)):
  require_once($file);

else:
  echo "no existe";
  endif;



class Usuario extends Conectar
{

  private $conex;
  private $table_name = "persona";
  public $foto;
  public $foto_user;
  public $id; 
  public $nombre; 
  public $apellido; 
  public $correo; 
  public $clave; 

  // constructor with $db as database connection 
public function __construct()
{
  $this->conex=parent::Conexion();
  
}

public function get_user() {
  $sql = "SELECT id,foto,nombre,apellido,correo FROM persona ORDER BY id DESC";
  try {
    $no_data[] = 'no se encontaron registros';
   $query=$this->conex->prepare($sql);
   if(!$query->execute()) return false;
   if($query->rowCount() > 0):
   $list = $query->fetchAll(PDO::FETCH_OBJ);
   $this->conex = null;
   echo json_encode($list);
   else:
    echo json_encode($no_data);

   endif;
 } catch(PDOException $e) {


  echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
}


public function get_data_json() {


  $sql = "SELECT * FROM persona";
  try {
   
   $query=$this->conex->prepare($sql);
   if(!$query->execute()) return false;
   if($query->rowCount() > 0):
   
      $convertToJson = array();

      while($row = $query->fetch(PDO::FETCH_ASSOC) )
      {
      $rowArray['id'] = $row['id'];

      $rowArray['nombre'] = $row['nombre'];

      $rowArray['apellido'] = $row['apellido'];

      $rowArray['correo'] = $row['correo']; 

      array_push($convertToJson, $rowArray);

      }
      json_encode($convertToJson);

      $listaEmpleos = "json/listaUsers.json";

      $data = json_encode($convertToJson); 

      if ($fp = fopen($listaEmpleos, "w"))
      {
      fwrite($fp, $data);
      }
      fclose($fp);
    

   endif;
 } catch(PDOException $e) {


  echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
}

public function BuscarUser($id)
  {
    $this->id = $id;

    try
    {
      $sql="SELECT
      id,
      foto,
      nombre,
      apellido,
      correo
      FROM
      ".$this->table_name."
      WHERE id = ?
      ";
      $query=$this->conex->prepare($sql);
      $query->bindParam(1,$this->id,PDO::PARAM_INT);
      if(!$query->execute(array($this->id)) )return false;
      if($query->rowCount() > 0):

        return $query->fetchAll(PDO::FETCH_ASSOC);
      endif;

    }catch(PDOException $e){

      die("error en el query".$e->getMessage() );
    }
  }

public function Guardar(){

require_once('ModifiedImage.php');

$nombre           = parent::limpiarcampo(ucfirst($_POST['nombre']));
$apellido         = parent::limpiarcampo(ucfirst($_POST['apellido']));
$correo           = parent::limpiarcampo($_POST['correo']);
$foto_name        = parent::limpiarcampo($_FILES['foto']['name']);
$temp_direc       = $_FILES['foto']['tmp_name'];
$size             = $_FILES['foto']['size'];
$imgExt           = end(explode(".",$foto_name));
$user_foto        = rand(1000,1000000).".".$imgExt;
$extencion        = array("png", "jpg", "jpeg");
$carpeta          = "../upload/";

if(empty($nombre) OR empty($apellido) OR empty($correo)):


  $resp[0]='4'; 

else:
  if(!empty($foto_name)):
    //$resp[0]='existe la imagen'; 
  $foto = $user_foto;
            if(in_array($imgExt, $extencion)):

                  if($size < (3024 * 3024)):

                      
                      $image = new ModifiedImage($temp_direc);
                      //$original = 'original_' . $_FILES['foto']['name'];
                      //$image->save($original);
                          if($image->getWidth() > 150):

                              $image->resizeToWidth(150);
                              $w150 = $carpeta . $user_foto;
                              $image->save($w150);

                             

                        endif;

                  else:

                    $resp[0]='6';

                  endif;

              else:
                $resp[0]='5';
            endif;
    else:
      
    $foto = 'avatar.png';

  endif;
      

endif;

if(!$resp[0]):

  $sql="INSERT INTO persona VALUES (NULL,?,?,?,?);";
  $query=$this->conex->prepare($sql);
  $query->bindParam(1,$foto,PDO::PARAM_STR);
  $query->bindParam(2,$nombre,PDO::PARAM_STR);
  $query->bindParam(3,$apellido,PDO::PARAM_STR);
  $query->bindParam(4,$correo,PDO::PARAM_STR);

      $sql2="SELECT * FROM persona WHERE correo = ?";
      $query2=$this->conex->prepare($sql2);
      $query2->bindParam(1,$correo,PDO::PARAM_STR);

      if(!$query2->execute() )return false;
      if($query2->rowCount() > 0):

          $resp[0]='2';

      else:

          $query->execute();

          $resp[0]='1';

      endif;

endif;


  
print_r(json_encode($resp) );
}

public function updateUsuario(){

  $id                   = $_POST['id-user'];
  $nombre               = parent::limpiarcampo(ucfirst($_POST['get-nombre']));
  $apellido             = parent::limpiarcampo(ucfirst($_POST['get-apellido']));
  $correo               = $_POST['get-correo'];
  $foto_user_actual     = $_POST['foto-user'];
  $foto_name            = $_FILES['get-foto']['name'];
  $temp_direc           = $_FILES['get-foto']['tmp_name'];
  $size                 = $_FILES['get-foto']['size'];
  $imgExt               = end(explode(".",$foto_name));
  $user_foto            = rand(1000,1000000).".".$imgExt;
  $extencion            = array("png", "jpg", "jpeg");
  $carpeta              = "../upload/";
  

  if(empty($nombre) OR empty($apellido) OR empty($correo) ):

        $resp[0] = '4';

    else:
    
       if(!empty($foto_name)):
          //$resp[0] = "existe";
            if(in_array($imgExt, $extencion)):
               //echo "formato correcto";
                  if($size < (3024 * 3024)):
                    //$resp[0] ="tamaño de imagen correto";
                    if($foto_user_actual == 'avatar.png'):
                      
                      else:

                        unlink($carpeta.$foto_user_actual);
                    endif;
                    
                             require_once 'ModifiedImage.php';
                             $image = new ModifiedImage($temp_direc);
                
                                 if($image->getWidth() > 150):

                                     $image->resizeToWidth(150);
                                     $w150 = $carpeta . $user_foto;
                                     $image->save($w150);
                                    //$resp[0] = "imagen guardada";
                                else:
                                    $resp[0] = '3';

                                endif;

                    else:
                      $resp[0] = '6';
                  endif;

              else:

                $resp[0] = '5';

            endif;
        else:

          //$resp[0] = "imagen no existe";
            $user_foto =  $foto_user_actual;

        endif;

        if(!$resp[0]):

             $sql = "UPDATE 
             persona
             SET 
             foto = ?,
             nombre = ?, 
             apellido = ?, 
             correo = ?
             WHERE
             id = ? ";
             $query = $this->conex->prepare($sql);

            $query->bindParam(1,$user_foto,PDO::PARAM_STR);
            $query->bindParam(2,$nombre,PDO::PARAM_STR);
            $query->bindParam(3,$apellido,PDO::PARAM_STR);
            $query->bindParam(4,$correo,PDO::PARAM_STR);
            $query->bindParam(5,$id,PDO::PARAM_INT);
            if($query->execute()):
            
              $resp[0] = '1';
            else:
              $resp[0] = "no se a actualizado";
            endif;


        endif;

  endif;

  print_r(json_encode($resp) );
}

  public function deleteUser(){

    if(isset($_POST['id']) AND !empty($_POST['id'])):

        $this->id = $_POST['id'];
        $this->foto_user = $_POST['image'];

        $sql = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $query = $this->conex->prepare($sql);
        $query->bindParam(1, $this->id);
        if($query->execute()){
          $resp[0]='1';
         if($this->foto_user == 'avatar.png'):
          
           else:
             unlink("../upload/".$this->foto_user);
         endif;
        }else{
           $resp[0]='2';
        }


      else:

        $resp[0]='3';

    endif;

    print_r(json_encode($resp) );
  }

  public function DeleteMultipleUser(){

    if(isset($_POST['id'])):

    $this->id = $_POST['id'];
    $numId = count($this->id);
    $carpeta          = "../upload/";

    //echo $numId;

      foreach( $this->id as $id):

          $sql = "SELECT foto FROM " . $this->table_name . " WHERE id= ?";
          $query = $this->conex->prepare($sql);
          $query->bindParam(1,$id,PDO::PARAM_INT);
          if(!$query->execute() )return false;
          
                          while($row = $query->fetch(PDO::FETCH_ASSOC)){
                          
                           for($i = 0; ($i < $numId); $i++){
                              if($row['foto'] == 'avatar.png')
                              continue;
                              unlink($carpeta.$row['foto']);

                            }
                          }



              

      endforeach;

      foreach($this->id as $id):
        
        $query = "DELETE FROM " . $this->table_name . " WHERE id= ?";
        $stmt = $this->conex->prepare($query);
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute(array($id));

      endforeach;
      

      else:


    endif;
  }

  public function exportarDataExcel($id){

    if(isset($id)):
    $this->id = $id;
  $numId = count($this->id);
 
    $sql = 'SELECT * 
        FROM '. $this->table_name .'
       WHERE id IN (' . implode(',', array_map('intval', $this->id)) . ');';
       $query = $this->conex->prepare($sql);
       
       if(!$query->execute() )return false;
       if($query->rowCount() > 0):

        while ( $row = $query->fetch(PDO::FETCH_ASSOC)) {
          echo $row['nombre'];
        }

        
        
        
        else:
          echo "no hay datos";

       endif;
       


    else:


      echo "no se han enviado datos";


    endif;


  }

  public function loginUser(){

    
     if(!empty($_POST['username']) AND !empty($_POST['password'])):

      $this->nombre = $_POST["username"];
      $this->clave = $_POST["password"];

      $sql = sprintf("SELECT 
      usuario.nombre,
      usuario.correo,
      usuario.apellido 
      FROM usuario  
      WHERE  usuario.nombre='%s' &&  usuario.clave='%s'",$this->nombre,$this->clave);
       try {
        
        $query=$this->conex->prepare($sql);
        if(!$query->execute()) return false;
        if($query->rowCount() > 0):
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $this->nombre    = $row['nombre'];
        $this->apellido  = $row['apellido'];
        $_SESSION['nombre']  = $this->nombre;
        $_SESSION['apellido']  = $this->apellido;
        $resp[0] = '1';
        else:
         $resp[0] = '3';

        endif;
      } catch(PDOException $e) {


       echo '{"error":{"text":'. $e->getMessage() .'}}'; 
     }

      else:

        $resp[0] = '2';

      endif;

      print_r(json_encode($resp) );
  }

}



?>
