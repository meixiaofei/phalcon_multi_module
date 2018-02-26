<?php

namespace App\Home\Controllers;

class IndexController extends ControllerBase
{
    
    public function indexAction()
    {
        /*return $this->dispatcher->forward([
            'controller'    => 'index',
            'action'        => 'register'
        ]);*/
        
//        rg_print($this->modelsManager->executeQuery('select COUNT(DISTINCT phone) AS phone FROM User')->toArray(), false);
//        rg_print($user->sql());
        if ($this->request->isAjax()) {
            $user = new \User();
            $page   = $this->request->get('page', 'int', 1);
            $limit  = $this->request->get('limit', 'int', 5);
            $offset = $limit * ($page - 1);
            $data   = $user->find(['order' => 'id', 'offset' => $offset, 'limit' => $limit]);
            $this->view->setVars(['status' => 1, 'msg' => 'succeed', 'data' => $data, 'count' => $user::count()]);
        }
        /*rg_print($result->toArray(), false);
        rg_print($user->sql(true));
        rg_print($this->profiler->getLastProfile()->getSqlStatement());

        $user->find([
            "phone = :phone: and password = :password:",
            'bind' => [
                'phone' => $phone,
                'password' => $pwd
            ]
        ]);

        rg_print($user->find('phone like \`%156%\`')->toArray(), false);*/
    }
    
    public function updateAction()
    {
        $user = new \User();
        $id   = $this->request->get('id');
        $user = $user->findFirstById($id);
        // should be judge whether or not have this data, but I'm lazy....
        $user->phone    = $this->request->get('phone');
        $user->password = $this->request->get('password');
        if ($user->save()) {
            $data = ['msg' => 'change succeed'];
        } else {
            $data = ['msg' => 'something goes wrong~'];
        }
        
        $this->view->setVars($data);
    }
    
    public function registerAction()
    {
        $user = new \User();
        
        $user->phone    = $this->request->get('phone');
        $user->password = $this->request->get('password');
        if ($user->save()) {
            $data = ['msg' => 'add succeed'];
        } else {
            $data = ['msg' => 'something goes wrong~'];
        }
        
        $this->view->setVars($data);
    }
    
    public function deleteAction()
    {
        $user = new \User();
        $id   = $this->request->get('id');
        $user = $user->findFirstById($id);
        if ($user) {
            if ($user->delete()) {
                $data = ['msg' => 'delete success'];
            } else {
                $data = ['msg' => 'delete failed'];
            }
        } else {
            $data = ['msg' => 'the data identified by '.$id.'is not exist'];
        }
        
        $this->view->setVars($data);
    }
    
}

