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

    public function index()
    {
        $filmes = $this->filmeModel->findAll();

        return view('filmes', [
            'filmes' => $filmes,
            'message' => session()->getFlashdata('message'),
            'error' => session()->getFlashdata('error')
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

    public function cadastrar()
    {
        $postData = $this->request->getPost();

        // Se você tiver integração com OMDb
        if (method_exists($this, 'fetchMovieData')) {
            $apiData = $this->fetchMovieData($postData['filme']);
            if ($apiData) {
                $postData = array_merge($postData, $apiData);
            }
        }

        if ($this->filmeModel->save($postData)) {
            return redirect()->to('/filmes')->with('message', 'Produção salva com sucesso!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Erro ao salvar a produção.');
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
        if ($this->filmeModel->update($id, $data)) {
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
