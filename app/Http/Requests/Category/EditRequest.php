<?php

declare(strict_types=1);

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:2', 'max:191'],
            'description' => ['nullable', 'string']
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => '"заголовок"',
            'description' => '"описание"'
        ];
    }
}
