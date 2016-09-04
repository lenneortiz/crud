<!DOCTYPE html>
<html lang="es">
<head>
 <style>
 table{width:100%; border-collapse:collapse; table-layout:auto; vertical-align:top; margin-bottom:15px; }
 table thead th{font-size: 14px; color:#FFFFFF; background-color:#666666; border:1px solid #CCCCCC; border-collapse:collapse; text-align:center; table-layout:auto; vertical-align:middle;}
 table tbody td{vertical-align:top; border-collapse:collapse; border-left:1px solid #CCCCCC; border-right:1px solid #CCCCCC; font-size: 14px;text-align: left}
 table thead th, table tbody td{padding:5px; border-collapse:collapse;}
 table tbody tr.light{color:#979797; background-color:#F7F7F7;}
 table tbody tr.dark{color:#979797; background-color:#E8E8E8;}
  .titulo-user{
      width: 100%;
      text-align: center;
      background: #64868E;
      padding: 5px 0;
      color: #fff

    }
    #container{
      width: 700px;
      height: 400px;
      background: #D1E4D1;
      margin: 0 auto;
      margin-top: 10px;

    }
    .cont-foto{
      background: #F3FBF1;
      width: 210px;
      height: 90px
    }
    table td img{
      margin: 0 auto;
    }

 </style>
  </head>

  <body>
  <div id="container">
  <?php while($row = $query->fetch(PDO::FETCH_ASSOC)){ ?>
  <div class="titulo-user"><h2>Datos del usuario: <?php echo $row ['nombre']; ?></h2></div>
  <table border="1px" border-color="#6C737E">
  
             <tr>
                 <td class="cont-foto" rowspan="3"><?php echo'<img src="../upload/'.$row ['foto'].'" width="200px" height="110px">'; ?></td>
                 <td class="datos" >Nombre: <?php echo $row ['nombre']; ?></td>
                 
             </tr>
             <tr>
                 <td class="datos">Apellido: <?php echo $row ['apellido']; ?></td>
                 
             </tr>
             <tr>
                 <td class="datos">Correo: <?php echo $row ['correo']; ?></td>
                 
             </tr>
   
         </table>
         <?php }?>
  </div>     
       
    
</body>
</html>

