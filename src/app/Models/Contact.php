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
                    $normalized = str_replace('　', ' ', $keyword);
                    $subQuery->whereRaw("CONCAT(last_name, ' ',first_name) = ?", [$normalized])
                    ->orWhere("CONCAT(last_name, first_name') = ?", [$keyword])
                    ->orWhere('last_name', $keyword)
                    ->orWhere('first_name', $keyword)
                    ->orWhere('email', $keyword);
                } else {
                    $subQuery->where('last_name', 'like', '%' . $keyword . '%')
                    ->orWhere('first_name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
                }
            });
        }
    }

    public function scopeGenderSearch($query, $gender) {
        if(!empty($gender)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeCategorySearch($query, $category_id) {
        if(!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeDateSearch($query, $date) {
        if(!empty($date)) {
            $query->whereDate('created_at', $date);
        }
    }
}
