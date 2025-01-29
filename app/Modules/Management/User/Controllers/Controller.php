<?php

namespace App\Modules\Management\User\Controllers;

use App\Modules\Management\User\Actions\GetAllData;

use App\Http\Controllers\Controller as ControllersController;


class Controller extends ControllersController
{

    public function index( ){
        $data = GetAllData::execute();
        return $data;
    }



}