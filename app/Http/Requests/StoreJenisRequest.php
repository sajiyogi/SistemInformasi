<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Jenis;
use Illuminate\Foundation\Http\FormRequest;

class StoreJenisRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('jenis_create');
    }

    public function rules()
    {
        return [
            'nama' => [
                'required',
            ],

        ];
    }
}
