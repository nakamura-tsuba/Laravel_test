<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Bbs;
use Illuminate\Support\Facades\DB;
use App\Services\CheckFormData;
use App\Services\CheckSearchData;
use App\Http\Requests\StoreContactForm;
use App\Models\UploadImage;
class ContactFormController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        // 検索フォーム
        $query = DB::table('bbs');
        $contacts = CheckSearchData::checkSearch($query, $search);
        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact.create');
    }

    //バリデーションチェックリクエスト
    public function store(Request $request)
    {
        $contact = new Bbs;
        $validate_rule = [
            'your_name' => 'required|string|max:20',
            'title' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'url' => 'url|nullable',
            'gender' => 'required',
            'age' => 'required',
            'category_id' => 'required',
            'contact' => 'required|string|max:200',
            'caution' => 'required|accepted',
        ];
        $this->validate($request, $validate_rule);
        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');
        $contact->category_id = $request->input('category_id');

        if ($file = $request->file('image')) {
            $filename = $request->file('image')->store('public');
            $contact->image = str_replace('public/', "", $filename);
        }
        /*
                if($upload_image) {
                    //アップロードされた画像を保存
                    $path = $upload_image->store('image');
                    // 画像の保存に成功したらDBに記録する
                    if($path){
                    }
               if(request('image')){
                   $filename=request()->file('image')->getClientOriginalName();
                   $inputs['image']=request('image')->storeAs('public/images',$filename);
               }
                 $contact->create($inputs);
                $contact->image = $request->input('image');
        */
        $contact->save();

        return redirect('contact/index');

    }

    public function show($id)
    {

        $contact = Bbs::find($id);
        $gender = CheckFormData::checkGender($contact);
        $age = CheckFormData::checkAge($contact);

        return view('contact.show',
            compact('contact', 'gender', 'age'));
    }

    public function edit($id)
    {
        $contact = Bbs::find($id);
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Bbs::find($id);
        $validate_rule= [
            'your_name' => 'required|string|max:20',
            'title' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'url' => 'url|nullable',
            'gender' => 'required',
            'age' => 'required',
            'category_id' => 'required',
            'contact' => 'required|string|max:200',
        ];
        $this->validate($request,$validate_rule);
        $contact->your_name = $request->input('your_name');
        $contact->title = $request->input('title');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->contact = $request->input('contact');
        $contact->category_id = $request->input('category_id');
        $contact->save();

        return redirect('contact/index');
    }

    public function destroy($id)
    {
        $contact = Bbs::find($id);
        $contact->delete();
        return redirect('contact/index');
    }


}
