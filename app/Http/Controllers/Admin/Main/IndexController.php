<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Girl;
use App\Models\User;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function __invoke()
    {
        $data = [
            'usersCount' => User::count(),
            'girlsCount' => Girl::count(),
        ];
        return view('admin.main.index', compact('data'));
    }
}
