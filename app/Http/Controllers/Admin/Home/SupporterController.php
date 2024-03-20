<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SupporterRequest;
use App\Http\Responses\PrettyJsonResponse;
use App\Models\Supporter;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

class SupporterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Supporter::all();
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

        return view('admin.home.supporter.index');
    }

    public function store(SupporterRequest $request): JsonResponse
    {
        try {
            $data = $request->all();
            $data['image'] = $request->file('image')->storeAs(
                'public/supporter',
                'supporter.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );
            Supporter::create($data);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.create_supporter_success')]);
    }

    public function edit($id): JsonResponse
    {
        try {
            $data = Supporter::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_faq')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' =>  Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' =>  Lang::get('messages.get_supporter_success'), 'data' => $data->toArray()]);
    }

    public function update(SupporterRequest $request, $id): JsonResponse
    {
        try {
            $data = Supporter::findOrFail($id);
            $data->update($request->all());
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_faq')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.update_supporter_success')]);
    }

    public function destroy($id): JsonResponse
    {
        try {
            $data = Supporter::findOrFail($id);
            $data->delete();
        } catch (ModelNotFoundException $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.not_found_faq')], 404);
        } catch (Exception $e) {
            return new PrettyJsonResponse(['success' => false, 'message' => Lang::get('messages.internal_server_error')], 500);
        }

        return new PrettyJsonResponse(['success' => true, 'message' => Lang::get('messages.delete_supporter_success')]);
    }
}
