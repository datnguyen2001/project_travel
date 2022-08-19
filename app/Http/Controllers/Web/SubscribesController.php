<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use App\Models\Subscribes;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class SubscribesController extends Controller
{
    public function subscribes(Request $request){
        try{
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'email' => 'required|email',
            ], [
                'email.required' => 'Vui lòng điền địa chỉ email ',
                'email.email' => 'Email không hợp lệ',
            ]);
            if ($validator->fails()) {
                return back()->with(['error' => $validator->errors()->first()]);
            }
            $contact = Subscribes::where('email', $request->get('email'))->first();
            if (isset($contact)){
                return back()->with(['error' => 'Địa chỉ email đã tồn tại']);
            }
            $contact = new Subscribes([
                'email' => $request->get('email'),
            ]);
            $contact->save();
            return back()->with(['success' => 'Tổng đài sẽ liên hệ với bạn sớm nhất có thể. Cảm ơn bạn đã quan tâm tới chúng tôi']);
        }catch (\Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
}
