<?php

namespace App\Http\Controllers\Admin\Girl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Girl\StoreRequest;
use App\Models\Girl;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, GirlMethods $girlMethods): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        //Добавляем строку в формате json с ссылками на загруженные фото
        if (isset($data['photos'])){
            $data['photos_json'] = $girlMethods->processUploadedPhotos($data['photos']);
            unset($data['photos']);
        }

        Girl::create($data);
        return redirect()->route('admin.girls.index');
    }
}
