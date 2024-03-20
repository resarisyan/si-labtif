<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MataPraktikumRequest;
use App\Http\Responses\PrettyJsonResponse;
use App\Models\MataPraktikum;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

class MataPraktikumController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = MataPraktikum::all();
            return DataTables::of($data)
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm btnEdit">Edit</a>';
                    $deleteBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm btnDelete">Delete</a>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->editColumn('image', function ($row) {
                    return '<img src="' . asset('storage/' . $row->image) . '" class="img-fluid" style="max-width: 100px">';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('admin.mata_praktikum.index');
    }

    public function store(MataPraktikumRequest $request): JsonResponse
    {
        try {
            $data = $request->all();
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->storeAs(
                    'public/mata_praktikum',
                    'mata_praktikum.' . $request->file('image')->getClientOriginalExtension(),
                    'public'
                );
            }
            MataPraktikum::create($data);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.create_practical_lesson_success')]);
    }

    public function edit($id): JsonResponse
    {
        try {
            $data = MataPraktikum::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_room')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' =>  Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' =>  Lang::get('messages.get_practical_lesson_success'), 'data' => $data->toArray()]);
    }

    public function update(MataPraktikumRequest $request, $id): JsonResponse
    {
        try {
            $data = MataPraktikum::findOrFail($id);
            $mataPraktikum = $request->all();
            if ($request->hasFile('image')) {
                $mataPraktikum['image'] = $request->file('image')->storeAs(
                    'public/mata_praktikum',
                    'mata_praktikum.' . $request->file('image')->getClientOriginalExtension(),
                    'public'
                );
            }
            $data->update($mataPraktikum);
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_room')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.update_practical_lesson_success')]);
    }

    public function destroy($id): JsonResponse
    {
        try {
            $data = MataPraktikum::findOrFail($id);
            $data->delete();
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_room')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.delete_practical_lesson_success')]);
    }
}
