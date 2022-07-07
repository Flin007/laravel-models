<?php

namespace App\Http\Controllers\Personal\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Profile\UpdateRequest;
use App\Models\Girl;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();
        if (isset($data['photo'])){
            if ($user->photo){
                Storage::disk('public')->delete($user->photo);
            }
            $data['photo'] = Storage::disk('public')->put('/user_photos', $data['photo']);
        }
        $user->update($data);
        return redirect()->route('personal.profile.index');
    }
}
