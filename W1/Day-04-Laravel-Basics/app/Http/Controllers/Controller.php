<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PageController extends BaseController
{
    public function home()
    {
        return "Home Page";
    }

    public function about()
    {
        return "About Page";
    }

    public function services()
    {
        return "Services Page";
    }

    public function contact()
    {
        return "Contact Page";
    }
}
