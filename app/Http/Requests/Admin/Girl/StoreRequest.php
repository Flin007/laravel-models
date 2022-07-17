<?php

namespace App\Http\Requests\Admin\Girl;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'name'          => 'required|string',
            'bday'          => 'required|date',
            'city'          => 'required|string',
            'number'        => 'required|integer',
            'breast_size'   => 'nullable|integer',
            'height'        => 'nullable|integer',
            'hair_color'    => 'nullable|string',
            'tattoos'       => 'nullable|boolean',
            'silicon'       => 'nullable|boolean',
            'weight'        => 'nullable|integer',
            'eyes_color'    => 'nullable|string',
            'photos'        => 'nullable',
            'price'         => 'nullable|integer',
        ];
    }

    //Кастомные ошибки
    public function messages()
    {
        return [
            'name.required' => 'Это обязательное поле',
            'name.string' => 'Поле должно быть в формате строки',
            'bday.required' => 'Это обязательное поле',
            'bday.date' => 'Поле должно быть в формате даты',
            'city.required' => 'Это обязательное поле',
            'city.string' => 'Поле должно быть в формате строки',
            'number.required' => 'Это обязательное поле',
            'number.integer' => 'Поле должно быть в числовом формате',
            'breast_size.integer' => 'Поле должно быть в числовом формате',
            'height.integer' => 'Поле должно быть в числовом формате',
            'hair_color.string' => 'Поле должно быть в формате строки',
            'tattoos.boolean' => 'Поле принимает (1,0,true,false)',
            'silicon.boolean' => 'Поле принимает (1,0,true,false)',
            'weight.integer' => 'Поле должно быть в числовом формате',
            'eyes_color.string' => 'Поле должно быть в формате строки',
            'price.integer' => 'Поле должно быть в числовом формате',
        ];
    }
}
