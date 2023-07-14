<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCategory extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id_type_category',
        'numerical_order',
        'name',
        'slug',
        'status',
        'created_at',
        'updated_at'
    ];
    
    public function categories(){
        return $this->hasMany(Category::class, 'id_type_category', 'id_type_category');
    }
}
