<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    use HasFactory;

    protected $table = 'item_type';

    protected $fillable = [
        'item_type',
    ];

    // Define any relationships or methods specific to 'item_type' here.
    public function items()
    {
        return $this->hasMany(Items::class, 'item_type');
    }

}
