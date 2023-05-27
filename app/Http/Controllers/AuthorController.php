<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Setting;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AuthorController extends Controller
{
    public function index(Request $request){
        return view('back.pages.home');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    public function ResetForm(Request $request, $token=null){
        $data = [
            'pageTitle'=>'Reset Password',
        ];
        return view('back.pages.auth.reset',$data)->with(['token'=>$token,'email'=>$request->email]);
    }

    public function changeProfilePicture(Request $request){
        $user = User::find(auth('web')->id());
        $path = 'back/dist/img/authors/';
        $file = $request->file('file');
        $old_picture = $user->getAttributes()['picture'];
        $file_path = $path.$old_picture;
        $new_picture_name = 'AIMG'.$user->id.time().rand(1,100000).'.jpg';

        if ($old_picture != null && File::exists(public_path($file_path))) {
            File::delete(public_path($file_path));
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if ($upload) {
            $user->update([
                'picture'=>$new_picture_name
            ]);
            return response()->json(['status'=>1, 'msg'=>'Your profile picture has been successfully updated.']);
        } else {
            return response()->json(['status'=>0, 'msg'=>'Something went wrong.']);
        }
        
    }

    public function changeBlogLogo(Request $request){
    $settings = Setting::find(1);
    $logo_path = 'back/dist/img/logo-favicon/';
    $old_logo = $settings->blog_logo;
    $file = $request->file('blog_logo');

    if ($request->hasFile('blog_logo')) {
        if ($old_logo != null && File::exists(public_path($old_logo))) {
            File::delete(public_path($old_logo));
        }

        $filename = time() . '_' . rand(1, 100000) . '_blog_logo.png';
        $file->move(public_path($logo_path), $filename);

        $settings->update([
            'blog_logo' => $filename
        ]);

        return response()->json(['status' => 1, 'msg' => 'Blog logo has been successfully updated.']);
    }
        return response()->json(['status' => 0, 'msg' => 'No file was uploaded.']);
    }


    public function createPost(Request $request){
        $request->validate([
            'post_title'=>'required|unique:posts,post_title',
            'post_content'=>'required',
            'post_category'=>'required|exists:sub_categories,id',
            'featured_image'=>'required|mimes:jpeg,jpg,png|max:1024',
        ]);

        if ($request->hasFile('featured_image')) {
            $path = "images/post_images/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time().'_'.$filename;

            $upload = Storage::disk('public')->put($path.$new_filename, (string) file_get_contents($file));

            if ($upload) {
                $post = new Post();
                $post->author_id = auth()->id();
                $post->category_id = $request->post_category;
                $post->post_title = $request->post_title;
                $post->post_slug = Str::slug($request->post_title);
                $post->post_content = $request->post_content;
                $post->featured_image = $new_filename;
                $saved = $post->save();

                if ($saved) {
                    return response()->json(['code'=>1, 'msg'=>'New post has been successfully added.']);
                } else {
                    return response()->json(['code'=>3,'msg'=>'Something went wrong saving post data.']);
                }
                
            } else {
                return response()->json(['code'=>3,'msg'=>'Something went wrong for uploading featured image.']);
            }
            
        }
    }
}
