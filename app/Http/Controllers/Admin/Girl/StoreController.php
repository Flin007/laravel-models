<?php

namespace App\Http\Controllers\Admin\Girl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Girl\StoreRequest;
use App\Models\Girl;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Girl::firstOrcreate($data);
        return redirect()->route('admin.category.index');
    }
}
