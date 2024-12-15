<x-default-layout>

    @section('title')
        Desa
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">

            @can('create desa')
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier','fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-desa-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Desa" id="mySearchInput"/>
                </div>
                <!--end::Search-->
            </div>
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_desa">
                        {!! getIcon('plus-square','fs-3', '', 'i') !!}
                        Add Desa
                    </button>
                </div>
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>
                        Selected
                    </div>

                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">
                        Delete Selected
                    </button>
                </div>
                <!--end::Group actions-->
                {{-- <livewire:generus.desa-modal></livewire:generus.desa-modal> --}}
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
    
    <livewire:generus.desa-modal></livewire:generus.desa-modal>
    
    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['desa-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:load', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_desa').modal('hide');
                    window.LaravelDataTables['desa-table'].ajax.reload();
                });
            });
        </script>
    @endpush
</x-default-layout>