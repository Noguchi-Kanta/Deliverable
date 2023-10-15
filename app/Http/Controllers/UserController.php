<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
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
    }
    
     public function profileUpdate()
    {
        return redirect()->route('articles_index')->with('msg_success', 'プロフィールの更新が完了しました');
    }
    
    public function passwordUpdate()
    {
        return redirect()->route('articles_index')->with('msg_success', 'パスワードの更新が完了しました');
    }**/
    public function index()
    {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('users.list.index', ['user' => $user]);
    }
 
    public function my_page_update(Request $request, User $user)
    {   
        $id = Auth::id();
        $input = $request['user'];
         if($request->file('image')){
            $image_path = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_path' => $image_path];
        }
        dd($image_url); 
        /**$top_image_path2 = basename($photo_path);
        // DBの対象カラムを更新する
        $affected = DB::table('users')
            ->where('id', $id)
            ->update(['image_path' => $image_path]);**/
        $user->fill($input)->save();
        return redirect('/my_page/' . $user->id)->with([
                "message" => "マイページ画像を変更しました。",
                "image_path" => $image_path
            ]);;
    }
}
