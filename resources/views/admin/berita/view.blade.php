@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
Detail berita
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                               
                               <img src="{{asset ('uploadberita/'.$data->image ) }} " alt="" style="width: 320px; height: 380px;" />
                    
                               
                <tr>
                    <th>
                        {{ trans('global.berita.fields.judul') }}
                    </th>
                    <td>
                        {!! $data->judul !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.berita.fields.artikel') }}
                    </th>
                    <td>
                        {!! $data->artikel !!}
                    </td>
               
            </tbody>
        </table>
        <br>
        <a href="{{ route('admin.home') }}" class="btn btn-danger">Back</a>

    </div>
</div>

@endsection