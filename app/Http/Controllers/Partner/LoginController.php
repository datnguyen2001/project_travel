<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        $title = 'Đăng nhập';
        return view('partner.login', compact('title'));
    }

    public function dologin (Request $request)
    {
        try{
            $bodyData = $request->all();
            $check = User::where('name', $bodyData['username'])
                ->where('level', 'partner')
                ->exists();
            if (!$check) {
                return redirect()->route('partner.login')->with(['alert'=>'danger', 'message' => 'Số điện thoại không tồn tại']);
            }
            $dataAttemptAdmin = [
                'name' => $bodyData['username'],
                'password' => $bodyData['password'],
                'level' => 'partner',
            ];
            if (Auth::attempt($dataAttemptAdmin)) {
                return redirect()->route('partner.book_room.index');
            }
            return redirect()->route('partner.login')->with(['alert'=>'danger', 'message' => 'Tài khoản hoặc mật khẩu không chính xác']);
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
            ->route('partner.login')
            ->with(['alert' => 'success', 'message' => 'Đăng xuất thành công']);
    }
}
