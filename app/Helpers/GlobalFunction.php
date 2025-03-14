<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class GlobalFunction
{
    public static function saveImage($image, $name, $path = '')
    {
        if ($image == null) {
            return null;
        }
        $extension = $image->getClientOriginalExtension();
        $filename = $name . '.' . $extension;
        $path = public_path('dist/assets/img/' . $path);
        $image->move($path, $filename);
        return $filename;
    }

    public static function deleteImage($filename, $path = '')
    {
        $path = public_path('dist/assets/img/' . $path);
        if (file_exists($path . $filename)) {
            unlink($path . $filename);
        } 
    }

    public static function pemisahKoma($data)
    {
        foreach (explode(',', $data) as $listData) {
            return trim($listData);
        }
    }

    public static function searchGlobal($table, $columns, $data)
    {
        return DB::table($table)
            ->where(function ($query) use ($columns, $data) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . $data . '%');
                }
            })
            ->paginate(2);
    }

    public static function saveVideo($video, $name, $path = '')
    {
        if ($video == null) {
            return null;
        }
        $extension = $video->getClientOriginalExtension();
        $filename = $name . '.' . $extension;
        $path = public_path('dist/assets/video/' . $path);
        $video->move($path, $filename);
        return $filename;
    }

    public static function deleteVideo($filename, $path = '')
    {
        $path = public_path('dist/assets/video/' . $path);
        if (file_exists($path . $filename)) {
            unlink($path . $filename);
        } else {
            // return false;
        }
    }

    public static function convertBase64ToImage(string $base64)
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $base64, $matches)) {
            $extension = $matches[1];
            $base64Str = preg_replace('/^data:image\/\w+;base64,/', '', $base64);
        } else {
            return false;
        }

        $base64Str = str_replace(' ', '+', $base64Str);
        $imageData = base64_decode($base64Str);

        if (!$imageData) {
            return false;
        }

        $tempFile = tempnam(sys_get_temp_dir(), 'img_') . '.' . $extension;
        file_put_contents($tempFile, $imageData);

        return new UploadedFile($tempFile, 'image.' . $extension, mime_content_type($tempFile), null, true);
    }

    public static function pembulatan($angka){
        return number_format($angka, 2, ',', '.');
    }

}
