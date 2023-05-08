<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_post',
        'id_topic',
        'name',
        'photo',
        'slug',
        'description',
        'content',
        'status',
        'created_at',
        'updated_at'
    ];
    public function topic(){
        return $this->belongsTo(Topic::class, 'id_topic', 'id_topic');
    }
}
