<?php

namespace App\Http\Requests;

use App\Kategori;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKategoriRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('kategori_edit');
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
