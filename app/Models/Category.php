<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    static public function getSingle($id)
    {
        return Category::find($id);
    } 

    static public function getRecord()
    {
        return self::select('categories.*')
                ->where('is_delete', '=', 0)
                ->orderBy('id', 'desc')
                ->paginate(10);
    }

    static function getCategory()
    {
        return self::select('categories.*')
        ->where('status', '=', 1)
        ->where('is_delete', '=', 0)
        ->get();
    }
}
