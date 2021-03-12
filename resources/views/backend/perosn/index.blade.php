@extends('backend.layouts.app')

@section('title', __(' Perosns'))

@section('breadcrumb-links')
    @include('backend.perosn.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang(' Perosns')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.perosn.create')"
                :text="__('Create Perosn')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:perosn-table/>
        </x-slot>
    </x-backend.card>
@endsection