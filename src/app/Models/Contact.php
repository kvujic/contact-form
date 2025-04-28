<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Type\FalseType;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeKeywordSearch($query, $keyword, $exact=false) {
        if(!empty($keyword)) {
            $query->where(function($subQuery) use ($keyword, $exact) {
                if($exact) {
                    $subQuery->where('name', $keyword)
                             ->orWhere('email', $keyword);
                } else {
                    $subQuery->where('name', 'like', '%' . $keyword . '%')
                             ->orWhere('email', 'like', '%' . $keyword . '%');
                }
            });
        }
    }

    public function scopeGenderSearch($query, $gender) {
        if(!empty($request->gender)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeCategorySearch($query, $category_id) {
        if(!empty($request->category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeDateSearch($query, $date) {
        if(!empty($request->date)) {
            $query->where('created_at', $date);
        }
    }
}
