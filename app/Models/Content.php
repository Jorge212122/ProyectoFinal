<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SoftDeletes;
class Content extends Model
{
    use HasFactory;
    protected $fillable = [
         'name',
         'description',
          'duration', 
          'year', '
          image_path',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
