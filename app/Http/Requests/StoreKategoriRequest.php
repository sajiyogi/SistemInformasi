<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Kategori;
use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('kategori_create');
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
