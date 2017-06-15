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

        $user = new \User();
        $phone  = 15612345678;
        $pwd    = 123456;
//        rg_print($this->modelsManager->executeQuery('select COUNT(DISTINCT phone) AS phone FROM User')->toArray(), false);
//        rg_print($user->sql());

        $test = $user->find(["phone = $phone and password = $pwd", 'order' => 'id', 'limit' => 20]);
        rg_print($test->toArray(), false);
        rg_print($user->sql(true));
        rg_print($this->profiler->getLastProfile()->getSqlStatement());

        $user->find([
            "phone = :phone: and password = :password:",
            'bind' => [
                'phone' => $phone,
                'password' => $pwd
            ]
        ]);

        rg_print($user->find('phone like \`%156%\`')->toArray(), false);
    }

    public function registerAction()
    {
        $user = new \User();

        $user->phone = 15623530305;
        $user->password = 123456;

        rg_print($user->save());
    }

    public function deleteAction()
    {
        $user = new \User();
        $id = $this->request->get('id');
        $user = $user->findFirstById($id);
        if ($user) {
            if ($user->delete()) {
                echo 'delete success';
            } else {
                echo 'delete failed';
            }
        } else {
            echo 'the data identified by '. $id. 'is not exist';
        }
    }

}

