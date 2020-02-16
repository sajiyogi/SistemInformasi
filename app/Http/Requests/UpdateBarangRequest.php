<?php

namespace App\Http\Requests;

use App\Barang;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBarangRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('barang_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'required',
            ],
            'nama' => [
                'required',
            ],
            'kategori' => [
                'required',
            ],
            'jenis' => [
                'required',
            ],
            'deskripsi' => [
                'required',
            ],
            'stok' => [
                'required',
            ],
            'foto' => [
                'required',
            ],

        ];
    }
}
