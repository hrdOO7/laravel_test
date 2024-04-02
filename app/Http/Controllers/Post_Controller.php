<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\comment;
use Illuminate\Http\Request;

class Post_Controller extends Controller
{
    public function post()
    {
      $data = post::get();
      return view('post',['data'=>$data]);
    }

    public function add_post(Request $req)
    {
      $Title = $req['Title'];
      $content = $req['content'];
      $data = new post();
      $data->title = $Title;
      $data->content = $content;
      $data->save();
      return redirect('/post');
    }


    public function edit_post(Request $req)
    {
      $title = $req['Title'];
      $content = $req['content'];


      $updatedata = post::where('id',$req['id'])->update(['title'=>$title,'content'=>$content]);

      return redirect('/post');
    }

    public function delete_post(Request $req)
    {
      $id = $req['id'];
      $updatedata = post::where('id',$id)->delete();

      return redirect('/post');
    }

    public function post_api()
    {
      $data = post::get();

        $this->outputData['post'] = $data;
          return response()->json($this->outputData);

    }

    public function add_post_api(Request $req)
    {
      $Title = $req['Title'];
      $content = $req['content'];

      $data = new post();
      $data->title = $Title;
      $data->content = $content;
      $data->save();

            $this->outputData['message'] = 'Post Added Successfully';
              return response()->json($this->outputData);

    }

    public function add_comment_api(Request $req)
    {
      $name = $req['post_title'];
      $name = $req['name'];
      $content = $req['content'];

      $post = post::where('title',$name)->first();


      $data = new comment();
      $data->post_id = $post['id'];
      $data->name = $name;
      $data->content = $content;
      $data->save();

            $this->outputData['message'] = 'Comment Added Successfully';
              return response()->json($this->outputData);

    }


    public function edit_post_api(Request $req)
    {
      $title = $req['Title'];
      $content = $req['content'];


      $updatedata = post::where('id',$req['id'])->update(['title'=>$title,'content'=>$content]);

      $this->outputData['message'] = 'Post Updated';
        return response()->json($this->outputData);


    }

    public function delete_post_api(Request $req)
    {
      $id = $req['id'];
      $updatedata = post::where('id',$id)->delete();
      $this->outputData['message'] = 'Post Deleted ';
      return response()->json($this->outputData);

    }









}
