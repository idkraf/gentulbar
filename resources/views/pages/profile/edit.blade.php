<x-default-layout>
    @section('title')
        {{ __('Profile') }}
    @endsection

    <div class="card bg-white">
        <div class="card-body py-4">
            <div class="p-4 sm:p-8  sm:rounded-lg">
                <div class="col-xxl-6">
                    @include('pages.profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8  sm:rounded-lg">
                <div class="col-xxl-6">
                    @include('pages.profile.partials.update-password-form')
                    {{-- @include('pages.profile.change-password') --}}
                </div>
            </div>

            <div class="p-4 sm:p-8 sm:rounded-lg">
                <div class="col-xxl-6">
                    @include('pages.profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
