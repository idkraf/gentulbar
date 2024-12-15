<div class="modal fade" id="kt_modal_generus" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_generus_header">
                <h2 class="fw-bold">Generus</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross','fs-1') !!}
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_generus_form" class="form" action="#" wire:submit.prevent="submit" enctype="multipart/form-data">
                    
                    <input type="hidden" wire:model.defer="id_generus"  name="id_generus" value="{{ $id_generus }}" required>
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                    
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model.defer="nama" name="nama" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nama Lengkap"/>
                            <!--end::Input-->
                            @error('name')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Tempat lahir</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model.defer="tempat_lahir" name="tempat_lahir" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tempat lahir"/>
                            <!--end::Input-->
                            @error('tempat_lahir')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Tanggal lahir</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" wire:model.defer="tanggal_lahir" name="tanggal_lahir" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tanggal lahir"/>
                            <!--end::Input-->
                            @error('tanggal_lahir')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @if(isset($jenjang) && $jenjang->isNotEmpty())
                        <div class="mb-7">
                            <label class="required fw-semibold fs-6 mb-5">Jenjang</label>
                            @error('jenjang')
                            <span class="text-danger">{{ $message }}</span> @enderror
                            @foreach($jenjang as $j)
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" id="kt_modal_update_jenjang_option_{{ $j->id }}" wire:model.defer="jenjang" name="jenjang" type="radio" value="{{ $j->nama }}" checked="checked"/>
                                        <label class="form-check-label" for="kt_modal_update_jenjang_option_{{ $j->id }}">
                                            <div class="fw-bold text-gray-800">
                                                {{ ucwords($j->nama) }}
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                @if(!$loop->last)
                                    <div class='separator separator-dashed my-5'></div>
                                @endif
                            @endforeach
                        </div> 
                        @else
                            <p>No jenjang data available.</p>
                        @endif
                        
                        @if(isset($desa) && $desa->isNotEmpty())
                        <div class="mb-7">
                            <label class="required fw-semibold fs-6 mb-5">Desa</label>
                            @error('desa')
                            <span class="text-danger">{{ $message }}</span> @enderror
                            @foreach($desa as $ds)
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" id="kt_modal_update_desa_option_{{ $ds->id }}" wire:model.defer="desa" name="desa" type="radio" value="{{ $j->nama }}" checked="checked"/>
                                        <label class="form-check-label" for="kt_modal_update_desa_option_{{ $ds->id }}">
                                            <div class="fw-bold text-gray-800">
                                                {{ ucwords($ds->nama) }}
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                @if(!$loop->last)
                                    <div class='separator separator-dashed my-5'></div>
                                @endif
                            @endforeach
                        </div>
                        @else
                            <p>No Desa data available.</p>
                        @endif
                        
                        @if(isset($kelompok) && $kelompok->isNotEmpty())
                        <div class="mb-7">
                            <label class="required fw-semibold fs-6 mb-5">Kelompok</label>
                            @error('kelompok')
                            <span class="text-danger">{{ $message }}</span> @enderror
                            @foreach($kelompok as $k)
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" id="kt_modal_update_kelompok_option_{{ $k->id }}" wire:model.defer="kelompok" name="kelompok" type="radio" value="{{ $k->nama }}" checked="checked"/>
                                        <label class="form-check-label" for="kt_modal_update_kelompok_option_{{ $k->id }}">
                                            <div class="fw-bold text-gray-800">
                                                {{ ucwords($k->nama) }}
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                @if(!$loop->last)
                                    <div class='separator separator-dashed my-5'></div>
                                @endif
                            @endforeach
                        </div>

                        @else
                            <p>No Desa data available.</p>
                        @endif

                    </div>
                    @can('write generus')
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-generus-modal-action="submit">
                            <span class="indicator-label" wire:loading.remove>Submit</span>
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    @endcan
                </form>
            </div>
        </div>
    </div>
</div>