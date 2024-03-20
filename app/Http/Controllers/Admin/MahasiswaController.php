<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImportMahasiswaRequest;
use App\Http\Requests\Admin\MahasiswaStoreRequest;
use App\Http\Requests\Admin\MahasiswaUpdateRequest;
use App\Http\Requests\Admin\UserStatusRequest;
use App\Http\Responses\PrettyJsonResponse;
use App\Imports\MahasiswaImport;
use App\Models\Mahasiswa;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('mahasiswa', 'mahasiswa.kelas', 'mahasiswa.kelas.jurusan')->role('mahasiswa')->get();
            return DataTables::of($data)
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->removeColumn('kelas_id')
                ->removeColumn('user_id')
                ->addIndexColumn()
                ->editColumn('is_active', function ($row) {
                    $label = $row->is_active == 1 ? 'checked' : '';
                    return "
                    <div class='form-check form-switch form-check-inline'>
                    <input class='toggle-class form-check-input' type='checkbox' data-id='{$row->id}' role='switch' id='{$row->id}-switch' {$label}>
                    <label class='form-check-label' for='{$row->id}-switch'>Active</label>
                    </div>";
                })
                ->addColumn('kelas', function ($row) {
                    return $row->mahasiswa->kelas->nama . ' '  . $row->mahasiswa->kelas->jurusan->nama . ' ' . $row->mahasiswa->kelas->tingkat;
                })
                ->addColumn('npm', function ($row) {
                    return $row->mahasiswa->npm;
                })
                ->editColumn('image', function ($row) {
                    return "<img src='" . asset('storage/' . $row->image) . "' class='img-thumbnail' width='100' />";
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm btnEdit">Edit</a>';
                    $deleteBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm btnDelete">Delete</a>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action', 'kelas', 'npm', 'is_active', 'image'])
                ->make(true);
        }

        return view('admin.mahasiswa.index');
    }

    public function store(MahasiswaStoreRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $image = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image')->storeAs(
                    'public/mahasiswa',
                    'mahasiswa-' . $request->npm . '.' . $request->file('image')->getClientOriginalExtension(),
                    'public'
                );
            }

            $user = User::create([
                'name' => $request->name,
                'username' => $request->npm,
                'password' => bcrypt($request->npm),
                'image' => $image,
                'is_active' => 1,
            ]);
            $user->assignRole('mahasiswa');

            Mahasiswa::create([
                'npm' => $request->npm,
                'kelas_id' => $request->kelas_id,
                'user_id' => $user->id,
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.create_student_success')]);
    }

    public function edit($id): JsonResponse
    {
        try {
            $data = User::with('mahasiswa')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_student')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' =>  Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' =>  Lang::get('messages.get_student_success'), 'data' => $data->toArray()]);
    }

    public function update(MahasiswaUpdateRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);

            $image = $user->image;
            if ($request->hasFile('image')) {
                $image = $request->file('image')->storeAs(
                    'public/mahasiswa',
                    'mahasiswa-' . $request->npm . '.' . $request->file('image')->getClientOriginalExtension(),
                    'public'
                );
            }
            $user->update([
                'name' => $request->name,
                'username' => $request->npm,
                'password' => bcrypt($request->npm),
                'image' => $image,
            ]);
            $user->mahasiswa->update([
                'npm' => $request->npm,
                'kelas_id' => $request->kelas_id,
            ]);
            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_student')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.update_student_success')]);
    }

    public function changeStatus(UserStatusRequest $request)
    {
        try {
            $user = User::findOrfail($request->id);
            $user->is_active = $request->status;
            $user->save();
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_assistant')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.status_change_assistant_success')]);
    }

    public function destroy($id): JsonResponse
    {
        try {
            $data = User::findOrFail($id);
            $data->delete();
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_student')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.delete_student_success')]);
    }

    public function search(Request $request): JsonResponse
    {
        try {
            $searchTerm = $request->input('search');
            $query = User::role('mahasiswa');
            if ($searchTerm) {
                $query = User::role('mahasiswa')
                    ->where(function ($q) use ($searchTerm) {
                        $q->where('name', 'like', '%' . $searchTerm . '%')
                            ->orWhere('username', 'like', '%' . $searchTerm . '%');
                    });
            }
            $user = $query->limit(10)->get();

            return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.get_search_student_success'), 'data' => $user]);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }
    }

    public function import(ImportMahasiswaRequest $request)
    {
        try {
            Excel::import(new MahasiswaImport, $request->file('file'));
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => $e->getMessage()], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.import_student_success')]);
    }
}
