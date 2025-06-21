<?php

namespace App\Http\Controllers\AllTableData;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TableDataController extends Controller
{
    public function index()
    {
        // Just show the form / button to load data
        return view('pages.alltabledata.tabledata.index');
    }

    public function showData()
        {
            $database = DB::getDatabaseName();

            $tablesRaw = DB::select("SHOW TABLES");

            $key = 'Tables_in_' . $database;

            // Filter only tables with prefix "fic_"
            $tables = collect($tablesRaw)->map(function ($item) use ($key) {
                $array = (array) $item;
                return $array[$key] ?? null;
            })->filter(function ($tableName) {
                return Str::startsWith($tableName, 'fic_'); // ✅ Only tables that start with 'fic_'
            });

            return view('pages.alltabledata.tabledata.index', compact('tables'));
        }


}
