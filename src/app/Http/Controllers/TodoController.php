<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth; //追加

class TodoController extends Controller
{
    public function index (){
        $todos = Todo::where('user_id', Auth::id())->get(); //ログインユーザー（Auth::id）のtodoを取得
        return view('index',compact('todos'));
    }
    
    public function store(TodoRequest $request){
        Auth::user()->todos()->create([ //ログインユーザー（Auth::id）に紐づくtodosテーブルに登録
            'content' => $request->content,
        ]);

        return redirect('/')->with('message','todoを登録しました');
    }

    public function update(TodoRequest $request){
        Todo::where('id', $request->id) //todo idが一致
            ->where('user_id', Auth::id()) //さらにuser_idが一致する場合
            ->update([                      //contentを更新
                'content' => $request->content
            ]);

        return redirect('/')->with('message','todoを更新しました');
    }

    public function destroy(Request $request){
        Todo::where('id', $request->id) //todo idが一致
            ->where('user_id', Auth::id()) //さらにuser_idが一致する場合
            ->delete();                     //削除

        return redirect('/')->with('message','todoを削除しました');
    }
}
