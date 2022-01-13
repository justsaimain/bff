<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use UA;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateRequest $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();

        return back()->with('success', 'Admin account created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('backend.admins.view', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('backend.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->update();
        return back()->with('success', 'Account Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return 'deleted';
    }

    public function changePassword(Request $request, $id)
    {
        $admin = Admin::find($id);
        if (Hash::check($request->current_password, $admin->password)) {
            $admin->password = bcrypt($request->old_password);
            $admin->update();
            return back()->with('success', 'Password changed.');
        }

        return back()->with('error', 'Incorrect currect password.');
    }

    public function ssd()
    {
        $admins = Admin::query();
        return Datatables::of($admins)
            ->addIndexColumn()
            ->editColumn('user_agent', function ($admin) {
                if ($admin->user_agent) {
                    $result = UA::parse($admin->user_agent);
                    $html = $result->toString();
                    return $html;
                }
            })
            ->addColumn('action', function ($admin) {
                $html = '<a type="button" class="btn btn-xs waves-effect waves-light btn-primary mr-1" href="' . route('backend.admins.show', $admin->id) . '">View</a><a type="button" class="btn btn-xs waves-effect waves-light btn-info" href="' . route('backend.admins.edit', $admin->id) . '">Edit</a>
                <button type="button" class="btn btn-xs waves-effect waves-light btn-danger admin-delete-btn" data-id="' . $admin->id . '">Delete</button>';
                return $html;
            })->make(true);
    }
}
