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
                    
                    <input type="hidden" wire:model.defer="id_gen"  name="id_gen" value="{{ $id_gen }}" required>
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <div class="d-flex flex-column">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" wire:model.defer="nama" name="nama" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('nama')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-5">Gender</label>
                                <div class="d-flex fv-row">
                                    <!--begin::Radio-->
                                    <div class="form-check form-check-custom form-check-solid me-5">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" id="kt_modal_update_role_option_1" wire:model.defer="gender" name="gender" type="radio" value="M" checked="checked"/>
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_update_role_option_1">
                                            <div class="fw-bold text-gray-800">
                                                Laki laki
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Radio-->
                                    <!--begin::Radio-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" id="kt_modal_update_role_option_2" wire:model.defer="gender" name="gender" type="radio" value="F" checked="checked"/>
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_update_role_option_2">
                                            <div class="fw-bold text-gray-800">
                                            Perempuan
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Radio-->
                                </div>
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Nomor Handphone</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" wire:model.defer="nohp" name="nohp" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('nohp')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">NIG</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" wire:model.defer="nig" name="nig" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('nig')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Kelas KBM</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" wire:model.defer="kelaskbm" name="kelaskbm" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('kelaskbm')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Tempat lahir</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" wire:model.defer="tempat_lahir" name="tempat_lahir" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('tempat_lahir')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Tanggal lahir</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" wire:model.defer="tanggal_lahir" name="tanggal_lahir" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('tanggal_lahir')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            @if(isset($jenjangs) && $jenjangs->isNotEmpty())
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-5">Jenjang</label>
                                    @error('jenjang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <select wire:model.defer="jenjang" name="jenjang" class="form-select form-select-solid form-control-lg" aria-label="Select Jenjang">
                                        <option value="" disabled>Select Jenjang</option>
                                        @foreach($jenjangs as $j)
                                            <option value="{{ $j->id }}" {{ $j->id === $jenjang ? 'selected' : '' }}>
                                                {{ ucwords($j->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <p>No jenjang data available.</p>
                            @endif
                            
                            @if(isset($desas) && $desas->isNotEmpty())
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-5">Desa</label>
                                    @error('desa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <select wire:model.defer="desa" name="desa" class="form-select form-select-solid form-control-lg" aria-label="Select Desa">
                                        <option value="" disabled>Select Desa</option>
                                        @foreach($desas as $ds)
                                            <option value="{{ $ds->id }}" {{ $ds->id === $desa ? 'selected' : '' }}>
                                                {{ ucwords($ds->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <p>No Desa data available.</p>
                            @endif
                            
                            @if(isset($kelompoks) && $kelompoks->isNotEmpty())
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-5">Kelompok</label>
                                    @error('kelompok')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <select wire:model.defer="kelompok" name="kelompok" class="form-select form-select-solid form-control-lg" aria-label="Select Kelompok">
                                        <option value="" disabled>Select Kelompok</option>
                                        @foreach($kelompoks as $k)
                                            <option value="{{ $k->id }}" {{ $k->id === $kelompok ? 'selected' : '' }}>
                                                {{ ucwords($k->nama) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <p>No Kelompok data available.</p>
                            @endif
                            
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Nama Ayah</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" wire:model.defer="ayah" name="ayah" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('ayah')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Nama ibu</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" wire:model.defer="ibu" name="ibu" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('ibu')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Alamat</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" wire:model.defer="alamat" name="alamat" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('alamat')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>


                            <!-- Kerja Section: Added d-flex for row -->
                            <div class="mb-7">
                                <label class="required fw-semibold fs-6 mb-5">Kerja</label>
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input me-3" id="kt_modal_update_kerja_option_1" wire:model.defer="kerja" name="kerja" type="radio" value="1" checked="checked"/>
                                        <label class="form-check-label" for="kt_modal_update_kerja_option_1">
                                            <div class="fw-bold text-gray-800">
                                                Ya
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" id="kt_modal_update_kerja_option_2" wire:model.defer="kerja" name="kerja" type="radio" value="0" checked="checked"/>
                                        <label class="form-check-label" for="kt_modal_update_kerja_option_2">
                                            <div class="fw-bold text-gray-800">
                                            Tidak
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Sekolah Section: Added d-flex for row -->
                            <div class="mb-7">
                                <label class="required fw-semibold fs-6 mb-5">Sekolah</label>
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input me-3" id="kt_modal_update_sekolah_option_1" wire:model.defer="sekolah" name="sekolah" type="radio" value="1" checked="checked"/>
                                        <label class="form-check-label" for="kt_modal_update_sekolah_option_1">
                                            <div class="fw-bold text-gray-800">
                                                Ya
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" id="kt_modal_update_sekolah_option_2" wire:model.defer="sekolah" name="sekolah" type="radio" value="0" checked="checked"/>
                                        <label class="form-check-label" for="kt_modal_update_sekolah_option_2">
                                            <div class="fw-bold text-gray-800">
                                            Tidak
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Mondok Section: Added d-flex for row -->
                            <div class="mb-7">
                                <label class="required fw-semibold fs-6 mb-5">Mondok</label>
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input me-3" id="kt_modal_update_mondok_option_1" wire:model.defer="mondok" name="mondok" type="radio" value="1" checked="checked"/>
                                        <label class="form-check-label" for="kt_modal_update_mondok_option_1">
                                            <div class="fw-bold text-gray-800">
                                                Ya
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" id="kt_modal_update_mondok_option_2" wire:model.defer="mondok" name="mondok" type="radio" value="0" checked="checked"/>
                                        <label class="form-check-label" for="kt_modal_update_mondok_option_2">
                                            <div class="fw-bold text-gray-800">
                                            Tidak
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Tugas Section: Added d-flex for row -->
                            <div class="mb-7">
                                <label class="required fw-semibold fs-6 mb-5">Tugas</label>
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input me-3" id="kt_modal_update_tugas_option_1" wire:model.defer="tugas" name="tugas" type="radio" value="1" checked="checked"/>
                                        <label class="form-check-label" for="kt_modal_update_tugas_option_1">
                                            <div class="fw-bold text-gray-800">
                                                Ya
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" id="kt_modal_update_tugas_option_2" wire:model.defer="tugas" name="tugas" type="radio" value="0" checked="checked"/>
                                        <label class="form-check-label" for="kt_modal_update_tugas_option_2">
                                            <div class="fw-bold text-gray-800">
                                            Tidak
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Keterangan</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" wire:model.defer="keterangan" name="keterangan" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                <!--end::Input-->
                                @error('keterangan')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
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