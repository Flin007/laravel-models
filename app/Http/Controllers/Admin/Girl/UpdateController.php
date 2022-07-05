<?php

namespace App\Http\Controllers\Admin\Girl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Girl\UpdateRequest;
use App\Models\Girl;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Girl $girl )
    {
        $data = $request->validated();
        $girl->update($data);
        return view('admin.girls.show', compact('girl'));
    }
}
