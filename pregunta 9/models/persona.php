<?php


   require_once "conexion/Conexion.php";
   class persona{
       public static function getAll(){
           $db = new Connection();
           $query = "SELECT * FROM persona";
           $resultado = $db->query($query);
           
           $datos = [];
           if($resultado->num_rows){
            while($row = $resultado->fetch_assoc()){
                $datos[] = [
                    'ci'=> $row['ci'],
                    'nombre'=> $row['nombre'],
                    'fecnac'=> $row['fecnac'],
                    'departamento'=> $row['departamento']
            ];
            }
            return $datos;

           }
       }

       public static function getWhere($ci){
        $db = new Connection();
        $query = "SELECT * FROM persona where ci = $ci";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows){
         while($row = $resultado->fetch_assoc()){
             $datos[] = [
                 'ci'=> $row['ci'],
                 'nombre'=> $row['nombre'],
                 'fecnac'=> $row['fecnac'],
                 'departamento'=> $row['departamento']
         ];
         }
         return $datos;

        }
    }

    public static function insert($ci, $nombre, $fecnac, $departamento){
        $db = new Connection();
        $query = "INSERT INTO persona values('".$ci."','".$nombre."','".$fecnac."','".$departamento."')";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }else return false;
    }

    public static function update($ci, $nombre, $fecnac, $departamento){
        $db = new Connection();
        $query = "UPDATE  persona SET
        ci = '".$ci."', nombre = '".$nombre."', fecnac = '".$fecnac."', departamento = '".$departamento."'
        where ci = $ci";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }else return false;
    }

    public static function delete($ci){
        $db = new Connection();
        $query = "DELETE FROM persona WHERE  ci = $ci";
        $db->query($query);
        if($db->affected_rows){
            return true;
        }else return false;
    }


   }