<!--begin::Card widget 7-->
<div class="card card-flush h-md-20 mb-5 mb-xl-10">
	<!--begin::Header-->
	<div class="card-header pt-5">
		<!--begin::Title-->
		<div class="row col-12 mb-3 mt-3 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url('assets/media/stock/900x600/42.png')">
			<div class="col-xxl-6 d-flex flex-column justify-content-center pe-0">
				<!--begin::Amount-->
				<span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2 text-center">{{$tpsCountUpdated}}</span>
				<!--end::Amount-->
				<!--begin::Subtitle-->
				<span class="text-gray-500 pt-1 fw-semibold fs-6 text-center">Tps Masuk</span>
			</div>
				<!--end::Subtitle-->
				<!--begin::Amount-->
			<div class="col-xxl-6 d-flex flex-column justify-content-center pe-0">
				<span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2 text-center">{{$tpsCount}}</span>
				<!--end::Amount-->
				<!--begin::Subtitle-->
				<span class="text-gray-500 pt-1 fw-semibold fs-6 text-center">Jumlah TPS</span>
			</div>
			<!--begin::Amount-->
		</div>
		<!--end::Title-->
	</div>
	<!--end::Header-->
	<!--begin::Card body-->
	<div class="card-body d-flex flex-column justify-content-end pe-0">
		<!--begin::Title-->
		<span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Tps update terbaru</span>
		<!--end::Title-->
		<!--begin::Users group-->
		<div class="symbol-group symbol-hover flex-nowrap">
			
			@foreach ($dpts->take(5) as $dpt)
				<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title=" {{ $dpt->tps->name_tps }}- TPS {{ $dpt->tps->code_tps }}">
					<span class="symbol-label bg-warning text-inverse-warning fw-bold">{{ substr($dpt->tps->code_tps, 0, 1) }}</span>
				</div>
			@endforeach
			@if($tpsCountUpdated > 5)
			<a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_last_dpt">
				<span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">+ {{ $tpsCountUpdated - 5}}</span>
			</a>
			@endif
		</div>
		<!--end::Users group-->
	</div>
	<!--end::Card body-->
</div>
<!--end::Card widget 7-->
