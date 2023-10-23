<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\models\User;
use Cloudinary;

class UserController extends Controller
{
    /**public function index(int $id)
    {
        return view('user.list.index');
    }**/
    
    /**public function show()
    {
        return view('profile');
    }**/
    
    public function index()
    {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('users.list.index', ['user' => $user]);
    }
 
    public function update(Request $request, User $user)
    {   
        $id = Auth::id();
        $input = $request['user'];
         if($request->file('image')){
            $image_path = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            dd($image_path); 
            $input += ['image_path' => $image_path];
         } 
        /**$affected = DB::table('users')
            ->where('id', $id)
            ->update(['image_path' => $image_path]);**/
        $user->fill($input)->save();
        return redirect('/user/'.$user->id);
        //return redirect('/user/' . $user->id)->with([
                //"message" => "マイページ画像を変更しました。",
                //"image_path" => $image_path,
            //]);;
    }
}
