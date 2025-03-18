<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactModel;
use Illuminate\Http\Request;
use App\Mail\AdminContactMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\ContactModelRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        ContactModel::create($data);
        return redirect()->route('contact.index')->with('success', "Data Berhasil disimpan");
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
        return redirect()->route('contact.show', $id)->with('success', "data berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactModel::findOrFail($id);
        $contact->delete();

        return redirect()->route('contact.index', $id)->with('success', "data berhasil di Delete");
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
