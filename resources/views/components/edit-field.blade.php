<div class="mb-4">
    <label class="block mb-2 text-sm font-semibold text-{{ $color ?? 'blue' }}-700">{{ $label ?? '' }}</label>
    @if(($type ?? 'input') === 'textarea')
        <textarea 
            name="{{ $name }}" 
            rows="{{ $rows ?? 2 }}" 
            class="w-full border border-{{ $color ?? 'blue' }}-200 rounded-lg py-2 px-4 bg-white focus:border-{{ $color ?? 'blue' }}-500 focus:ring-2 focus:ring-{{ $color ?? 'blue' }}-100 text-gray-800 transition"
            placeholder="Enter {{ $label ?? '' }}..."
        >{{ old($name, $value ?? '') }}</textarea>
    @else
        <input 
            type="text" 
            name="{{ $name }}" 
            value="{{ old($name, $value ?? '') }}" 
            class="w-full border border-{{ $color ?? 'blue' }}-200 rounded-lg py-2 px-4 bg-white focus:border-{{ $color ?? 'blue' }}-500 focus:ring-2 focus:ring-{{ $color ?? 'blue' }}-100 text-gray-800 transition"
            placeholder="Enter {{ $label ?? '' }}..."
        >
    @endif
    @error($name)
        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>
