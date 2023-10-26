<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCondition extends Model
{
    use HasFactory;

    protected $table = 'item_condition';

    protected $fillable = [
        'item_condition',
    ];

    // Define any relationships or methods specific to 'item_condition' here.
    public function items()
    {
        return $this->hasMany(Items::class, 'item_condition');
    }
}
