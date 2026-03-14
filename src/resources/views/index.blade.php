@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="message">
  @if(session('message'))
  <div class="message--success">
    {{ session('message')}}
  </div>
  @endif
  @if($errors->any())
  <div class="message--error">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>    
  </div>
  @endif
</div>

<div class="todo__content">
  <div class="section__title">
    <h2>新規作成</h2>
  </div>
  <form class="create-form" action="/todos" method="post">
    @csrf
    <div class="create-form__item">
      <input type="text" name="content" value="{{ old('content') }}">
      <select class="create-form__item-select" name="category_id">
        @foreach($categories as $category)
        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit">作成</button>
    </div>
  </form>
  <div class="section__title">
    <h2>Todo検索</h2>
  </div>
  <form class="search-form" action="/todos/search" method="get">
    @csrf
    <div class="search-form__item">
      <input type="text" name="keyword" value="{{ old('keyword') }}">
      <select class="search-form__item-select" name="category_id">
        @foreach($categories as $category)
        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="search-form__button">
      <button class="search-form__button-submit">検索</button>
    </div>
  </form>
  <div class="todo-table">
    <table class="todo-table__inner">
      <colgroup>
        <col style="width:40%">
        <col style="width:40%">
        <col style="width:10%">
        <col style="width:10%">
      </colgroup>
      <tr class="todo-table__row">
        <th class="todo-table__header">Todo</th>
        <th class="todo-table__header">カテゴリ</th>
        <th></th>
        <th></th>
      </tr>
      @foreach ($todos as $todo)
      <tr class="todo-table__row">
        <td class="todo-table__item">
          <form class="update-form" action="/todos/update" method="post">
            @method('PATCH')
            @csrf
            <input class="update-form__item-input" type="text" name="content" value="{{ $todo['content']}}">
            <input type="hidden" name="id" value="{{ $todo['id'] }}">
        </td>
        <td class="update-form__item">
          <p class="update-form__item-p">{{ $todo['category']['name']}}</p>
        </td>
        <td class="update-form__button">
          <button class="update-form__button-submit">更新</button>
        </td>
          </form>
        </td>   
        <td class="todo-table__item">
          <form class="delete-form" action="/todos/delete" method="post">
            @method('DELETE')
            @csrf
            <input type="hidden" name="id" value="{{ $todo['id'] }}">
            <div class="delete-form__button">
              <button class="delete-form__button-submit">削除</button>
            </div>
           </form>
        </td>
       </tr> 
       @endforeach
    </table>
  </div>
</div>


@endsection