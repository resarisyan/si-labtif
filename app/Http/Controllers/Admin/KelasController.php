<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KelasRequest;
use App\Http\Responses\PrettyJsonResponse;
use App\Models\Kelas;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kelas::with('jurusan')->get();
            return DataTables::of($data)
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->addIndexColumn()
                ->addColumn('jurusan', function (Kelas $kelas) {
                    return $kelas->jurusan->nama;
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm btnEdit">Edit</a>';
                    $deleteBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm btnDelete">Delete</a>';
                    return $editBtn . ' ' . $deleteBtn;
                })

                ->rawColumns(['action', 'jurusan'])
                ->make(true);
        }

        return view('admin.kelas.index');
    }

    public function store(KelasRequest $request): JsonResponse
    {
        try {
            Kelas::create($request->all());
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.create_class_success')]);
    }

    public function edit($id): JsonResponse
    {
        try {
            $data = Kelas::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_class')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' =>  Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' =>  Lang::get('messages.get_class_success'), 'data' => $data->toArray()]);
    }

    public function update(KelasRequest $request, $id): JsonResponse
    {
        try {
            $data = Kelas::findOrFail($id);
            $data->update($request->all());
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_class')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.update_class_success')]);
    }

    public function destroy($id): JsonResponse
    {
        try {
            $data = Kelas::findOrFail($id);
            $data->delete();
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_class')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.delete_class_success')]);
    }
}
