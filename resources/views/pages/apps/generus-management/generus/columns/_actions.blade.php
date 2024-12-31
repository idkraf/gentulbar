<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-generus-id="{{ $generus->id }}" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_generus" data-kt-action="update_row">
    {!! getIcon('setting-3','fs-3') !!}
</button>
<button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-generus-id="{{ $generus->id }}" data-kt-action="delete_row">
    {!! getIcon('trash','fs-3') !!}
</button>
