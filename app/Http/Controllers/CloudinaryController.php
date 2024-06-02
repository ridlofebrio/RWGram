<?php

namespace App\Http\Controllers;

use Cloudinary\Api\Admin\AdminApi;
use Illuminate\Http\Request;

class CloudinaryController extends Controller
{
    //

    public function upload(Request $request)
    {
        $file = cloudinary()->uploadApi()->upload($request->file('file')->getRealPath(), $options = []);
        // return $request->file('file');
        return $file;
    }

    public function removeImage($asset_id)
    {
        $result = (array) (new AdminApi())->assetByAssetId($asset_id);

        $public_ids = $result['public_id'];
        $result = (new AdminApi())->deleteAssets(
            $public_ids,
            ["resource_type" => "image", "type" => "upload"]
        );

        return $result;
    }
}
