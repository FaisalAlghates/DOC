<div class="mb-2">
    <div class="font-semibold text-{{ $color ?? 'blue' }}-700 mb-1">{{ $label ?? '' }}</div>
    <div class="bg-white border border-{{ $color ?? 'blue' }}-100 rounded-lg px-4 py-2 text-{{ $color ?? 'blue' }}-900 whitespace-pre-line text-sm shadow-sm min-h-[3rem] flex items-start">
        @if(!empty($value) && $value !== null && trim($value) !== '')
            <div class="w-full">{!! nl2br(e($value)) !!}</div>
        @else
            <span class="text-gray-400 italic">لا يوجد محتوى محفوظ</span>
        @endif
    </div>
</div>
