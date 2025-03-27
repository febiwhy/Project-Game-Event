<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // dd(Role::get());
        if ($request->ajax()) {
            $data = User::select(['id', 'name', 'email']);


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('role', function ($row) {
                    return $row->getRoleNames()->first();
                })
                ->addColumn('action', function ($row) {
                    return '<div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown">
                                        <i class="icon-menu7"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="' . route('account.show', $row->id) . '" class="dropdown-item">
                                            <i class="icon-file-stats"></i> Detail Data
                                        </a>
                                        <a href="' . route('account.edit', $row->id) . '" class="dropdown-item">
                                            <i class="icon-file-text2"></i> Edit Data
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item" onclick="confirmDelete(' . $row->id . ')">
                                            <i class="icon-file-minus"></i> Hapus Data
                                        </a>
                                    </div>
                                </div>
                            </div>';
                })
                ->rawColumns(['action', 'role'])
                ->make(true);
        }

        $users = User::with('roles')->get();
        $data = Pendaftaran::all();
        return view('admin.account.index', compact('data', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.account.create-edit', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|string'
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil disimpan!',
            'id' => $users->id
        ]);

        $users->assignRole($request->role);

        // return redirect()->route('account.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::with('roles')->findOrFail($id);
        return view('admin.account.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.account.create-edit', compact('users', 'roles'));
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
        $users = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string',
        ]);

        $users->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $users->update(['password' => bcrypt($request->password)]);
        }

        $users->syncRoles($request->role);

        return redirect()->route('account.index')->with('success', 'User berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus!'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan! Data gagal dihapus.',
                'error' => $e->getMessage()
            ], 500);
        }
        // $user = User::findOrFail($id);
        // $user->delete();

        // return redirect()->route('account.index')->with('success', 'User berhasil dihapus!');
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|unique:roles,name'
        ]);

        $users = Role::create(['name' => $request->role_name]);
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil disimpan!',
            'id' => $users->id
        ]);

        // return redirect()->route('account.index')->with('success', 'Role baru berhasil ditambahkan!');
    }

    public function createRole()
    {
        return view('admin.account.add-roles.create-edit');
    }
}
