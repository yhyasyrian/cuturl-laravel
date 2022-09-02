<?php

namespace App\Http\Controllers;

use App\Models\ShourtLink as ShourtLinks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShourtLink extends Controller
{
    public function index()
    {
        $links = ShourtLinks::paginate(10); 
        return \view('welcome',['Link'=>$links]);
    }
    public function post(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'url'=> ['bail','required','unique:shourt_links,url','url','active_url']
        ],[
            'url.required' => __('welcome.urlrequired'),
            'url.unique' => __('welcome.urlunique'),
            'url.url' => __('welcome.urlurl'),
            'url.active_url' => __('welcome.urlurl'),
        ])->validate();
        $data = ['url'=>$request->input('url'),'code'=>\Illuminate\Support\Str::random(8)];
        ShourtLinks::create($data);
        $links = ShourtLinks::paginate(10); 
        return \view('welcome',['Link'=>$links,'success'=>true]);
    }
    public function code(string $code)
    {
        $sql = ShourtLinks::where('code',$code)->firstOrFail();
        $sql->count_visit += 1;
        $sql->save();
        return redirect($sql->url);
    }
}
