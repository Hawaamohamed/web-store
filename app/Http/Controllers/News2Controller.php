<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News2;
use Validator;


class News2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $action = Request("action");

      //  return view("test")->with('val', $action);
        $all_news = News2::orderBy('id', 'asc')->paginate(10);
        $soft_deletes = News2::onlyTrashed();
        $all_all_news = News2::withTrashed();
        return view('layout.all_news',['all_news'=> $all_news, "soft_deletes"=>$soft_deletes]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $this->validate(request(), [
        'name'=>'required',
        'title'=>'required',
        'price'=>'required',

    ]);

        $add = new News2();
        $add->name = request('name');
        $add->save();
//session
session()->put('id', 1); //value
session()->push('message', ['key1'=>'val1']); //session array
session()->flash('message', 'Submitted Successfully'); //display message only one
session()->forget('message'); //delete message session




      //  News2::create(['name'=>request('name'),'title'=>request('name')]);
        return back(); //return redirect("all/news");
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
    public function destroy($id = null)
    { if($id != null){
        News2::find(request('id'))->delete();
        //News2::where(request($id));
       }else if(request()->has('restore') && request()->has('id')){
        News2::wherein('id', request('id'))->restore(); //delete multiple


       }  else if(request()->has('force_delete') && request()->has('id')){
             News2::wherein('id', request('id'))->forceDeleted();

        }else if(request()->has('delete') && request()->has('id')){

            News2::destroy(request('id')); //delete multiple
       }
        return redirect("all/news");


    }
}
