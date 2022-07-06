<?php

namespace App\Http\Controllers\Admin\Girl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Girl\UpdateRequest;
use App\Models\Girl;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Girl $girl, GirlMethods $girlMethods)
    {
        $data = $request->validated();

        if (isset($data['photos'])){
            //Проверяем есть ли уже загруженные фото у девушки и удаляем их
            if (isset($girl->photos_json)){
                $girlMethods->processUpdatedPhotos($girl->photos_json);
            }

            //Добавляем строку в формате json с ссылками на загруженные фото
            $data['photos_json'] = $girlMethods->processUploadedPhotos($data['photos']);
            unset($data['photos']);
        }

        $girl->update($data);

        $girlPhotos = Girl::getPhotosArray($girl);
        return view('admin.girls.show', compact('girl','girlPhotos'));
    }
}
