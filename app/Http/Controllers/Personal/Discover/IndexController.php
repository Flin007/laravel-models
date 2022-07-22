<?php

namespace App\Http\Controllers\Personal\Discover;

use App\Http\Controllers\Controller;
use App\Models\Girl;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function __invoke()
    {
        $girls = Girl::paginate(12);
        //Если девушек меньше 6 передаем флаг для сокращения grid сетки на фронте
        $count = $girls->getCollection()->count() <= 6;
        $girls->getCollection()->transform(function ($model) {
            //Если есть фото, возращаем 1е, если нет false
            if (isset($model->photos_json)) {
                $model->photo = json_decode($model->photos_json)[0];
            } else {
                $model->photo = false;
            }
            //Получаем возраст по дате рождения
            $model->age = Carbon::parse($model->bday)->age;
           return $model;
        });

        return view('personal.discover.index', compact('girls', 'count'));
    }
}
