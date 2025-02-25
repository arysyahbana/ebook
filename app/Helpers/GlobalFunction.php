<?php

namespace App\Helpers;

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
        } else {
            // return false;
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
}
