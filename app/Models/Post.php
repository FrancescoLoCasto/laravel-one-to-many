<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'author','slug','title','post_date','content','image', 'type_id'
    ];
    

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function isImageUrl(){
         return filter_var($this->image, FILTER_VALIDATE_URL);
    }
}
