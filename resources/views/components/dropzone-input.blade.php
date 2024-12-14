@props(['disabled' => false, 'currentImage' => null, 'accept' => 'image/*'])

<div class="dropzone" id="my-dropzone" 
     {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    @if($currentImage)
        <div class="dz-preview dz-file-preview">
            <div class="dz-image">
                <img data-dz-thumbnail src="{{ asset('storage/' . $currentImage) }}" alt="Current Image" />
            </div>
            <div class="dz-details">
                <div class="dz-size"><span data-dz-size></span></div>
                <div class="dz-filename"><span data-dz-name>{{ basename($currentImage) }}</span></div>
                <div class="dz-remove"><a href="javascript:void(0);" data-dz-remove>Remove</a></div>
            </div>
        </div>
    @endif
    <div class="dz-message">Drop files here or click to upload.</div>
</div>

<script>
    Dropzone.options.myDropzone = {
        paramName: "logo_partai", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        acceptedFiles: '{{ $accept }}',
        addRemoveLinks: true,
        init: function() {
            this.on("removedfile", function(file) {
                // Handle the file removal here
                // You may want to send an AJAX request to delete the file on the server
            });
        }
    };
</script>

<style>
    .dz-message {
        font-size: 1.2em;
        text-align: center;
        padding: 20px;
    }
</style>
