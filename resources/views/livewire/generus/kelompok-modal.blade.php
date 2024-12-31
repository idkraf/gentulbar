<div class="modal fade" id="kt_modal_kelompok" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Update kelompok</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross','fs-1') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--end::Notice-->
                <!--end::Notice-->
                <!--begin::Form-->
                <form id="kt_modal_kelompok_form" class="form" action="#" wire:submit.prevent="submit">
                    <div class="d-flex flex-column col-sx-12">    
                        <select id="desa" wire:model.defer="desa" name="desa" class="form-select form-control form-control-solid mb-3 mb-lg-0" required>
                            <option value="">Select Desa</option>
                            @foreach($desas as $ds)
                                <option value="{{ $ds->id }}" {{ $ds->id == $desa ? 'selected' : '' }}>{{ $ds->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nama Kelompok</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" placeholder="Enter a kelompok name" name="nama" wire:model.defer="nama"/>
                        <!--end::Input-->
                        @error('nama')
                        <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-kelompok-modal-action="submit">
                            <span class="indicator-label" wire:loading.remove>Submit</span>
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

@push('scripts')
    <script>
        const modal = document.querySelector('#kt_modal_kelompok');

        modal.addEventListener('show.bs.modal', (e) => {
            Livewire.emit('modal.show.kelompok_name', e.relatedTarget.getAttribute('data-kelompok-id'));
        });
    </script>
@endpush