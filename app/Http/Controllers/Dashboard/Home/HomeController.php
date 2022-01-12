<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use function view;

class HomeController extends Controller
{

    public function __invoke() : View
    {
        return view('dashboard.home.index');
    }
}
