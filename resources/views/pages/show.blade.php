@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">勤怠データ</div>
                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>日付</th>
                        <th>区分</th>
                        <th>ユーザー</th>
                        <th>出勤</th>
                        <th>退勤</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>{{$article->RecId}}</th>
                        <th>{{$article->日付}}</th>
                        <th>{{$article->区分}}</th>
                        <th>{{$article->ユーザーid}}</th>
                        <th>{{$article->出勤}}</th>
                        <th>{{$article->退勤}}</th>
                      </tr>
                    </tbody>
                  </table>
                  <a href="{{url('archives')}}" class="btn btn-primary">List</a>
                  <a href="{{url('archives/'.$article->RecId.'/edit')}}" class="btn btn-success">Edit</a>
                  <a href="{{url('archives/'.$article->RecId.'/delete')}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
