<?php

namespace App\Http\Controllers\Admin\Girl;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class GirlMethods
{
    /**
     * @param array $photos
     * @return string
     * Метод принимает массив из загруженных фотографий, сохраняет их
     * и вовзращает строку в формате Json с ссылками на эти фото
     */
    public function processUploadedPhotos(array $photos): string
    {
        $collection = new Collection();
        foreach ($photos as $photo){
            $collection->add(Storage::disk('public')->put('/images',$photo));
        }
        return $collection->toJson();
    }

    /**
     * @param string $photos_json
     * @return void
     * Метод принимает строку в формате Json с ссылками на фотографии,
     * которые нужно удалить при загрузке новых
     */
    //TODO: Мб стоит назвать эту функцию delete и использовать для удаления всех фоток из json
    public function processUpdatedPhotos(string $photos_json){
        if (isset($photos_json)){
            $photos = json_decode($photos_json);
            foreach ($photos as $photo){
                Storage::disk('public')->delete($photo);
            }
        }
    }
}
