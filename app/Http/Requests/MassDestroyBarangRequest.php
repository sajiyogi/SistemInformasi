<?php

namespace App\Http\Requests;

use App\Barang;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyBarangRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('barang_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:barangs,id',
        ];
    }
}
