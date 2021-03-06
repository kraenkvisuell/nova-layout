@props([
    'field',
    'nextBlock',
    'prevBlock',
    'loop',
    'layout' => 'text',
])

@php $harmonicaId = Str::random(20); @endphp

<x-building-blocks.section>
    @if($field->is_collapsed)
        <x-content-blocks.text.is-collapsed
            :field="$field"
            :layout="$layout"
            :harmonicaId="$harmonicaId"
        />
    @else
        <x-content-blocks.text.not-collapsed
            :field="$field"
            :layout="$layout"
        />
    @endif
</x-building-blocks.section>
