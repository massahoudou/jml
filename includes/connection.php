<?php

//connection  a la base


    try
    {
        $bd = new  PDO('mysql:host=localhost;dbname=jml','root','');
        $bd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $bd->setAttribute(PDO::ATTR_ERRMODE  , PDO::ERRMODE_EXCEPTION);



    }
    catch (Exception $e)
    {
        die('ERREUR  : '.$e->getMessage() );
    }


