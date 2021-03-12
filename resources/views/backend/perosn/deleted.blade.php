@extends('backend.layouts.app')

@section('title', __('Deleted Perosns'))

@section('breadcrumb-links')
    @include('backend.perosn.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Perosns')
        </x-slot>

        <x-slot name="body">
            <livewire:perosn-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection