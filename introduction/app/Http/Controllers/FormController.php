<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('/form')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        $filename = 'data_' . uniqid() . '.json';

        Storage::disk('local')->put($filename, json_encode($data));

        return redirect('/form')->with('success', 'Данные успешно сохранены.');
    }

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
