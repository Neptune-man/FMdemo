@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
          @if(count($errors) > 0)
               <div class="alert alert-danger">
                   <ul>
                       @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
          <form class="form-horizontal" method="POST" action="{{ url('login') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('社員番号') ? ' has-error' : '' }}">
              <label for="社員番号" class="col-md-4 control-label">社員番号</label>
              <div class="col-md-6">
                <input id="社員番号" type="text" class="form-control" name="社員番号" value="{{ old('社員番号') }}" autofocus>
                @if ($errors->has('社員番号'))
                <span class="help-block">
                  <strong>{{ $errors->first('社員番号') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('パスワード') ? ' has-error' : '' }}">
              <label for="パスワード" class="col-md-4 control-label">パスワード</label>

              <div class="col-md-6">
                <input id="パスワード" type="password" class="form-control" name="パスワード">

                @if ($errors->has('パスワード'))
                <span class="help-block">
                  <strong>{{ $errors->first('パスワード') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Login
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
