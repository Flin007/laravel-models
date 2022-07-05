<?php

namespace App\Http\Controllers\Admin\Girl;

use App\Http\Controllers\Controller;
use App\Models\Girl;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $girls = Girl::paginate(10);
        return view('admin.girls.index', compact('girls'));
    }
}
