@props(['active' => false])

<a
    {{ $attributes->class([
        'block p-2 rounded transition-colors',
        'text-primary-500 bg-primary-50' => $active,
        'text-gray-600 hover:bg-gray-100' => !$active,
    ]) }}>
    {{ $slot }}
</a>
