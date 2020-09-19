<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Query;
use App\Response;

class UserController extends Controller
{
    public function index()
    {
        return view('/user/dashboard');
    } 
    public function getAllQueries()
    {
        $query = Query::where('user_id',Auth::user()->id)->with('responses')->orderBy('updated_at','desc')->get();

        return view('user.dashboard')->with('query',$query);
    } 
    public function deleteAQuery($id)
    {
        Query::where('id',$id)->delete();
        //$query = Query::where('user_id',Auth::user()->id)->with('responses')->get();
        return redirect('/user/dashboard');  
    } 
    public function queryFormView()
    {
        return view('user.queryform');
    } 
    public function createQuery(Request $request)
    {
        $query = new Query;
        $query->user_id = Auth::user()->id;
        $query->title = $request->input('title');
        $query->query = $request->input('query');
        $query->Save();
        return redirect('/user/dashboard');
    }
}
