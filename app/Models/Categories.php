<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function news() {
        return $this->hasMany(News::class);
    }


    //    public function getCategoryNameBySlug($slug) {
//        $id = $this->getCategoryIdBySlug($slug);
//        $category = $this->getCategoryById($id);
//        return $category['title'] ?? "";
//    }
//
//    public function getCategoryIdBySlug($slug) {
//        $id = null;
//        foreach ($this->getCategories() as $category) {
//            if ($category['slug'] == $slug) {
//                $id = $category['id'];
//                break;
//            }
//        }
//        return $id;
//    }
//
//    public function getCategoryById($id)
//    {
//        return $this->getCategories()[$id] ?? [];
//    }
}
