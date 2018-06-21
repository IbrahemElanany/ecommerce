<?php

namespace App\Http\Controllers;

use App\Bu;
use App\DataTables\BuDatatable;
use App\Http\Requests\BuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BuDatatable $bu)
    {
        //
        return $bu->render('admin.bu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.bu.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $buRequest , Bu $bu)
    {
        //

        if($buRequest->file('image')){
            $fileName = uploadImage($buRequest->file('image'));
            if (!$fileName){
                return redirect()->back()->withFlashMessage('إختر صورة أقل من 500 * 362');
            }
            $image = $fileName;
        }else{
            $image = '';
        }
        $user = Auth::user();
        $data = [
            'bu_name'=>$buRequest->bu_name,
            'bu_price'=>$buRequest->bu_price,
            'bu_rent'=>$buRequest->bu_rent,
            'bu_square'=>$buRequest->bu_square,
            'bu_type'=>$buRequest->bu_type,
            'bu_small_des'=>$buRequest->bu_small_des,
            'bu_meta'=>$buRequest->bu_meta,
            'bu_langtuide'=>$buRequest->bu_langtuide,
            'bu_latitude'=>$buRequest->bu_latitude,
            'bu_large_des'=>$buRequest->bu_large_des,
            'bu_status'=>$buRequest->bu_status,
            'user_id'=>$user->id,
            'bu_rooms'=>$buRequest->bu_rooms,
            'bu_place'=>$buRequest->bu_place,
            'image'=>$image
        ];


        $bu->create($data);

        return redirect('/adminpanel/bu')->withFlashMessage('تم إضافة العقار بنجاح');
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
        $bu = Bu::find($id);

        return view('admin.bu.edit',compact('bu'));
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
        $bu = Bu::findOrFail($id);

        $bu->update(array_except($request->all(),['image']));

        if($request->file('image')){
            $fileName = uploadImage($request->file('image'),'/public/website/bu_images/' , '500' , '362' , $bu->image);
            if (!$fileName){
                return redirect()->back()->withFlashMessage('إختر صورة أقل من 500 * 362');
            }
            $bu->update(['image'=>$fileName]);
        }

        return redirect('/adminpanel/bu')->withFlashMessage('تم تعديل العقار بنجاح');
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

        $bu = Bu::findOrFail($id)->delete();

        return redirect('/adminpanel/bu')->withFlashMessage('تم حذف العقار بنجاح');
    }

    public function showAll(Bu $bu){
        $buAll = $bu->where('bu_status',1)->orderBy('id','desc')->paginate(15);
        return view('website.bu.all',compact('buAll'));
    }

    public function ForRent(Bu $bu){
        $buAll = $bu->where('bu_status',1)->where('bu_rent',1)->orderBy('id','desc')->paginate(15);
        return view('website.bu.all',compact('buAll'));
    }

    public function ForBuy(Bu $bu){
        $buAll = $bu->where('bu_status',1)->where('bu_rent',0)->orderBy('id','desc')->paginate(15);
        return view('website.bu.all',compact('buAll'));
    }

    public function showByType($type , Bu $bu){
        if (in_array($type,['0','1','2'])){
            $buAll = $bu->where('bu_status',1)->where('bu_type',$type)->orderBy('id','desc')->paginate(15);
            return view('website.bu.all',compact('buAll'));
        }else{
            return Redirect::back();
        }
    }


//    public function search(Request $request , Bu $bu){
//        $requestAll = array_except($request->toArray(),['submit','_token']);
//        $out = '';
//        $i = 0;
//        foreach ($requestAll as $key=>$req){
//            if($req != ''){
//                $where = $i == 0 ? ' where ' : ' and ' ;
//                $out .= $where.''.$key.' = '.$req;
//                $i = 2;
//            }
//        }
//        $query = 'select * from bu'.$out;
//
//        $buAll = DB::select($query);
//        $search = 'search';
//        return view('website.bu.all',compact('buAll','search'));
//    }

    public function search(Request $request , Bu $bu){
        
        $requestAll = array_except($request->toArray(),['submit','_token','page']);
        $query = DB::table('bu')->select('*');
        $array = [];
        $count = count($requestAll);
        $i = 0;
        foreach ($requestAll as $key=>$req){
            $i++;
            if($req != ''){
                if ($key == 'bu_price_from' && $request->bu_price_to == ''){
                    $query->where('bu_price','>=',$req);
                }elseif ($key == 'bu_price_to' && $request->bu_price_from == ''){
                    $query->where('bu_price','<=',$req);
                }else{
                    if($key != 'bu_price_to' && $key != 'bu_price_from'){
                        $query->where($key,$req);
                    }
                }
                $array[$key] = $req;
            }elseif ($count == $i && $request->bu_price_to != '' && $request->bu_price_from != ''){
                $query->whereBetween('bu_price',[$request->bu_price_from,$request->bu_price_to]);
                $array[$key] = $req;
            }
        }

        $buAll = $query->paginate(15);

        return view('website.bu.all',compact('buAll','array'));
    }


    public function showsingle($id , Bu $bu){

        $buInfo = $bu->findOrFail($id);
        $same_rent = $bu->where('bu_rent',$buInfo->bu_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
        $same_type = $bu->where('bu_type',$buInfo->bu_type)->orderBy(DB::raw('RAND()'))->take(3)->get();
        return view('website.bu.buinfo',compact('buInfo','same_rent','same_type'));
    }

    public function getAjaxInfo(Request $request , Bu $bu){
        return $bu->find($request->id)->toJson();
    }


}
