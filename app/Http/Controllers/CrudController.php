<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use App\Models\User;
use App\Http\Requests\CrudRequest;
use Illuminate\Support\Facades\Auth;

class CrudController extends Controller
{
    
    public function index()
    {
        
        $user = auth()->user();
        
        if(!empty($user) && $user->id < 0){
            return redirect('/logout');
        }

        //check for user query
        if(!empty($user) && $user->role > 0){
            $cruds = Crud::select('cruds.*','users.username')->leftJoin('users', function($join) {
                $join->on('cruds.user_id', '=', 'users.id');
              })->where('user_id',$user->id)->paginate(5);
        } else {
            $cruds = Crud::select('cruds.*','users.username')->leftJoin('users', function($join) {
                $join->on('cruds.user_id', '=', 'users.id');
              })->paginate(5);
        }
        return view('crud.index', compact('cruds'));
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'post' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            $name = "";
        if($request->hasfile('img'))
        {
           $path = "upload/";
           $name = $request->file('img')->getClientOriginalName();
           $request->file('img')->move($path, $name); 
        } 

        $id = auth()->user()->id;
        $crud = new Crud();
        $crud->user_id = $id;
        $crud->title = $request->title;
        $crud->post = $request->post;
        $crud->img =  $name;
        $crud->status = ($request->status == "on") ? 1 : 0;

        $crud->save();
        return redirect('/')->with('success','Created successfully!');
    }

    public function show(Crud $crud)
    {
        return view('crud.show', compact('crud'));
    }

    public function edit(Crud $crud)
    {
        return view('crud.edit', compact('crud'));
    }

    public function update(Crud $crud, Request $request)
    {

        $request->validate([
            'title' => 'required',
            'post' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        
        $name = "";
        if($request->hasfile('img'))
        {
           $path = "upload/";
           $name = $request->file('img')->getClientOriginalName();
           $request->file('img')->move($path, $name); 
        } 

        $crud->title = $request->title;
        $crud->post = $request->post;
        $crud->img =   $name;
        $crud->status = ($request->status == "on") ? 1 : 0;

        $crud->save();
        return redirect('/')->with('success','Updated successfully!');
    }

    public function destroy(Crud $crud)
    {
        $crud->delete();
        return redirect('/')->with('success','Deleted successfully!');
    }
}
