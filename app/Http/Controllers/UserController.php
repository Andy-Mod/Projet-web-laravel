<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('users.register-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $existe =  DB::table('users')->where('name',$name)->first();
        if($existe){
            return back()->with('error', "L\'utilisateur $name existe deja veillez changez de nom d'utilisateur");
            return view('user.register-new-fail');
        }
        $existe =  DB::table('users')->where('name', $request->email)->first();
        if($existe){
            return back()->with('error', "L\'email $request->email existe deja veillez changez de nom d'utilisateur");
            return view('user.register-new-fail');
        }

        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return view('admin.index');
        return back()->with('message', "Utilisateur correctement répectorié");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getById($id);

		return view('liste',  compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = DB::table('users')->where('id', $id)->value('id');
        return view('users.edit',compact('id'));
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
            User::find($id)->update([
            'name'=>$request->username,
            'email'=>$request->email,
            'admin'=>$request->admin,
        ]);
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('annonces')->where('user_id',$id)->delete();
        DB::table('users')->where('id',$id)->delete();
        return view('admin.index');
        
    }
}
