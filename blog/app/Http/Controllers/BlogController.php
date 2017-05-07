<?php
/**
 * Created by PhpStorm.
 * User: zfy
 * Date: 2017/4/16
 * Time: 9:23
 */
namespace App\Http\controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class BlogController extends Controller
{
    public function main()
    {
        return view('Blog.BlogMain');
    }

    public function admin()
    {
        return view('Blog.admin');
    }

    public function admin_users()
    {
        $users=DB::table('users')->where('id','>','0')->paginate(10);
        return view('Blog.admin_users',[
            'users'=>$users
            ]);
    }

    public function admin_createAdmin_view()
    {
            return view('Blog.admin_createAdmin');

    }

    public function admin_createAdmin(Request $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');
        $updated_at=date('y-m-d h:i:s',time());
        $created_at=date('y-m-d h:i:s',time());

        DB::table('users')->insert([
           'name'=>$name,
           'email'=>$email,
            'password'=>bcrypt($password),
            'updated_at'=>$updated_at,
            'created_at'=>$created_at,
            'admin'=>1
        ]);

        return redirect()->action('BlogController@admin');
    }

    public function admin_blogs()
    {
        $blogs=DB::table('blog')->orderBy('updated_at','desc')->paginate(10);
        return view('Blog.admin_blogs',[
            'blogs'=>$blogs
        ]);
    }

    public function admin_comments()
    {
        if(Auth::user()['id']=='0'){
        $comments=DB::table('comment')->paginate(10);
        return view('Blog.admin_comments',[
            'comments'=>$comments
        ]);}
        else{
            return redirect()->action('BlogController@main');
        }
    }

    public function scan_view()
    {
        $blog=DB::table('blog')
            ->orderBy('updated_at','desc')
            ->paginate(10);
        return view('Blog.scan_view',[
            'blog'=>$blog
        ]);
    }
//
//    public function content_view($unique_id)
//    {
//        $blog=DB::table('blog')
//            ->where('unique_id',$unique_id)
//            ->get();
//        return view('content_view',[
//           'blog'=>$blog
//        ]);
//    }

    public function create_view()
    {
        if(Auth::check()) {
            return view('Blog.create_view');
        }
        else{
            return view('auth.login');
        }
    }

    public function manage_view()
    {
        if (Auth::check()) {
            $id=Auth::user()['id'];
            $blog=DB::table('blog')
                ->where('id',$id)
                ->paginate(5);
            return view('Blog.manage_view',[
                'blog'=>$blog
            ]);
        }
        else
        {
            return view('auth.login');
        }
    }
    public function create(Request $request)
    {
        $title=$request->input('title');
        $content=$request->input('content');
        $id=Auth::id();
        $author=Auth::user()['name'];
        $time=time();
        $updated_at= date("y-m-d h:i:s",$time);
        $created_at= date("y-m-d h:i:s",$time);
        DB::table('blog')
            ->insert([
                'title'=>$title,
                'content'=>$content,
                'id'=>$id,
                'author'=>$author,
                'updated_at'=>$updated_at,
                'created_at'=>$created_at
            ]);
        return redirect()->action('BlogController@scan_view');
    }

    public function update_view(Request $request)
    {
        $unique_id=$request->input('unique_id');
        $id=$request->input('id');
        if(Auth::user()['id']==$id) {
            $blog = DB::table('blog')
                ->where('unique_id', $unique_id)
                ->get();
            return view('Blog.update_view', [
                'blog' => $blog
            ]);
        }
        else
        {
            return view('scan_view');
        }

    }

    public function update(Request $request)
    {
        $ori_title=$request->input('title');
        $title=htmlspecialchars($ori_title);
        $ori_content=$request->input('content');
        $content=htmlspecialchars($ori_content);
        $unique_id=session('key');
        $updated_at=date('y-m-d h:i:s',time());
        DB::table('blog')
            ->where('unique_id',$unique_id)
            ->update([
              'title'=>$title,
                'content'=>$content,
                'updated_at'=>$updated_at
            ]);
        return redirect()->action('BlogController@manage_view');
    }

    public function delete(Request $request)
    {
        $unique_id = $request->input('unique_id');
        $id = $request->input('id');
        if (Auth::user()['id'] == $id) {
            DB::table('blog')->where('unique_id', $unique_id)->delete();
            DB::table('comment')->where('u_id', $unique_id)->delete();
            return redirect()->action('BlogController@manage_view');
        }
        else
        {
            return redirect()->action('BlogController@main');
        }
    }
    public function delete_users($id)
    {
        DB::table('users')->where('id',$id)->delete();
        DB::table('blog')->where('id',$id)->delete();
        DB::table('comment')->where('cr_id',$id)->delete();
        return redirect()->action('BlogController@admin_users');
    }

    public function delete_blogs($unique_id)
    {
        DB::table('blog')->where('unique_id',$unique_id)->delete();
        DB::table('comment')->where('u_id',$unique_id)->delete();
        return redirect()->action('BlogController@admin_blogs');
    }

    public function delete_comments($id)
    {
        DB::table('comment')->where('id',$id)->delete();
        return redirect()->action('BlogController@admin_comments');
    }

    public function blog_content($unique_id)
    {
        $blog=DB::table('blog')->orderBy('updated_at','desc')
            ->where('unique_id',$unique_id)
            ->get();
        $comment=DB::table('comment')
            ->where('u_id',$unique_id)
            ->orderBy('created_at','desc')
            ->paginate(5);
        return view('Blog.blog_content',[
            'blog'=>$blog,
            'comment'=>$comment
        ]);
    }

    public function comment(Request $request)
    {
        if(Auth::check()) {
            $ori_content = $request->input('content');
            $content=htmlspecialchars($ori_content);
            $cr_name = auth::user()['name'];
            $cr_id = auth::user()['id'];
            $u_id = $request->input('u_id');
            $created_at = date('y-m-d H:i:s');
            DB::table('comment')
                ->insert([
                    'content' => $content,
                    'cr_name' => $cr_name,
                    'cr_id' => $cr_id,
                    'u_id' => $u_id,
                    'created_at' => $created_at
                ]);
            return redirect()->action('BlogController@blog_content', $u_id);
        }
        else
        {
            return view('auth.login');
        }
    }

    public function delete_comment(Request $request)
    {
     $unique_id=$request->input('unique_id');
      $id=$request->input('id');
    $cr_id=$request->input('cr_id');

        if (Auth::user()['id'] == $cr_id) {
            DB::table('comment')->where('id', $id)->delete();
            return redirect()->action('BlogController@blog_content', $unique_id);
        }
        else
        {
            return view('auth.home');
        }
    }

}
