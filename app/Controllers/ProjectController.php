<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\UserProjectModel;
use CodeIgniter\Controller;

class ProjectController extends BaseController
{
    public function projects(){
        $projectModel = new ProjectModel();
        $projects = $projectModel->getActiveProjects();
        $data['projects'] = $projects;
        return view('projects', $data);
    }

    public function addUserProject(){
        $project_id=$this->request->getVar('project_id');
        $user_id=session()->get('user')->id;
        if(!$user_id){
            return redirect()->to('/');
        }
        $userProjectModel = new UserProjectModel();
        $userProjectModel->addUserProject($user_id, $project_id);
        return $this->response->setStatusCode(200)->setJSON([
            'success' => true
        ]);
    }

    public function leaveProject(){
        $project_id=$this->request->getJsonVar('project_id');
        $user_id=session()->get('user')->id;
        $userProjectModel = new UserProjectModel();
        $userProjectModel->leaveUserProject($user_id, $project_id);
        return $this->response->setStatusCode(200)->setJSON([
            'success' => true
        ]);
    }

}