<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentHistory;
use App\Models\Documentation;
use Illuminate\Support\Facades\Auth;

class DocumentHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role !== 'owner') {
            abort(403, 'غير مصرح لك بعرض سجل العمليات');
        }
        // جلب كل السجلات مع معلومات الوثيقة والمستخدم
        $histories = DocumentHistory::with(['documentation', 'user'])->orderByDesc('created_at')->get();
        return view('history.index', compact('histories'));
    }
}
