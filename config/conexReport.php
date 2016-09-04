<?php 
function conectaDb()
{
    try {
        $conn = new PDO(DSN,DB_USER,DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("set names utf8");
        return($conn);
    } catch(PDOException $e) {
        cabecera("Error grave", MENU_PRINCIPAL);
        print "  <p>Error: No puede conectarse con la base de datos.</p>\n\n";
        print "  <p>Error: " . $e->getMessage() . "</p>\n";
        pie();
        exit();
    }
}

 ?>