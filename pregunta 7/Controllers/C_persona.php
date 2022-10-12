<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\m_persona;
class C_persona extends Controller{

    public function index()
    {

        $per = new m_persona();
        $datos['personas']=$per->findAll();
        return view('welcome_message',$datos);
    }

    public function agregar()
    {
        return view('agregar');
    }
    public function insertar()
    {
       
        $per = new m_persona();

        $data=[
            'ci' => $_POST['ci'],
            'nombre' => $_POST['nombre'],
            'fecnac' => $_POST['fecnac'],
            'departamento' => $_POST['departamento']
            
        ];
        //print_r($data);

        $per->insert($data);
        return redirect()->to(base_url());
    }
    public function eliminar($ci=null)
    {
        print_r($ci);
       $per = new m_persona();

        $per->delete($ci);
        return redirect()->to(base_url());
    }
    public function editar($ci = null)
    {
        $per = new m_persona();
        $registro['persona']= $per->find($ci);
        //print_r($registro);
      return view('actualizando',$registro);
    }
    public function factualizar()
    {
        $per = new m_persona();
        $ci= $_POST['ci'];

        $data = [
            'nombre' => $_POST['nombre'],
            'fecnac' => $_POST['fecnac'],
            'departamento' => $_POST['departamento']
        ];
        $per->update($ci,$data);
       return redirect()->to(base_url());
    }
}