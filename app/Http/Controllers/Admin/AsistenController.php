<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AsistantStatusRequest;
use App\Http\Requests\Admin\AsistenStoreRequest;
use App\Http\Requests\Admin\AsistenUpdateRequest;
use App\Http\Responses\PrettyJsonResponse;
use App\Models\Asisten;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

class AsistenController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('asisten')->role('asisten')->get();
            return DataTables::of($data)
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->addIndexColumn()
                ->editColumn('is_active', function ($row) {
                    $label = $row->is_active == 1 ? 'checked' : '';
                    return "
                    <div class='form-check form-switch form-check-inline'>
                    <input class='toggle-class form-check-input' type='checkbox' data-id='{$row->id}' role='switch' id='{$row->id}-switch' {$label}>
                    <label class='form-check-label' for='{$row->id}-switch'>Active</label>
                    </div>";
                })
                ->addColumn('jabatan', function (User $user) {
                    return $user->asisten->jabatan;
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm btnEdit">Edit</a>';
                    $deleteBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm btnDelete">Delete</a>';
                    return $editBtn . ' ' . $deleteBtn;
                })

                ->rawColumns(['action', 'jabatan', 'is_active'])
                ->make(true);
        }

        return view('admin.asisten.index');
    }

    public function store(AsistenStoreRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $user->assignRole('asisten');
            $user->givePermissionTo('create');
            $user->givePermissionTo('read');
            $user->givePermissionTo('update');
            $user->givePermissionTo('delete');

            Asisten::create([
                'user_id' => $user->id,
                'jabatan' => $request->jabatan,
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.create_assistant_success')]);
    }

    public function edit($id): JsonResponse
    {
        try {
            $user = User::with('asisten')->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_assistant')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' =>  Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' =>  Lang::get('messages.get_assistant_success'), 'data' => $user->toArray()]);
    }

    public function update(AsistenUpdateRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $data = $request->all();
            if ($request->has('password')) {
                $data['password'] = Hash::make($request->get('password'));
            }

            $user = User::findOrFail($id);
            $user->update($data);

            $user->asisten()->update([
                'jabatan' => $request->jabatan,
            ]);

            DB::commit();
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_assistant')], 404);
        } catch (Exception $e) {
            DB::rollBack();
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.update_assistant_success')]);
    }

    public function changeStatus(AsistantStatusRequest $request)
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
            $user = User::findOrFail($id);
            $user->delete();
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_assistant')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.delete_assistant_success')]);
    }
}
