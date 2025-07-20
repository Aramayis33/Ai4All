<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscussionModel extends Model
{
    protected $table = 'discussion';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'project_id', 'message_title','action_date'];

    public function getDiscussion($project_id)
    {
        $builder = $this->db->table('discussion');
        $builder->select('*');
        $builder->join('users', 'users.id = discussion.user_id');
        $builder->where('project_id', $project_id);
        $builder->orderBy('action_date', 'ASC'); // պարտադիր՝ օրերի կարգով

        $results = $builder->get()->getResultArray();

        $grouped = [];

        foreach ($results as $row) {
            $date = date('Y-m-d', strtotime($row['action_date']));
            $grouped[$date][] = $row;
        }

        return $grouped;
    }
    public function sendMessage($data){
        $builder = $this->db->table($this->table);
        $builder->insert($data);
    }


}