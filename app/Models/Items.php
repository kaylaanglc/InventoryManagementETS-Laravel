<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $primaryKey = 'id';

    protected $fillable = [
        'item_type',
        'item_condition',
        'desc',
        'defect',
        'amount',
        'image',
    ];

    public function itemType()
    {
        return $this->belongsTo(ItemType::class, 'item_type');
    }

    public function itemCondition()
    {
        return $this->belongsTo(ItemCondition::class, 'item_condition');
    }
}
