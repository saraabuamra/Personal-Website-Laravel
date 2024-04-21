<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ChannelController extends Controller
{
    public function channels(): View
    {
        Session::put('page','channels');
        $channels = Channel::get()->toArray();
        return view('admin.channels.channels')->with(compact('channels'));
    }

    public function deleteChannel($id){
        //Delete Channel 
        Channel::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف قناة اليوتيوب بنجاح');
      }

      public function addEditChannel(Request $request,$id=null){
       Session::put('page','channels');
       if($id==""){
       $title = "إضافة قناة اليوتيوب";
       $channel = new Channel;
       $message = "تم إضافة قناة اليوتيوب بنجاح";
       }else{
           $title = "تعديل قناة اليوتيوب";
           $channel = Channel::find($id);
           $message = "تم تعديل قناة اليوتيوب بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'title'=>'required',
                    'url'=>'required|url'
            ],[
                'title.required'=>'عنوان قناة اليوتيوب مطلوب',
                'url.required'=>'رابط قناة اليوتيوب مطلوب',
                'url.url'=>'الرجاء كتابة الرابط بشكل صحيح',
            ]);

        
           $channel->title = $request->title;
           $channel->url = $request->url;
           $channel->description = $request->description;
           $channel->notes = $request->notes;
           $channel->save();
           return redirect('admin/channels')->with('status',$message);
       }
       return view('admin.channels.add_edit_channel')->with(compact('title','channel','message'));
      }
}
