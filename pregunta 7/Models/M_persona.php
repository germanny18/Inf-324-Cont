<?php 
namespace App\Models;

use CodeIgniter\Model;

class M_persona extends Model{
    protected $table      = 'persona';
     protected $primaryKey = 'ci';

    protected $allowedFields = ['ci','nombre','fecnac','departamento'];
}