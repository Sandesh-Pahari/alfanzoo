<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableAdminController extends Controller
{
    public function index()
    {
        $tables = Table::orderBy('created_at', 'desc')->paginate(10);
            
        $unreadCount = Table::where('is_read', false)->count();
        
        return view('admin.table.index', compact('tables', 'unreadCount'));
    }

    public function show(Table $table)
    {
        if (!$table->is_read) {
            $table->update(['is_read' => true]);
        }
        
        return view('admin.table.show', compact('table'));
    }

    public function destroy(table $table)
    {
        $table->delete();
        
        return redirect()
            ->route('admin.table.index')
            ->with('success', 'table booking deleted successfully.');
    }
}