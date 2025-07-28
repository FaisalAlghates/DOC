<div class="mb-2">
    <div class="font-semibold text-{{ $color ?? 'blue' }}-700 mb-1">{{ $label ?? '' }}</div>
    <div class="bg-white border border-{{ $color ?? 'blue' }}-100 rounded-lg px-4 py-2 text-{{ $color ?? 'blue' }}-900 whitespace-pre-line text-sm shadow-sm">
        @if(!empty($value ?? ''))
            {!! nl2br(e($value ?? '')) !!}
        @else
            <span class="text-gray-400">لا يوجد محتوى</span>
        @endif
    </div>
</div>
