<?php

namespace App\Http\Controllers\Personal\Profile;

use App\Http\Controllers\Controller;
use App\Models\Girl;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function __invoke()
    {
        return view('personal.profile.index');
    }
}
