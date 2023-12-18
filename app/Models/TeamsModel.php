<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamsModel extends Model
{
    protected $table      = 'teams';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['name_team', 'negara', 'tahun_berdiri', 'stadion', 'pelatih', 'manager', 'status'];
}
