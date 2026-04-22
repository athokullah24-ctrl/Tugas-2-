<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * GET /students
     * Menampilkan semua data student.
     * Skenario: Success
     */
    public function index()
    {
        $students = Student::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List semua student berhasil diambil',
            'data' => $students,
        ], 200);
    }

    /**
     * GET /students/{id}
     * Menampilkan detail student berdasarkan ID.
     * Skenario: Success, Not Found
     */
    public function show($id)
    {
        $student = Student::find($id);

        if (! $student) {
            return response()->json([
                'success' => false,
                'message' => 'Student tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail student berhasil diambil',
            'data' => $student,
        ], 200);
    }

    /**
     * POST /students
     * Membuat data student baru.
     * Skenario: Success, Failed
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'nim'   => 'required|string|max:50|unique:students,nim',
            'major' => 'required|string|max:255',
        ]);

        $student = Student::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Student berhasil ditambahkan',
            'data' => $student,
        ], 201);
    }

    /**
     * PUT /students/{id}
     * Mengubah data student.
     * Skenario: Success, Not Found
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (! $student) {
            return response()->json([
                'success' => false,
                'message' => 'Student tidak ditemukan',
            ], 404);
        }

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'nim'   => [
                'required',
                'string',
                'max:50',
                Rule::unique('students', 'nim')->ignore($student->id),
            ],
            'major' => 'required|string|max:255',
        ]);

        $student->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Student berhasil diperbarui',
            'data' => $student,
        ], 200);
    }

    /**
     * DELETE /students/{id}
     * Menghapus data student.
     * Skenario: Success, Not Found
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        if (! $student) {
            return response()->json([
                'success' => false,
                'message' => 'Student tidak ditemukan',
            ], 404);
        }

        $student->delete();

        return response()->json([
            'success' => true,
            'message' => 'Student berhasil dihapus',
        ], 200);
    }
}
