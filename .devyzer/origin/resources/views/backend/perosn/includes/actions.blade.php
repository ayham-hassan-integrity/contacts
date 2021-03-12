@if (
    $perosn->trashed()
)
    <x-utils.form-button
        :action="route('admin.perosn.restore', $perosn)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.perosn.permanently-delete', $perosn)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.perosn.show', $perosn)"/>
    <x-utils.edit-button :href="route('admin.perosn.edit', $perosn)"/>
    <x-utils.delete-button :href="route('admin.perosn.destroy', $perosn)"/>
@endif