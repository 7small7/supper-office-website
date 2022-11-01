<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use zgldh\QiniuStorage\QiniuStorage;

/**
 * 上传图片
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class UploadImgController extends Controller
{
    /**
     * 上传图片
     * @link   https://www.yuque.com/okwvip
     * @return Application|ResponseFactory|Response
     * @author kert
     */
    public function upload(Request $request)
    {
        // 判断是否有文件上传
        if ($request->hasFile('laravel-admin-file')) {
            $file = $request->file('laravel-admin-file');
            $disk = QiniuStorage::disk('qiniu');
            // 上传文件扩展限制
            $fileName = md5($file->getClientOriginalName() . time() . rand()) . '.' . $file->getClientOriginalExtension();
            $bool     = $disk->put('image_' . $fileName, file_get_contents($file->getRealPath()));
            if ($bool) {
                $path = $disk->downloadUrl('image_' . $fileName);
                return response([
                    "errno" => 0,
                    "data"  => [
                        "url"  => $path,
                        "alt"  => $fileName,
                        "href" => "",
                    ],
                ]);
            }
            return response([
                "errno"   => 1,
                "message" => "图片上传错误1",
            ]);
        }
        return response([
            "errno"   => 1,
            "message" => "图片上传错误2",
        ]);
    }
}
