<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary me-4 mt-4']) }}>
    {{ $slot }}
</button>
