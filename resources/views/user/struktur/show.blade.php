@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('Show Struktur Organisasi') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Nama
                    </th>
                    <td>
                        {!! $struktur->nama !!}
                    </td>
                </tr>
                <tr>
                    <th>
                       Jabatan
                    </th>
                    <td>
                        {!! $struktur->jabatan !!}
                    </td>
                </tr>

                <tr>
                    <th>
                        Foto
                    </th>
                    <td>
                        <img src="{{asset ('asset/uploadcover/'.$struktur->file ) }} " alt="" style="width: 150px; height: 100px;" />
                    </td>
                </tr>


            </tbody>
        </table>
    </div>
</div>

@endsection






<!-- @extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Struktur Organisasi
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Nama
                    </th>
                    <td>
                        {!! $struktur->nama !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jabatan
                    </th>
                    <td>
                        {!! $struktur->jabatan !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Foto
                    </th>
                    <td>
                        <img src="{{asset ('asset/uploadcover/'.$struktur->file ) }} " alt="" style="width: 150px; height: 100px;" />
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection -->