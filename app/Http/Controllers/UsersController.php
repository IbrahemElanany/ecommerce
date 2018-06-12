<?php

namespace App\Http\Controllers;

use App\Bu;
use App\Http\Requests\AddUserRequestAdmin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UserDatatable;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDatatable $user)
    {
        //
//        $users = User::all();
//        return view('admin.user.index',compact('users'));
        return $user->render('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequestAdmin $request , User $user)
    {
        //\

        $user->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/adminpanel/users')->withFlashMessage('تم إضافة العضو بنجاح');
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
        $user = User::findOrFail($id);

        return view('admin.user.edit',compact('user'));
        
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
        $user = User::findOrFail($id);

        $user->update($request->all());


        return redirect('/adminpanel/users')->withFlashMessage('تم تعديل العضو بنجاح');


    }

    public function changePassword(Request $request ,$id){

        $user = User::findOrFail($request->id);

        $password = bcrypt($request->password);

//        $user->fill(['password'=>$password])->save();

        $user->update(['password'=>$password]);

        return redirect()->back()->withFlashMessage('تم تغيير كلمة المرور بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , User $user)
    {
        //
        $user ->findOrFail($id)->delete();
        Bu::where('user_id',$id)->delete();
        return redirect()->back()->withFlashMessage('تم حذف العضو بنجاح');
    }





}
