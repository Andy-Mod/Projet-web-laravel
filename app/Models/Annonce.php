<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Annonce extends Model
{
    use HasFactory;
 
    public static function user($i)
    {

        $users = DB::table('users')->where('id',$i)->first();

            return $users->name;
    }

    public static function getId($id)
    {

        DB::table('annonces')->where('id',$id)->delete();
        echo ("Suppression effectuée");
        return redirect()->route('home');
    }

    public static function getMail($id)
    {
        $annonce = Annonce::find($id);
        $user = User::find($annonce->user_id);

        return $user->mail;
    }

}

