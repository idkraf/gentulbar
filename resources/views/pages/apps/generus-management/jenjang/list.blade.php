<x-default-layout>

    @section('title')
        Jenjang
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">

            @can('create tps')
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier','fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-tps-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Jenjang" id="mySearchInput"/>
                </div>
                <!--end::Search-->
            </div>
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_jenjang">
                        {!! getIcon('plus-square','fs-3', '', 'i') !!}
                        Add Jenjang
                    </button>
                </div>
                <livewire:generus.add-jenjang-modal></livewire:generus.add-jenjang-modal>
                <livewire:generus.edit-jenjang-modal></livewire:generus.edit-jenjang-modal>
            </div>
            
		    @endcan
        </div>
        
        <!--begin::Card body-->
        <div class="card-body py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
    
    <livewire:tps.edit-tps-modal></livewire:tps.edit-tps-modal>
    
    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['generus-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:load', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_add_generus').modal('hide');
                    $('#kt_modal_edit_generus').modal('hide');
                    window.LaravelDataTables['generus-table'].ajax.reload();
                });
            });
        </script>
    @endpush
</x-default-layout>