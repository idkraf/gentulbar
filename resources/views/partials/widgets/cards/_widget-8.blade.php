<!--begin::Card widget 7-->
<div class="card card-flush h-md-20 mb-5 mb-xl-10 bg-primary" style=" background-position: 100% 50%; background-image:url('assets/media/stock/900x600/42.png')">
	<!--begin::Header-->
	<div class="card-body row mb-3 mt-3 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0">
		
		<!--begin::Title-->
            {{-- <div class="row card-title d-flex flex-column symbol-group symbol-hover flex-nowrap"> --}}
				<!--begin::Amount-->
				<div class="col-xxl-4 d-flex flex-column justify-content-center pe-0">
					<span class="fs-2 fw-bold text-white me-2 lh-1 ls-n2 text-center">{{ $suaraSah }}</span>
					<!--end::Amount-->
					<!--begin::Subtitle-->
					<span class="text-white pt-1 fw-semibold fs-6 text-center">Suara Sah</span>
				<!--end::Subtitle-->
				</div>
				<div class="col-xxl-4 d-flex flex-column justify-content-center pe-0">
					<!--begin::Amount-->
					<span class="fs-2 fw-bold text-white me-2 lh-1 ls-n2 text-center">{{ $tidakSah }}</span>
					<!--end::Amount-->
					<!--begin::Subtitle-->
					<span class="text-white pt-1 fw-semibold fs-6 text-center">Tidak Sah</span>
					<!--end::Subtitle-->
				</div>
				<div class="col-xxl-4 d-flex flex-column justify-content-center pe-0">
					<!--begin::Amount-->
					<span class="fs-2 fw-bold text-white me-2 lh-1 ls-n2 text-center">{{$suaraTotal}}</span>
					<!--end::Amount-->
					<!--begin::Subtitle-->
					<span class="text-white pt-1 fw-semibold fs-6 text-center">Jumlah</span>
					<!--end::Subtitle-->
				</div>
			{{-- </div> --}}
		<!--end::Title-->
	</div>
</div>
<!--end::Card widget 7-->
