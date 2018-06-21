<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $siteSetting = SiteSetting::all();

        return view('admin.sitesetting.index',compact('siteSetting'));
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
    public function store(Request $request , SiteSetting $siteSetting)
    {
        //
        foreach (array_except($request->toArray(),['_token','submit']) as $key=>$req){
            $siteSettingUpdate = $siteSetting->where('namesetting',$key)->get()[0];
            if ($siteSettingUpdate->type != 3){
                $siteSettingUpdate->fill(['value'=>$req])->save();
            }else{
                $fileName = uploadImage($req,'/public/website/slider/','1700','600',$siteSettingUpdate->value);
                if ($fileName){
                    $siteSettingUpdate->fill(['value'=>$fileName])->save();
                }elseif (!$fileName){
                    return redirect()->back()->withFlashMessage('إختر صورة أقل من 1700 * 600');
                }
            }
        }

        return redirect()->back()->withFlashMessage('تم تغيير إعدادات الموقع بنجاح');

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
