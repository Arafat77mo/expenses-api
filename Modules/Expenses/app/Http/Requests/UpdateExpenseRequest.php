<?php

namespace Modules\Expenses\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
    'title' => 'sometimes|string|max:255',
    'amount' => 'sometimes|numeric|min:0',
    'category' => 'sometimes|string',
    'expense_date' => 'sometimes|date',
    'notes' => 'nullable|string',
];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
