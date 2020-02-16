<?php

namespace App\Http\Requests;

use App\Jenis;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyJenisRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('jenis_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:jeniss,id',
        ];
    }
}
