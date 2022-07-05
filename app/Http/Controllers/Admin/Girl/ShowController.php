<?php

namespace App\Http\Controllers\Admin\Girl;

use App\Http\Controllers\Controller;
use App\Models\Girl;

class ShowController extends Controller
{
    public function __invoke(Girl $girl)
    {
        return view('admin.girls.show', compact('girl'));
    }
}
