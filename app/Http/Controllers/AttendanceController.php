<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntryRequest;
use Larafm;
use App\Attendance;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
        new Attendance();
      }

    public function index(Request $request)
    {
      $user=Larafm::Auth()->user();
      $query=$request->query();
      if(!empty($query)and !empty($query["date"])){
        $date=$query["date"]."01";
        if (strtotime($date)) {
          $current=["Y"=>date("Y",strtotime($date)),"m"=>date("m",strtotime($date))];
          $date=date("m/*/Y",strtotime($date));
        }else {
          return redirect("archives");
        }
      }else{
        $current=["Y"=>date("Y"),"m"=>date("m")];
        $date=date("m/*/Y");
      }
      $articles=Attendance::where("ユーザーid",$user->アカウント)->where("日付",$date)->orderBy("日付")->get()->data;
      return view("pages.archives",compact("articles","current"));
    }

    public function postIndex(Request $request){
      $date=$request["year"].$request["month"];
      return redirect("archives?date=".$date);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.attendance");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntryRequest  $request)
    {
      $inputs=$request->all();
      $inputs["日付"]=date("Y/m/d");
      $account=Larafm::Auth()->user();
      $inputs["ユーザーid"]=$account->アカウント;
      $result=Attendance::create($inputs);
      return redirect('/archives/'.$result->data->RecId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
      $result=Attendance::where("RecId",$id)->first();
      if($result->errorCode!=0){
        return view("errors.401",compact("article"));
      }
      $article=$result->data;
      return view("pages.show",compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $result=Attendance::where("RecId",$id)->first();
      $article=$result->data;
      $article->日付=date("Y/m/d",strtotime($article->日付));
      return view("pages.edit",compact("article"));
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
      $inputs=$request->all();
      $result=Attendance::setId($id)->update($inputs);
      return redirect('/archives/'.$result->data->RecId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $result=Attendance::setId($id)->delete();
      return redirect("archives")->with('message', $id.'は消しました。');
    }
}
