<?php

namespace App\Controllers;

use App\Models\DiscussionModel;
use App\Models\UserProjectModel;
use CodeIgniter\Controller;

class DiscussionController extends BaseController
{
    public function discussion()
    {
        $userProjectModel = new UserProjectModel();
        $userProjects = $userProjectModel->getUserProjects();
        $data['userProjects'] = $userProjects;
        return view('discussion', $data);
    }

    public function getDiscussionDetails()
    {
        $projectId = $this->request->getJsonVar('projectId');
        $discussionModel = new DiscussionModel();
        $discussions = $discussionModel->getDiscussion($projectId);
        return $this->response->setStatusCode(200)->setJSON([
            'success' => true,
            'discussion' => $discussions
        ]);
    }

    public function sendMessage()
    {
        date_default_timezone_set('Asia/Yerevan');
        $message = $this->request->getJsonVar('message_title');
        $user_id = session()->get('user')->id;
        $projectId = $this->request->getJsonVar('project_id');
        $timestamp = Date('Y-m-d H:i:s');
        $discussionModel = new DiscussionModel();
        $data['project_id'] = $projectId;
        $data['message_title'] = $message;
        $data['user_id'] = $user_id;
        $data['action_date'] = $timestamp;
        $discussionModel->insert($data);
        return $this->response->setStatusCode(200)->setJSON([
            'success' => true
        ]);

    }

}