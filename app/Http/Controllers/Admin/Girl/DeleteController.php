<?php

namespace App\Http\Controllers\Admin\Girl;

use App\Http\Controllers\Controller;
use App\Models\Girl;

class DeleteController extends Controller
{
    public function __invoke(Girl $girl)
    {
        $girl->delete();
        return redirect()->route('admin.girls.index');
    }
}
