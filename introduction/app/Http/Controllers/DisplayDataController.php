<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DisplayDataController extends Controller
{
    public function displayDataTable()
    {
        $files = Storage::disk('local')->files();

        $data = [];
        foreach ($files as $file) {
            if (strpos($file, 'data_') !== 0) {
                continue;
            }
            $content = Storage::disk('local')->get($file);
            $data[] = json_decode($content, true);
        }
        return view('data-table', ['data' => $data]);
    }
}
