<?php
namespace App\Helpers;

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Search\SearchApi;
use Cloudinary\Api\Admin\AdminApi;
use Cloudinary\Api\Upload\UploadApi;
class ImgHelper {
    static function uploadImage($img) {
        $tempPath = sys_get_temp_dir() . '/' . $img->getClientOriginalName();
        $img->move(sys_get_temp_dir(), $img->getClientOriginalName());
    
        Configuration::instance('cloudinary://364815279846566:9b8ypzbTNsmZSgQiLhrMnUQeKiI@dzcbguuls?secure=true');
        try {
            $result = (new UploadApi())->upload($tempPath, [
                'asset_folder' => 'x-clone',
                'resource_type' => 'image'
            ]);
            unlink($tempPath);
            return $result['url'];
        } catch (\Throwable $th) {
            // Eliminar el archivo temporal en caso de error
            unlink($tempPath);
            throw $th;
        }
    }
    
}