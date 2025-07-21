<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';

    public function getActiveProjects()
    {
        $userId = session()->get('user') ? session()->get('user')->id : 0;
//
//        $builder = $this->db->table($this->table);
//        $builder->select('projects.*');
//        $builder->join('user_projects', 'user_projects.project_id = projects.id AND user_projects.user_id = ' . $this->db->escape($userId), 'left');
//        $builder->where('projects.active', 1);
//        $builder->where('user_projects.user_id IS NULL');
        return $this->db->table('projects')->select('projects.*')
            ->join('user_projects', 'user_projects.project_id = projects.id AND user_projects.user_id = '
                . $this->db->escape($userId), 'left')->where('projects.active', 1)
            ->where('user_projects.user_id IS NULL')->get()->getResultArray();


//        return $builder->get()->getResultArray();
    }
}