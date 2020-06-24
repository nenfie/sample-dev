<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comic extends BaseController
{

    protected $comicModel;

    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }

    public function index()
    {

        // connect db without model
        // $db = \Config\Database::connect();
        // $comic = $db->query("SELECT * FROM comic");
        // foreach ($comic->getResultArray() as $row) {
        //     d($row);
        // }

        // $comicModel = new \App\Models\ComicModel();

        $data = [
            'title' => 'Comic List | CI4App',
            'comic' => $this->comicModel->getComic()
        ];

        return view('comic/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Comic Detail | CI4App',
            'comic' => $this->comicModel->getComic($slug)
        ];

        if (empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Comic title ' . $slug . ' is not found');
        }

        return view('comic/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Comic | CI4App'
        ];

        return view('comic/create', $data);
    }

    public function save()
    {
        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->comicModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover')
        ]);

        session()->setFlashdata('message', 'Data successfully saved');

        return redirect()->to('/comic');
    }
}
