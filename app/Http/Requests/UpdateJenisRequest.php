<?php

namespace App\Http\Requests;

use App\Jenis;
use Illuminate\Foundation\Http\FormRequest;

class UpdateJenisRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('jenis_edit');
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
