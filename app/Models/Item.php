<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ItemType;
use App\Models\ItemCondition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'owner',
        'status',
        'item_condition',
        'item_type',
        'photo',
        'owner_name',
        'owner_contact',
        'owner_address'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function item_condition()
    {
        return $this->belongsTo(ItemCondition::class);
    }

    public function item_type()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function img_path()
    {
        if($this->image)
        {
            return asset('storage/img/'.$this->image);
        }

        return null;
    }
}
