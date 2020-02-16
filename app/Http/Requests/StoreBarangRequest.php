<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Barang;
use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('barang_create');
    }

    public function rules()
    {
        return [
            
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
