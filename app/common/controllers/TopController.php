<?php

namespace App\Common\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;

class TopController extends Controller
{
    public function initialize()
    {
        
    }
    
    public function afterExecuteRoute(Dispatcher $dispatcher)
    {
        if ($this->request->isAjax() == true) {
            $this->view->disableLevel([
                View::LEVEL_ACTION_VIEW     => true,
                View::LEVEL_LAYOUT          => true,
                View::LEVEL_MAIN_LAYOUT     => true,
                View::LEVEL_AFTER_TEMPLATE  => true,
                View::LEVEL_BEFORE_TEMPLATE => true,
            ]);
            
            // $data = $dispatcher->getReturnedValue();
            
            $this->response->setContentType('application/json', 'UTF-8');
            $data = $this->view->getParamsToView();
            
            if (is_array($data)) {
                $default = ['code' => 0, 'msg' => '', 'data' => []];
                $data    = json_encode(array_merge($default, $data));
            }
            
            $this->response->setContent($data);
        }
        
        return $this->response->send();
    }
}
