<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntryController extends Controller
{

    // Получение всех записей
    public function getAllEntries()
    {
        $entries = Entry::paginate(10);

        if (count($entries) <= 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Записей не обнаружено',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'OK',
            'data' => $entries
        ]);
    }


    // Создание новой записи
    public function newEntry(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'full_name' => 'required',
            'company' => 'nullable',
            'phone_number' => 'required|digits:11',
            'email' => 'required|email',
            'date_birth' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);

        if ($validateData->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ошибка валидации',
                'data' => $validateData->errors()
            ], 400);
        }

        $photo_path = $request->file('photo')->store('photos');

        Entry::create([
            'full_name' => $request->full_name,
            'company' => $request->company,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'date_birth' => $request->date_birth,
            'photo' => $photo_path,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Новая запись успешно создана',
        ]);
    }

    // Получение записи по айди
    public function getEntryById($id)
    {
        $entry = Entry::where('id', $id)->first();

        if ($entry) {
            return response()->json([
                'status' => 'success',
                'message' => 'OK',
                'data' => $entry
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Записи не существует',
        ], 404);
    }

    // Обновление записи по айди
    public function updateEntryById(Request $request, $id)
    {
        $validateData = Validator::make($request->all(), [
            'full_name' => 'required',
            'company' => 'nullable',
            'phone_number' => 'required|digits:11',
            'email' => 'required|email',
            'date_birth' => 'nullable|date',
            'photo' => 'nullable',
        ]);

        if ($validateData->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ошибка валидации',
                'data' => $validateData->errors()
            ], 400);
        }

        $entry = Entry::where('id', $id)->update($request->all());

        if ($entry) {
            return response()->json([
                'status' => 'success',
                'message' => 'OK',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Записи не существует',
        ], 404);

    }

    // Удаление записи по айди
    public function deleteEntryById($id)
    {
        $status = Entry::where('id', $id)->delete();

        if ($status) {
            return response()->json([
                'status' => 'success',
                'message' => 'OK'
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Записи не существует'
        ], 404);
    }
}
