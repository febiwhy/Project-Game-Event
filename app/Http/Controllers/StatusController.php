<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;


class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     $data = User::select(['id', 'name', 'email', 'status']);

        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('role', function ($row) {
        //             return $row->getRoleNames()->first();
        //         })
        //         ->addColumn('activity', function ($row) {
        //             if (Cache::has('user-is-online-' . $row->id)) {
        //                 return '<span class="badge bg-success">Online</span>';
        //             } else {
        //                 return '<span class="badge bg-secondary">Offline</span>';
        //             }
        //         })
        //         ->rawColumns(['payment_proof', 'status', 'role', 'activity'])
        //         ->make(true);
        // }
        // $users = User::with('roles')->get();
        // return view('status.index', ['users' => $users]);

        if ($request->ajax()) {
            $data = User::select(['id', 'name', 'email', 'status'])
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'user');
                });

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('role', function ($row) {
                    return $row->getRoleNames()->first();
                })
                ->addColumn('activity', function ($row) {
                    if (Cache::has('user-is-online-' . $row->id)) {
                        return '<span class="badge bg-success">Online</span>';
                    } else {
                        return '<span class="badge bg-secondary">Offline</span>';
                    }
                })
                ->rawColumns(['activity'])
                ->make(true);
        }

        $users = User::with('roles')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })
            ->get();

        return view('status.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
