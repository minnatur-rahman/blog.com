<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    static public function getRecord()
    {
        return self::select('blogs.*', 'users.name as user_name', 'categories.name as category_name')
                  ->join('users', 'users.id', '=', 'blogs.user_id')
                  ->join('categories', 'categories.id', '=', 'blogs.category_id')
                  ->where('blogs.is_delete', '=', 0)
                  ->orderBy('blogs.id', 'desc')
                  ->paginate(5);
  }
}
