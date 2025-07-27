@props(['label', 'value', 'color' => 'blue'])
@if(!empty($value))
    <div>
        <div class="font-semibold text-{{ $color }}-700 mb-1">{{ $label }}</div>
        <div class="bg-white border border-{{ $color }}-100 rounded-lg px-4 py-2 text-{{ $color }}-900 whitespace-pre-line text-sm shadow-sm">{!! nl2br(e($value)) !!}</div>
    </div>
@endif
