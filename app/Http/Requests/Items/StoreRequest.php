<?php

namespace App\Http\Requests\Items;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'item_type' => 'required|exists:item_type,id', // Validate that the selected item_type exists in the item_types table.
            'item_condition' => 'required|exists:item_condition,id', // Validate that the selected item_condition exists in the item_conditions table.
            'desc' => 'required|string|max:128',
            'defect' => 'nullable|string|max:128',
            'amount' => 'required|integer',
            'image' => 'required|image|max:2048|mimes:jpg,jpeg,png', // Adjust the max file size to your needs.
        ];
    }
}
