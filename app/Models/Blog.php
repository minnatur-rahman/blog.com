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
        return self::select('blog.*', 'users.name as user_name', 'categories.name as category_name')
                  ->join('users', 'users.id', '=', 'blog.user_id')
                  ->join('categories', 'categories.id', '=', 'blog.category_id')
                  ->orderBy('blog.id', 'desc')
                  ->paginate(5);
  }
}
