<?php

namespace App\Http\Controllers\Personal\Discover;

use App\Http\Controllers\Controller;
use App\Models\Girl;

class IndexController extends Controller
{
    public function __invoke()
    {
        $girls = Girl::paginate(10);
        return view('personal.discover.index', compact('girls'));
    }
}
