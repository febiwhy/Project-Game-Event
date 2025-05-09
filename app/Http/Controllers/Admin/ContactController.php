<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactModel;
use Illuminate\Http\Request;
use App\Mail\AdminContactMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\ContactModelRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete', ['only' => ['show']]);
        $this->middleware('permission:contact-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:contact-index', ['only' => ['index']]);
        $this->middleware('permission:contact-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ContactModel::select(['id', 'location', 'foto', 'telepon', 'email']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('foto', function ($row) {
                    return '<img src="' . asset($row->foto) . '" alt="Thumbnail" width="50" height="50">';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown">
                                        <i class="icon-menu7"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="' . route('contact.edit', $row->id) . '" class="dropdown-item">
                                            <i class="icon-file-text2"></i> Edit Data
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item" onclick="confirmDelete(' . $row->id . ')">
                                            <i class="icon-file-minus"></i> Hapus Data
                                        </a>
                                    </div>
                                </div>
                            </div>';
                })
                ->rawColumns(['action', 'foto'])
                ->make(true);
        }
        $contact = ContactModel::first();      
        return view('admin.contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create-edit', ['contact' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactModelRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('contact', 'public');
            $data['foto'] = "/storage/" . $path;
        }
        $contact = ContactModel::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil disimpan!',
            'id' => $contact->id
        ]);
        // return redirect()->route('contact.index')->with('success', "Data Berhasil disimpan");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactModel::findOrFail($id);
        $contactus = ContactModel::all();
        return view('admin.contact.show', compact('contact', 'contactus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $contact_model = ContactModel::all();
        $contact = ContactModel::findOrFail($id);
        return view('admin.contact.create-edit', compact('contact', 'contact_model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactModelRequest $request, $id)
    {
        $contact = ContactModel::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('foto')) {
            // Simpan file ke "storage/app/public/game-event"
            $path = $request->file('foto')->store('contact', 'public');

            // Simpan path yang benar untuk ditampilkan di frontend
            $data['foto'] = "/storage/" . $path;
        }
        $contact->update($data);
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diperbarui',
            'id' => $contact->id
        ]);
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
            $contact = ContactModel::findOrFail($id);
            $contact->delete();

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
        // $contact = ContactModel::findOrFail($id);
        // $contact->delete();

        // return redirect()->route('contact.index', $id)->with('success', "data berhasil di Delete");
    }

    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'subject' => $request->subject,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        
        
        Mail::to('admin@yourapp.com')->send(new AdminContactMail($data));
        // Mail::send('emails.emailadmincontact', $data, function ($message) use ($data) {
            //     $message->to('febiwahyu469@gmail.com', 'Admin')
            //         ->subject('Pesan Baru: ' . $data['subject']);
            // });
            
            return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
