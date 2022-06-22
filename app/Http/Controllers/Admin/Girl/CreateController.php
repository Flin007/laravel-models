<?php

namespace App\Http\Controllers\Admin\Girl;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.girls.create');
    }
}
