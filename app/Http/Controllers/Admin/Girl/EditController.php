<?php

namespace App\Http\Controllers\Admin\Girl;

use App\Http\Controllers\Controller;
use App\Models\Girl;

class EditController extends Controller
{
    public function __invoke(Girl $girl)
    {
        return view('admin.girls.edit', compact('girl'));
    }
}
