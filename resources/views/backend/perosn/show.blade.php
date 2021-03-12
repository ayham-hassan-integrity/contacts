@extends('backend.layouts.app')

@section('title', __('View Perosn'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Perosn')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.perosn.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('id')</th>
                    <td>{{   $perosn->id }}</td>
                </tr>
                <tr>
                    <th>@lang('name')</th>
                    <td>{{   $perosn->name }}</td>
                </tr>
                <tr>
                    <th>@lang('description')</th>
                    <td>{{   $perosn->description }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Perosn Created'):</strong> @displayDate($perosn->created_at) ({{   $perosn->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($perosn->updated_at) ({{   $perosn->updated_at->diffForHumans() }})

                @if($perosn->trashed())
                    <strong>@lang('Perosn Deleted'):</strong> @displayDate($perosn->deleted_at) ({{   $perosn->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection