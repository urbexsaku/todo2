<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'user_id',
        'category_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeCategorySearch($query, $category_id){
        if (!empty($category_id)){ //$category_idが空でない場合
            $query->where('category_id',$category_id); //category_idで検索
        }
    }

    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)){ //keywordが空でない場合
            $query->where('content', 'like', '%' . $keyword . '%'); //$keyword部分一致で検索＜where('カラム名','like','%' . 検索内容 . '%');＞
        }

        return $query;
    }

}


