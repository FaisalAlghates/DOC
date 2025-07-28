<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DocumentHistory;
use App\Models\Documentation;

class HistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // جميع المستخدمين لهم كامل الصلاحيات
        
        // جلب كل السجلات مع اسم المستخدم واسم الوثيقة
        $histories = DocumentHistory::with(['user', 'documentation'])->orderByDesc('created_at')->get();
        return view('history.index', compact('histories'));
    }
}
