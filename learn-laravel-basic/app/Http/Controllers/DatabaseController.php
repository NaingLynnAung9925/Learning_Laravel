<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{
   public function index()
   {
    // $user = DB::table('databases')->where('name', 'unknow')->first();
    // return $user->email;
    // echo DB::table('databases')->where('name', 'kyaw')->value('email');
    return DB::table('databases')->find(3);
   }

   public function column()
   {
    $titles = DB::table('databases')->pluck('title', 'name');
    foreach($titles as $name => $title){
        echo $name ." - ".$title. ' ';
    }
   }

   public function countUser()
   {
    return DB::table('databases')->count();
   }

   public function exist()
   {
        if(DB::table('databases')->where('name', 'unknow')->exists())
        {
            echo "User is exist";
        }
        if(DB::table('databases')->where('name', 'aung aung')->doesntExist())
        {
            echo "User doesn't exist";
        }
   }

   public function selectUser()
   {
    echo $users = DB::table('databases')->select('name', 'email')->orderBy('name', 'asc')->get();
   }

   public function addSelect()
   {
        $query = DB::table('databases')->select('email');
        $users = $query->addSelect('title')->get();
        echo $users;
   }

   public function join()
   {
        $users = DB::table('databases')
                ->join('posts', 'databases.id', '=', 'posts.databases_id')
                ->get();
                echo "<pre>";
    print_r($users);
   }

   public function leftJoin()
   {
        $leftjoin = DB::table('databases')
                ->leftJoin('posts', 'databases.id', '=', 'posts.databases_id')
                ->get();
        echo "<pre>";
        print_r($leftjoin);
   }

   public function rightJoin()
   {
        $leftjoin = DB::table('databases')
                ->rightJoin('posts', 'databases.id', '=', 'posts.databases_id')
                ->get();
        echo "<pre>";
        print_r($leftjoin);
   }

   public function delete()
   {
    $deleted = DB::table('posts')
                ->where('databases_id', '>', '3')
                ->delete();
    echo "Posts have been deleted";
   }

}
