@props(['action' => null, 'value' => null])

<form method="GET" action="{{ $action }}">
    @csrf
    <input hidden name="special_search_value" value="{{ $value }}" />
    <button
        class="flex text-center w-full p-4 bg-gray-50 hover:bg-indigo-200 hover:text-grey-700 text-black focus:bg-indigo-200 focus:text-grey-700 select-none cursor-pointer"
        {{ $attributes }}>
        {{ $slot }}
    </button>
</form>
