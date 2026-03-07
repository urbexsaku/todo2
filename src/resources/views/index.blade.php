@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="message">
  <div class="message--success">
    テスト
  </div>
  <div class="message--error">
    テスト
  </div>
</div>

<div class="todo__content">
  <form class="create-form">
    <div class="create-form__item">
      <input type="text" name="content" value="">
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit">作成</submit>
    </div>
  </form>
  <div class="todo-table">
    <table class="todo-table__inner">
      <tr class="todo-table__row">
        <th class="todo-table__header">Todo</th>
      </tr>
      <tr class="todo-table__row">
        <td class="todo-table__item">
          <form class="update-form">
            <div class="update-form__item">
              test
            </div>
            <div class="update-form__button">
              <button class="update-form__button-submit">更新</td>
            </div>
          </form>
        </td>   
        <td class="todo-table__item">
          <form class="delete-form">
            <div class="delete-form__button">
              <button class="delete-form__button-submit">削除</td>
            </div>
           </form>
        </td>
      </tr> 
    </table>
  </div>
</div>


@endsection