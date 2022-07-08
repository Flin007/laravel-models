<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Girl;

class PersonalHomeController extends Controller
{
    public function __invoke()
    {
        return redirect()->route('personal.discover.index');
    }
}
