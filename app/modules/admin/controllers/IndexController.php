<?php

namespace App\Admin\Controllers;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        rg_print('admin/index');
    }

    public function testAction()
    {
        rg_print('admin/test');
    }
}