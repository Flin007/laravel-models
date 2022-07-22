<?php

namespace App\Http\Requests\Personal\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
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
        //dd($this->photo);
        return [
            'name'          => 'required|string|min:3|max:15',
            'sname'         => 'string|nullable|min:3|max:18',
            'photo'         => 'file|max:256|mimes:jpg,jpeg,png|nullable',
            'phone_number'  => 'integer|nullable'
        ];
    }

    //Кастомные ошибки
    public function messages()
    {
        return [
            'name.required' => 'Это обязательное поле',
            'name.string' => 'Поле должно быть в формате строки',
            'name.min' => 'Минимальная длина 3 символа',
            'name.max' => 'Максимальная длина 15 символов',
            'sname.string' => 'Поле должно быть в формате строки',
            'sname.min' => 'Минимальная длина 3 символа',
            'sname.max' => 'Максимальная длина 15 символов',
            'photo.file' => 'Необходимо прикрепить файл',
            'photo.mimes' => 'Поддерживаемые форматы фото: jpg,jpeg,png',
            'photo.max' => 'Максимальный размер файла 256кб',
            'phone_number.integer' => 'Только в числовом формате',
        ];
    }
}
