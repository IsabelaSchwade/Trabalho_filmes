<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FilmeModel;
use CodeIgniter\HTTP\ResponseInterface;

class Filme extends BaseController
{
    private $filmeModel;
    public function __construct(){
        $this->filmeModel = new FilmeModel();
    }

public function index($status = null)
{
   

    $builder = $this->filmeModel;
    $filmes = $builder->findAll();

    return view('filmes', [
        'filmes' => $filmes
    ]);
}



}
?>