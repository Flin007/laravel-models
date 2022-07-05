<?php

namespace App\Http\Controllers\Admin\Girl;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Girl\StoreRequest;
use App\Models\Girl;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Json;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        //Добавляем строку в формате json с ссылками на загруженные фото
        $data['photos_json'] = $this->processUploadedPhotos($data['photos']);
        unset($data['photos']);
        Girl::create($data);
        return redirect()->route('admin.girls.index');
    }

    /**
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
}
