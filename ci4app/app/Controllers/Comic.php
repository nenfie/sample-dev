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
        // session();

        $data = [
            'title' => 'Add New Comic | CI4App',
            'validation' => \Config\Services::validation()
        ];

        return view('comic/create', $data);
    }

    public function save()
    {
        // input validation
        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[comic.title]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/comic/create')->withInput()->with('validation', $validation);
        }

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

    public function delete($id)
    {
        $this->comicModel->delete($id);

        session()->setFlashdata('message', 'Data successfully deleted');

        return redirect()->to('/comic');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Comic | CI4App',
            'validation' => \Config\Services::validation(),
            'comic' => $this->comicModel->getComic($slug)
        ];

        return view('comic/edit', $data);
    }

    public function update($id)
    {
        // check for Title
        $oldComic = $this->comicModel->getComic($this->request->getVar('slug'));

        if ($oldComic['title'] == $this->request->getVar('title')) {
            $rule_title = 'required';
        } else {
            $rule_title = 'required|is_unique[comic.title]';
        }

        // input validation
        if (!$this->validate([
            'title' => [
                'rules' => $rule_title,
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/comic/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->comicModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover')
        ]);

        session()->setFlashdata('message', 'Data successfully updated');

        return redirect()->to('/comic');
    }
}
