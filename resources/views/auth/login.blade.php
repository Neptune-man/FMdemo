@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('アカウント') ? ' has-error' : '' }}">
                            <label for="アカウント" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="アカウント" type="text" class="form-control" name="アカウント" value="{{ old('アカウント') }}" required autofocus>

                                @if ($errors->has('アカウント'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('アカウント') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('パスワード') ? ' has-error' : '' }}">
                            <label for="パスワード" class="col-md-4 control-label">パスワード</label>

                            <div class="col-md-6">
                                <input id="パスワード" type="password" class="form-control" name="パスワード" required>

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
