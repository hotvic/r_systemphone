<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shop\ProductPhoto;

class PicturesController extends Controller
{
    public function show($type, $id)
    {
        if ($type == 'product-photo')
        {
            $photo = ProductPhoto::find($id);

            if (!$photo) abort(404);

            return response(file_get_contents(ProductPhoto::getStorageDir() . $photo->path))
                ->header('Content-Type', mime_content_type(ProductPhoto::getStorageDir() . $photo->path));
        }

        abort(404);
    }
}
