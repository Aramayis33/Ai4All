<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProjectModel extends Model
{
    protected $table = 'user_projects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'project_id'];

    public function addUserProject($userId, $projectId){
        $builder = $this->db->table($this->table);
        $builder->insert(['user_id' => $userId, 'project_id' => $projectId]);
    }

    public function getUserProjects(){
        $user_id=session()->get('user')->id??0;
        if(!$user_id){
            return false;
        }
        $builder = $this->db->table($this->table);
        $builder->join('projects', 'projects.id = user_projects.project_id');
        $builder->where('user_id', $user_id);
        return $builder->get()->getResultArray();
    }
    public function leaveUserProject($userId, $projectId){
        $builder = $this->db->table($this->table);
        $builder->where('user_id', $userId);
        $builder->where('project_id', $projectId);
        $builder->delete();
    }


}