<?php

namespace App\Http\Controllers;
use Auth;
use User;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
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
        //
        return view('Annonce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        $annonce = new Annonce();
        $annonce->titre = $request->titre;
        $annonce->type = $request->tipe;
        $annonce->prix = $request->prix;
        $annonce->description = $request->description;
        $annonce->user_id= $user_id;
        $annonce->contact = $request->contact;
        $annonce->save();
        return view('Annonce.success');
        return back()->with('message', "Annonce correctement répectoriée");
       
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
        $annonce = Annonce::find($id);
        return view('Annonce.edit')->with('annonce', $annonce);
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
        //appliquer les modifications
        $annonce = DB::table('annonces')->where('id',$id);
        
        $annonce->update([
            'titre'=>$request->titre,
            'type'=>$request->tipe,
            'prix'=>$request->prix,
            'description'=>$request->description,
            'contact'=>$request->contact,
        ]);
        return view('Annonce.success');
        return back()->with('message', "Annonce correctement répectoriée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('annonces')->where('id',$id)->delete();
        echo ("Suppression effectuée");
        return redirect()->route('home');
    }

    public function shutdown($id)
    {
        $annonce = DB::table('annonces')->where('id',$id);
        $annonce->update([
            'active'=>'FALSE',
        ]);
        return redirect()->route('Annonce.success');
    }

    public function up($id)
    {
        DB::table('annonces')->where('id',$id)->update([
            'active'=>'TRUE',
        ]);
        return redirect()->route('Annonce.success');
    }

    public function active($id)
    {
        $annonce = DB::table('annonces')->where([
            'user_id'=>$id,
            'active'=>'TRUE',
        ]);
        return $annonce;
    }




}
