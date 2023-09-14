<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'status',
    ];

    public function img_path()
    {
        if($this->image)
        {
            return asset('storage/img/'.$this->image);
        }

        return null;
    }
}
