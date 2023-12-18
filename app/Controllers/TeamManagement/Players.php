<?php

namespace App\Controllers\TeamManagement;

use App\Controllers\BaseController;
use App\Models\PlayersModel;
use App\Models\TeamsModel;

class Players extends BaseController
{
    protected $playersModel;
    protected $teamModel;

    public function __construct()
    {
        $this->playersModel = new PlayersModel();
        $this->teamModel    = new TeamsModel();
    }

    public function index()
    {
        return view('teamManagement/players/v_index', [
            "title" => "List players",
            "data"  => $this->playersModel->getTeamsWithPlayers(),
            "total" => $this->playersModel->countAll(),
            "aktif" => $this->playersModel->where('status', 'aktif')->countAllResults(),
            "tidak_aktif" => $this->playersModel->where('status', 'tidak aktif')->countAllResults(),
        ]);
    }

    public function create()
    {
        return view('teamManagement/players/v_create', [
            "title"         => "Create Data players",
            "teams"         =>  $this->teamModel->where('status', 'aktif')->get(),
            "validation"    =>  \Config\Services::validation(),

        ]);
    }

    public function save()
    {
        foreach ($this->request->getVar('item') as $key => $value) {
            $this->playersModel->save([
                'team_id'       => $this->request->getVar('teams'),
                'name'          => $value['name'],
                'negara'        => $value['negara'],
                'tgl_lahir'     => $value['tgl_lahir'],
                'nomor_punggung' => $value['nomor_punggung'],
                'posisi_pemain' => $value['posisi_pemain'],
                'status'        => $value['status']
            ]);
        }

        session()->setFlashdata('message', 'New created data successfully');
        return redirect()->to('team-management/players');
    }

    public function edit($id)
    {
        return view('teamManagement/players/v_edit', [
            "title"         => "Edit Data players",
            "teams"         => $this->teamModel->where('status', 'aktif')->get(),
            "team_id"       => $this->playersModel->getPlayersByTeam($id),
            "data"          => $this->playersModel->where('team_id', $id)->get(),
            "validation"    => \Config\Services::validation(),

        ]);
    }

    public function update($id)
    {
        $this->playersModel->deleteByTeam($id);

        foreach ($this->request->getVar('item') as $key => $value) {
            $this->playersModel->save([
                'team_id'       => $this->request->getVar('teams'),
                'name'          => $value['name'],
                'negara'        => $value['negara'],
                'tgl_lahir'     => $value['tgl_lahir'],
                'nomor_punggung' => $value['nomor_punggung'],
                'posisi_pemain' => $value['posisi_pemain'],
                'status'        => $value['status']
            ]);
        }

        session()->setFlashdata('message', 'Updated data successfully');
        return redirect()->to('team-management/players');
    }


    public function delete($id)
    {
        $this->playersModel->deleteByTeam($id);
        session()->setFlashdata('message', 'Delete data successfully');
        return redirect()->to('team-management/players');
    }
}
