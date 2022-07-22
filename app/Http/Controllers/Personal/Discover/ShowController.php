<?php

namespace App\Http\Controllers\Personal\Discover;

use App\Http\Controllers\Controller;
use App\Models\Girl;

class ShowController extends Controller
{
    public function __invoke(Girl $girl)
    {
        $girlPhotos = Girl::getPhotosArray($girl);
        return view('personal.discover.show', compact('girl','girlPhotos'));
    }
}
