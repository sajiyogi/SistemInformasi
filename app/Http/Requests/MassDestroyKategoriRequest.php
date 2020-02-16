<?php

namespace App\Http\Requests;

use App\Kategori;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyKategoriRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('kategori_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:Kategoris,id',
        ];
    }
}
