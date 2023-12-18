<?php

namespace App\Models;

use CodeIgniter\Model;

class PlayersModel extends Model
{
    protected $table      = 'players';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['team_id', 'name', 'negara', 'tgl_lahir', 'nomor_punggung', 'posisi_pemain', 'status'];

    public function getPlayersByTeam($id)
    {
        return $this->where('team_id', $id)
            ->groupBy('team_id')
            ->find();
    }

    public function deleteByTeam($id)
    {
        return $this->where('team_id', $id)
            ->delete();
    }

    public function getTeamsWithPlayers()
    {
        return $this->select('teams.*, COUNT(players.id) as player_count')
            ->join('teams', 'teams.id = players.team_id', 'left')
            ->groupBy('teams.id')
            ->orderBy('id', 'DESC')
            ->findAll();
    }
}
