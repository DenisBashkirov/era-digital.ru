<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Route;
use Illuminate\Support\Arr;

class BaseController extends Controller
{
    protected $template;
    protected $vars;

    protected function varsAdd($key, $val) {
        return $this->vars = Arr::add($this->vars, $key, $val);
    }

    protected function  renderOutput() {
        $data = $this->vars;

        if (!empty($data))
            return view($this->template, $data);
        else
            return view($this->template);
    }
}
