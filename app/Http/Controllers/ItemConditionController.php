<?php

namespace App\Http\Controllers;

use App\Models\ItemCondition;
use Illuminate\Http\Request;

class ItemConditionController extends Controller
{
    public function getItemConditionOptions()
    {
        $itemConditionOptions = ItemCondition::all();
        return response()->json($itemConditionOptions);
    }
}
