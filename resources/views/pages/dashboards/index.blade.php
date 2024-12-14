<x-default-layout>

    @section('title')
        Dashboard
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            {{-- @include('partials/widgets/cards/_widget-20')

            @include('partials/widgets/cards/_widget-8')
            
            @include('partials/widgets/cards/_widget-7')
        </div>
        <div class="col-xxl-9">
            @include('partials/widgets/calon/_widget-calon')
        </div> --}}
        <!--end::Col-->
    </div>
    {{-- <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xl-3">
            @include('partials/widgets/charts/_widget-weda-selatan')
        </div>
        <div class="col-xl-3">
            @include('partials/widgets/charts/_widget-weda')
        </div>
        <div class="col-xl-3">
            @include('partials/widgets/charts/_widget-weda-tengah')
        </div>
        <div class="col-xl-3">
            @include('partials/widgets/charts/_widget-weda-utara')
        </div>
        <div class="col-xl-3">
            @include('partials/widgets/charts/_widget-weda-timur')
        </div>
        
        <div class="col-xl-3">
            @include('partials/widgets/charts/_widget-patani-barat')
        </div>
        <div class="col-xl-3">
            @include('partials/widgets/charts/_widget-patani')
        </div>
        <div class="col-xl-3">
            @include('partials/widgets/charts/_widget-patani-utara')
        </div>
        <div class="col-xl-3">
            @include('partials/widgets/charts/_widget-patani-timur')
        </div>
        <div class="col-xl-3">
            @include('partials/widgets/charts/_widget-pulau-gebe')
        </div>
    </div> --}}
    {{-- <div class="modal fade" id="kt_modal_view_last_dpt" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">{!! getIcon('cross', 'fs-1') !!}</div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <!--begin::Heading-->
                    <div class="text-center mb-13">
                        <h1 class="mb-3">List update perhitungan terakhir</h1>
                        <div class="text-muted fw-semibold fs-5">If you need more info, please check out our 
                        <a href="#" class="link-primary fw-bold">Tps Directory</a>.</div>
                    </div>
                    <div class="mb-15">
                        <!--begin::List-->
                        <div class="mh-375px scroll-y me-n7 pe-7">
                            @foreach ($dpts as $dpt)
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ image('avatars/blank.png') }}" />
                                    </div>
                                    <div class="ms-6">
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">{{ $dpt->tps->name_tps}} 
                                        <span class="badge badge-light fs-8 fw-semibold ms-2">Tps {{ $dpt->tps->code_tps}}</span></a>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->
                            </div>
                            @endforeach
                            <!--end::Dpt-->
                        </div>
                        <!--end::List-->
                    </div>
                    <!--end::Dpt-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div> --}}

    {{-- @push('scripts')
    <script>
        const _WEDAS = @json(isset($wedas) ? $wedas : []);
        const _WEDA = @json(isset($weda) ? $weda : []);
        const _WEDATE = @json(isset($wedate) ? $wedate : []);
        const _WEDAU = @json(isset($wedau) ? $wedau : []);
        const _WEDATI = @json(isset($wedati) ? $wedati : []);
        const _PATANIB = @json(isset($patanib) ? $patanib : []);
        const _PATANI = @json(isset($patani) ? $patani : []);
        const _PATANIU = @json(isset($pataniu) ? $pataniu : []);
        const _PATANIT = @json(isset($patanit) ? $patanit : []);
        const _GEBE = @json(isset($gebe) ? $gebe : []);
    </script>
    @endpush --}}
</x-default-layout>
