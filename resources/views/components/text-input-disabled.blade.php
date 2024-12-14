@props(['disabled' => true])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control bg-transparent mb-6']) !!}>
