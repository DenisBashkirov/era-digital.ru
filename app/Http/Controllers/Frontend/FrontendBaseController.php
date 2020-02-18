<?php

namespace App\Http\Controllers\Frontend;

use App\CompanyContact;
use App\NavMenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Arr;
use Route;

class FrontendBaseController extends BaseController
{
    public function __construct()
    {
        $this->template = $action = Route::currentRouteName();
        $this->template = 'frontend.pages.' . $this->template;
    }
}
