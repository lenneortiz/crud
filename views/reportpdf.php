<!DOCTYPE html>
<html lang="es">
<head>
 <style>
 table{width:100%; border-collapse:collapse; table-layout:auto; vertical-align:top; margin-bottom:15px; border:none;}
 table thead th{font-size: 14px; color:#FFFFFF; background-color:#666666; border:1px solid #CCCCCC; border-collapse:collapse; text-align:center; table-layout:auto; vertical-align:middle;}
 table tbody td{vertical-align:top; border-collapse:collapse; border-left:1px solid #CCCCCC; border-right:1px solid #CCCCCC; font-size: 14px;text-align: center}
 table thead th, table tbody td{padding:5px; border-collapse:collapse;}
 table tbody tr.light{color:#979797; background-color:#F7F7F7;}
 table tbody tr.dark{color:#979797; background-color:#E8E8E8;}
 
 tbody>tr:nth-of-type(odd) {
     background-color:#f9f9f9
 }

 </style>
  </head>

  <body>
<table >
<caption><h3>Listado de usuarios activos</h3></caption>

          <thead>
           <tr>
            <th>ID</th>    
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Foto</th>
          </tr>
        </thead>
        
        <tbody>
        <?php while($row = $query->fetch(PDO::FETCH_ASSOC)){ ?>
          <tr>
            <td width="40px" height="30px"><?php echo $row ['id']; ?></td>
            <td width="40px" height="30px"><?php echo $row ['nombre']; ?></td>
            <td width="40px" height="30px"><?php echo $row ['apellido']; ?></td>
            <td width="40px" height="30px"><?php echo $row ['correo']; ?></td>
            <td width="40px" height="30px"> <?php echo'<img src="../upload/'.$row ['foto'].'" width="40px" height="30px">'; ?></td>
          </tr>
          <?php }?>
        </tbody>
</table>
    
</body>
</html>

