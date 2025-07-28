<div>
    <h2 class="text-xl font-bold mb-4">قائمة المشاريع (Documentations)</h2>

    <form wire:submit.prevent="{{ $editId ? 'update' : 'store' }}" class="mb-6 space-y-2">
        <input type="text" wire:model.defer="title" placeholder="اسم المشروع" class="border rounded px-3 py-2 w-full" required>
        <input type="text" wire:model.defer="purpose" placeholder="الغرض (اختياري)" class="border rounded px-3 py-2 w-full">
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                {{ $editId ? 'تحديث' : 'إضافة' }} مشروع
            </button>
            @if($editId)
                <button type="button" wire:click="$set('editId', null)" class="bg-gray-400 text-white px-4 py-2 rounded">إلغاء</button>
            @endif
        </div>
    </form>

    <ul class="space-y-2">
        @forelse($documentations as $doc)
            <li class="p-3 bg-white rounded shadow flex flex-col gap-1">
                <span class="font-semibold text-blue-700">{{ $doc->title }}</span>
                <span class="text-gray-600 text-sm">{{ $doc->purpose }}</span>
                <div class="flex gap-2 mt-2">
                    <button wire:click="edit({{ $doc->id }})" class="text-xs bg-yellow-400 px-2 py-1 rounded">تعديل</button>
                    <button wire:click="delete({{ $doc->id }})" class="text-xs bg-red-500 text-white px-2 py-1 rounded">حذف</button>
                </div>
            </li>
        @empty
            <li>لا يوجد مشاريع حالياً.</li>
        @endforelse
    </ul>
</div>