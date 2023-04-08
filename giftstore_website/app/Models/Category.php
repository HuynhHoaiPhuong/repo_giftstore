<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeCategory;

class Category extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id_category',
        'id_type_category',
        'numerical_order',
        'name',
        'photo',
        'slug',
        'status',
        'created_at',
        'updated_at',
    ];
    public function typeCategory(){
        return $this->belongsTo(TypeCategory::class, 'id_type_category', 'id_type_category');
    }
}
