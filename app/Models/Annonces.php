<?php

namespace App\Models\Annonce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Annonces extends Model
{
    use HasFactory;
    public static function get()
    {
        $posts = DB::select('select * from annonces', [1]);
        return $posts;
    }
}
