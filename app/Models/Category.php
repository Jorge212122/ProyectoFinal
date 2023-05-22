<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    public function contents()
    {
        return $this->belongsToMany(Content::class);
    }

    protected $fillable = ['name'];
}
