<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MataPraktikumRequest;
use App\Http\Requests\Admin\PenjadwalanRequest;
use App\Http\Responses\PrettyJsonResponse;
use App\Models\Penjadwalan;
use App\Models\Periode;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

class PenjadwalanController extends Controller
{
    public function index(Request $request, $periode)
    {
        Periode::findOrFail($periode);

        if ($request->ajax()) {
            $data = Penjadwalan::with('asisten', 'asisten.user', 'mata_praktikum', 'ruangan', 'kelas')->where('periode_id', $periode)->get();
            return DataTables::of($data)
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->removeColumn('mata_praktikum_id')
                ->removeColumn('ruangan_id')
                ->removeColumn('kelas_id')
                ->removeColumn('asisten_1_id')
                ->removeColumn('asisten_2_id')
                ->removeColumn('periode_id')
                ->addIndexColumn()
                ->editColumn('is_active', function ($row) {
                    $label = $row->is_active == 1 ? 'checked' : '';
                    return "
                    <div class='form-check form-switch form-check-inline'>
                    <input class='toggle-class form-check-input' type='checkbox' data-id='{$row->id}' role='switch' id='{$row->id}-switch' {$label}>
                    <label class='form-check-label' for='{$row->id}-switch'>Active</label>
                    </div>";
                })
                ->addColumn('asisten_1', function (Penjadwalan $row) {
                    return $row->asisten->user->name;
                })
                ->addColumn('asisten_2', function (Penjadwalan $row) {
                    return $row->asisten->user->name;
                })
                ->addColumn('ruangan', function (Penjadwalan $row) {
                    return $row->ruangan->nama;
                })
                ->addColumn('kelas', function (Penjadwalan $row) {
                    return $row->kelas->nama . ' '  . $row->kelas->jurusan->nama . ' ' . $row->kelas->tingkat;
                })
                ->addColumn('mata_praktikum', function (Penjadwalan $row) {
                    return $row->mata_praktikum->nama;
                })
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm btnEdit">Edit</a>';
                    $deleteBtn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm btnDelete">Delete</a>';
                    return $editBtn . ' ' . $deleteBtn;
                })

                ->rawColumns(['action', 'mata_praktikum', 'kelas', 'ruangan', 'asisten_1', 'asisten_2', 'is_active'])
                ->make(true);
        }
        return view('admin.penjadwalan.index', compact('periode'));
    }

    public function store(PenjadwalanRequest $request, $periode): JsonResponse
    {
        try {
            Penjadwalan::create(array_merge($request->all(), ['periode_id' => $periode]));
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.create_schedule_success')]);
    }

    public function edit($periode, $id): JsonResponse
    {
        try {
            $data = Penjadwalan::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_room')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' =>  Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' =>  Lang::get('messages.get_schedule_success'), 'data' => $data->toArray()]);
    }

    public function update(PenjadwalanRequest $request, $periode, $id): JsonResponse
    {
        try {
            $data = Penjadwalan::findOrFail($id);
            $data->update($request->all());
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_room')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.update_schedule_success')]);
    }

    public function destroy($periode, $id): JsonResponse
    {
        try {
            $penjadwalan = Penjadwalan::findOrFail($id);
            $penjadwalan->delete();
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_room')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.delete_schedule_success')]);
    }
}
