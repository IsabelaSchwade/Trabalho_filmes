<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FilmeModel;

class Filme extends BaseController
{
    private $filmeModel;

    public function __construct()
    {
        $this->filmeModel = new FilmeModel();
    }

    public function index($status = null)
    {
        $filmes = $this->filmeModel->findAll();

        return view('filmes', [
            'filmes' => $filmes
        ]);
    }

    public function form($id = null)
    {
        $filme = null;
        if ($id) {
            $filme = $this->filmeModel->find($id);
        }

        return view('form', ['filme' => $filme]);
    }

    public function cadastrar(){
    $postData = $this->request->getPost();
    
    // Buscar dados adicionais da OMDb
    $apiData = $this->fetchMovieData($postData['filme']);

    if ($apiData) {
        $postData = array_merge($postData, $apiData);
    }

    if ($this->filmeModel->save($postData)){
        return view("messages", [
            'message' => 'Produção salva com sucesso'
        ]);
    } else {
        echo "Ocorreu um erro";
    }
}

    public function editar($id)
    {
        $filme = $this->filmeModel->find($id);
        if (!$filme) return redirect()->to('/filmes')->with('error', 'Filme não encontrado');

        return $this->form($id);
    }

    public function atualizar($id)
    {
        $data = $this->request->getPost();
        if ($this->filmeModel->update($id, $data)) { // corrigido de atualizar() para update()
            return redirect()->to('/filmes')->with('message', 'Produção atualizada com sucesso!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Erro ao atualizar a produção.');
        }
    }

    public function view($id)
    {
        $filme = $this->filmeModel->find($id);
        if (!$filme) return redirect()->to('/filmes')->with('error', 'Filme não encontrado');

        return view('filme_view', ['filme' => $filme]);
    }
}
?>
