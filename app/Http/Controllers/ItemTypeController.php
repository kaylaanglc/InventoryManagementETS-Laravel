<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function getItemTypeOptions()
    {
        $itemTypeOptions = ItemType::all();
        return response()->json($itemTypeOptions);
    }
}
