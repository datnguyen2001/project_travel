<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        $title = 'Đăng nhập';
        return view('admin.login', compact('title'));
    }

    public function dologin (Request $request)
    {
        try{
            $bodyData = $request->all();
            $check = User::where('name', $bodyData['username'])
                ->where('level', 'Admin')
                ->exists();
            if (!$check) {
                return redirect()->route('admin.login')->with(['alert'=>'danger', 'message' => 'Số điện thoại không tồn tại']);
            }
            $dataAttemptAdmin = [
                'name' => $bodyData['username'],
                'password' => $bodyData['password'],
                'level' => 'Admin',
            ];
            if (Auth::attempt($dataAttemptAdmin)) {
                return redirect()->route('admin.index');
            }
            return redirect()->route('admin.login')->with(['alert'=>'danger', 'message' => 'Tài khoản hoặc mật khẩu không chính xác']);
        }catch (\Exception $e){
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Đăng xuất
    **/
    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route('admin.login')
            ->with(['alert' => 'success', 'message' => 'Đăng xuất thành công']);
    }
    /**
     * đăng ký
    **/
    public function register (Request $request)
    {
        $user = new User([
            'name' => '0915559221',
            'email' => 'jacktran210194@gamil.com',
            'password' => bcrypt($request->get('password')),
            'level' => 'Admin'
        ]);
        $user->save();
        return back();
    }
}
