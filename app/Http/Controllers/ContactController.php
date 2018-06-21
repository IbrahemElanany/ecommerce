<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\DataTables\ContactDatatable;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContactDatatable $contact)
    {
        //
        return $contact->render('admin.contact.index');
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
    public function store(ContactRequest $request , ContactUs $contactUs)
    {
        //
//        $data = [
//            'contact_message'=>$request->contact_message,
//            'contact_name'=>$request->contact_name,
//            'contact_email'=>$request->contact_email,
//            'contact_type'=>contact()[$request->contact_type],
//
//        ];

        $contactUs->create($request->all());

        return redirect()->back()->withFlashMessage('تم إرسال رسالتك إلينا بنجاح');

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
        $contact = ContactUs::findOrFail($id);

        return view('admin.contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        //
        $contact = ContactUs::findOrFail($id);

        $contact->update($request->all());

        return redirect('/adminpanel/contact')->withFlashMessage('تم تعديل الرسالة بنجاح');
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
        $contact = ContactUs::findOrFail($id);

        $contact->delete();

        return redirect()->back()->withFlashMessage('تم حذف الرسالة بنجاح');
    }
}
