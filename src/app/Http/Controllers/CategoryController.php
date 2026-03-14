<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth; //追加

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::where('user_id', Auth::id())->get();
        return view('category', compact('categories'));
    }

    public function store(CategoryRequest $request){
        Auth::user()->categories()->create([
            'name' => $request->name,
        ]);
  
        return redirect('/categories')->with('message', 'カテゴリを作成しました');
    }

    public function update(CategoryRequest $request){
        Category::where('id', $request->id)
        ->where('user_id', Auth::id())
        ->update([
            'name' => $request->name
        ]);

        return redirect('/categories')->with('message','カテゴリを更新しました');
    }
    
    public function destroy(Request $request){
        Category::where('id', $request->id)
        ->where('user_id', Auth::id())
        ->delete();

        return redirect('/categories')->with('message','カテゴリを削除しました');
    
        
    }

}
