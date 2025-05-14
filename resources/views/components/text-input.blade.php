@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-700 bg-gray-900 text-white focus:border-gray-400 focus:ring-gray-400 rounded-md shadow-sm']) !!}>