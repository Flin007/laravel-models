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
                    //Забираем только 1е фото
                    $model->photo = json_decode($model->photos_json)[0];
                    //Получаем возраст по дате рождения
                    $model->age = Carbon::parse($model->bday)->age;
                    return $model;
                }
            );
        $popular_girls = Girl::query()
            ->limit(12)
            ->whereNotNull('photos_json')
            ->get()
            ->map(
                function ($model) {
                    //Забираем только 1е фото
                    $model->photo = json_decode($model->photos_json)[0];
                    //Получаем возраст по дате рождения
                    $model->age = Carbon::parse($model->bday)->age;
                    return $model;
                }
            );
        return view('home_ext_personal', compact('girls_slider', 'popular_girls'));
    }
}
