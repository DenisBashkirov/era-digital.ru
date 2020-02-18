<?php

namespace App\Http\Controllers\Frontend;

use App\Events\LeadFormSubmitted;
use App\Feedback;
use App\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Route;
use Cookie;

class FrontendOutputController extends FrontendBaseController
{

    public function home(Request $request) {

        return $this->renderOutput();
    }

}
