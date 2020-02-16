@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
Detail barang
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                
                    <th>
                        {{ trans('global.barang.fields.kode') }}
                    </th>
                    <td>
                        {!! $barang->kode !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.barang.fields.nama') }}
                    </th>
                    <td>
                        {!! $barang->nama !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.barang.fields.kategori') }}
                    </th>
                    <td>
                        {!! $barang->kategori !!}
                    </td>
                </tr>
                                <tr>
                    <th>
                        {{ trans('global.barang.fields.jenis') }}
                    </th>
                    <td>
                        {!! $barang->jenis !!}
                    </td>
                </tr>
                                <tr>
                    <th>
                        {{ trans('global.barang.fields.deskripsi') }}
                    </th>
                    <td>
                        {!! $barang->deskripsi !!}
                    </td>
                </tr>
                                                <tr>
                    <th>
                        {{ trans('global.barang.fields.stok') }}
                    </th>
                    <td>
                        {!! $barang->stok !!}
                    </td>
                </tr>
                                <tr>
                               <img src="{{asset ('asset/uploadcover/'.$barang->foto ) }} " alt="" style="width: 300px; height: 400px;" align="center" />
                    
                               
                <tr>
            </tbody>
        </table>
        <br>
        <a href="{{ route('admin.barang.index') }}" class="btn btn-danger">Back</a>

    </div>
</div>

@endsection