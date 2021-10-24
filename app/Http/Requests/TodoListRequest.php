<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoListRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        // Boolean値はチェックされてない場合0を設定する
        if (!$this->has('complete')) {
            $this->merge([
                'complete' => 0
            ]);
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:20000',
            'complete' => 'required|boolean',
        ];
    }
}
