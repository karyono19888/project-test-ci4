<?php

namespace App\Controllers\TeamManagement;

use App\Controllers\BaseController;
use App\Models\TeamsModel;

class Team extends BaseController
{
    protected $teamsModel;

    public function __construct()
    {
        $this->teamsModel = new TeamsModel();
    }

    public function index()
    {
        return view('teamManagement/team/v_index', [
            "title" => "List Team",
            "data"  => $this->teamsModel->findAll(),
            "total" => $this->teamsModel->countAll(),
            "aktif" => $this->teamsModel->where('status', 'aktif')->countAllResults(),
            "tidak_aktif" => $this->teamsModel->where('status', 'tidak aktif')->countAllResults(),
        ]);
    }

    public function create()
    {
        return view('teamManagement/team/v_create', [
            "title"         => "Create Data Team",
            "validation"    =>  \Config\Services::validation(),

        ]);
    }

    public function save()
    {
        if (!$this->validate([
            'name'      => 'required|is_unique[teams.name_team]',
        ])) {
            // The validation failed.
            $validation = \Config\Services::validation();
            return redirect()->to('team-management/list/create')->withInput()->with('validation',  $validation);
        }

        $this->teamsModel->save([
            'name_team'     => $this->request->getVar('name'),
            'negara'        => $this->request->getVar('negara'),
            'tahun_berdiri' => $this->request->getVar('tahun_berdiri'),
            'stadion'       => $this->request->getVar('stadion'),
            'pelatih'       => $this->request->getVar('pelatih'),
            'manager'       => $this->request->getVar('manager'),
            'status'        => $this->request->getVar('status')
        ]);

        session()->setFlashdata('message', 'New created data successfully');
        return redirect()->to('team-management/list');
    }

    public function edit($id)
    {
        return view('teamManagement/team/v_edit', [
            "title"         => "Edit Data Team",
            "data"          => $this->teamsModel->find($id),
            "validation"    =>  \Config\Services::validation(),

        ]);
    }

    public function update($id)
    {
        $oldName = $this->teamsModel->find($id);
        if ($oldName['name_team'] === $this->request->getVar('name')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[teams.name_team]';
        }

        if (!$this->validate([
            'name'      => $rule,
        ])) {
            // The validation failed.
            $validation = \Config\Services::validation();
            return redirect()->to('team-management/list/edit/' . $id)->withInput()->with('validation',  $validation);
        }
        $data = [
            'name_team'     => $this->request->getVar('name'),
            'negara'        => $this->request->getVar('negara'),
            'tahun_berdiri' => $this->request->getVar('tahun_berdiri'),
            'stadion'       => $this->request->getVar('stadion'),
            'pelatih'       => $this->request->getVar('pelatih'),
            'manager'       => $this->request->getVar('manager'),
            'status'        => $this->request->getVar('status')
        ];

        $this->teamsModel->set($data);
        $this->teamsModel->where('id', $id);
        $this->teamsModel->update();

        session()->setFlashdata('message', 'Updated data successfully');
        return redirect()->to('team-management/list');
    }


    public function delete($id)
    {
        $this->teamsModel->delete($id);
        session()->setFlashdata('message', 'Delete data successfully');
        return redirect()->to('team-management/list');
    }
}
