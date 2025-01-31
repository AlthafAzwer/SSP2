<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;

class QueryController extends Controller
{
    public function index()
    {
        $queries = Query::latest()->get();
        return view('admin.queries.index', compact('queries'));
    }

    public function show($id)
    {
        $query = Query::findOrFail($id);
        return view('admin.queries.show', compact('query'));
    }

    public function delete($id)
    {
        $query = Query::findOrFail($id);
        $query->delete();

        return redirect()->route('admin.admin.queries.index')->with('success', 'Query deleted successfully!');
    }
}
