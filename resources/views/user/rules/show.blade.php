@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.rule.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
               
                <tr>
                    <th>
                        {{ trans('global.rule.fields.description') }}
                    </th>
                    <td>                         {!! $rule->description !!}

                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.rule.fields.pengesah') }}
                    </th>
                    <td>
                        {{ $rule->pengesah }}
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <a href="{{ route('admin.rules.index') }}" class="btn btn-danger">Back</a>

    </div>
</div>

@endsection