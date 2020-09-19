<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Query;
use App\Response;


class AdminController extends Controller
{
    public function index()
    {
        return view('/admin/dashboard');
    } 
    public function getAllQueries()
    {
        $query = Query::with('responses')->orderBy('updated_at','desc')->get();
        //return $query;
         return view('admin.dashboard')->with('query',$query);
    } 
    public function deleteAResponse($id)
    {
        Response::where('id',$id)->delete();
        return redirect('/admin/dashboard'); 
    } 

    public function responseFormView($id)
    {
        return view('admin.responseform')->with('id',$id);
    } 
    public function createResponse(Request $request,$id)
    {
        $resp = new Response;
        $resp->query_id = $id;
        $resp->response = $request->input('response');
        $resp->Save();
        return redirect('/admin/dashboard');
    }
}
