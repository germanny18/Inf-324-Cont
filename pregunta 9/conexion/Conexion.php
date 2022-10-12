<?php
   class Connection extends Mysqli{
    function __construct(){
        parent::__construct('localhost', 'root', '','bdronald');
        $this->set_charset('utf8');
        $this->connect_error == NULL ? 'Conexion exitosa':die('error al conectarese');

    }

   }