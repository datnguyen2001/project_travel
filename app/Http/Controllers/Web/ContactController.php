<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ContactController extends Controller
{
    public function index(){
        $title_banner = (object)[
            'title' => 'Liên hệ',
            'background' => 'images/banner/banner-introduce.png',
            'nav' => [
                (object)[
                    'title' => 'Trang chủ',
                    'link' => route('web.home'),
                    'active' => false
                ],
                (object)[
                    'title' => 'Liên hệ',
                    'link' => route('web.contact'),
                    'active' => true
                ]
            ]
        ];
        return $this->check_mobile()
            ? view('web-mobile.contact.contact',compact('title_banner'))
            : view('web.contact.contact',compact('title_banner'));
    }

    public function store (Request $request)
    {
        try{
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:10|max:10',
            ], [
                'name.required' => 'Vui lòng điền tên người dùng',
                'phone.required' => 'Vui lòng điền số điện thoại người dùng',
                'phone.regex' => 'Số điện thoại không đúng',
            ]);
            if ($validator->fails()) {
                return back()->with(['error' => $validator->errors()->first()]);
            }
            $contact = new ContactModel([
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'note' => $request->get('note')
            ]);
            $contact->save();
            return back()->with(['success' => 'Tổng đài sẽ liên hệ với bạn sớm nhất có thể. Cảm ơn bạn đã quan tâm tới chúng tôi']);
        }catch (Exception $exception){
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function adminData (Request $request)
    {
        $listData = ContactModel::query();
        if (isset($request->is_support)){
            $listData = $listData->where('is_support', $request->get('is_support'))->orderBy('created_at', 'desc')->paginate(20);
        }else{
            $listData = $listData->orderBy('created_at', 'desc')->paginate(20);
        }
        $titlePage = 'Liên hệ';
        $page_menu = 'contact';
        $page_sub = 'index';
        return view('admin.contact.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function success ($id)
    {
        $contact = ContactModel::find($id);
        if (empty($contact)){
            return back()->with(['error' => 'Liên hệ không tồn tại']);
        }
        $contact->is_support = 1;
        $contact->save();
        return back();
    }
}
