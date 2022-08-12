<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Database;
use App\Models\Post;

class DatabaseController extends Controller
{
   public function index()
   {

    // $user = DB::table('databases')->where('name', 'unknow')->first();
    // return $user->email;
     // return Database::where('name', 'kyaw kyaw')->value('email');
     // return Database::distinct()->get();
     return Database::all();
   }

   public function column()
   {
    $titles = Database::pluck( 'email', 'name');
    foreach($titles as $name => $email){
        echo $name ." - ".$email. "<br>";
    }
   }

   public function countUser()
   {
    return Database::count();
   }

   public function exist()
   {
        if(Database::where('name', 'unknow')->exists())
        {
            echo "User is exist". "<br>";
        }
        if(Database::where('name', ' aung')->doesntExist())
        {
            echo "User doesn't exist";
        }
   }

   public function selectUser()
   {
    echo $users = Database::select('name', 'email')->orderBy('name', 'asc')->get();
   }

   public function addSelect()
   {
        $query = Database::select('email');
        $users = $query->addSelect('title')->get();
        echo $users;
   }

   public function join()
   {
        $users = Database::join('posts', 'databases.id', '=', 'posts.databases_id')
                ->get();
                echo "<pre>";
    return $users;
   }

   public function leftJoin()
   {
        $leftjoin = Database::leftJoin('posts', 'databases.id', '=', 'posts.databases_id')
                ->get();
        echo "<pre>";
        print_r($leftjoin);
   }

   public function rightJoin()
   {
        $rightjoin = Database::rightJoin('posts', 'databases.id', '=', 'posts.databases_id')
                ->get();
        echo "<pre>";
        print_r($rightjoin);
   }

   public function delete()
   {
    $deleted = Post::where('databases_id', '>', '3')
                ->delete();
    echo "Posts have been deleted";
   }

}
