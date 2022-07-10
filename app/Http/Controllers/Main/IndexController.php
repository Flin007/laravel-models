<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Girl;
use Carbon\Carbon;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function __invoke()
    {
        $girls_slider = Girl::inRandomOrder()
            ->limit(8)
            ->whereNotNull('photos_json')
            ->get()
            ->map(
                function ($model) {
                    $arr['name'] = $model->name;
                    $arr['age'] = Carbon::parse($model->bday)->age;
                    $arr['photo'] = json_decode($model->photos_json)[0];
                    return $arr;
                }
            );
        return view('home_ext_personal', compact('girls_slider'));
    }
}
