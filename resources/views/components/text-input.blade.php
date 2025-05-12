@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-700 bg-gray-800 text-white focus:border-white focus:ring-white rounded-md shadow-sm']) !!}>