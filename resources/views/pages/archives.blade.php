@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @if (Session::has('message'))
           <div class="alert alert-success" id="save">
               {{ session('message') }}
           </div>
          @endif
          
            <div class="panel panel-primary">
                <div class="panel-heading">勤怠データリスト</div>
                <div class="panel-body">
                  {!! Form::open() !!}
                  <div style="display:inline-flex">
                      <select class="form-control" id="year" name="year" style="width:100px">
                        @for($i=date("Y");$i!=2014;$i--)
                          <option value={{$i}} <?php if ($current["Y"]==$i){echo "selected";} ?>>{{$i}}年</option>
                        @endfor
                      </select>
                      <select class="form-control" id="month" name="month">
                        @for($i=12;$i!=0;$i--)
                          <option value={{str_pad($i, 2, 0, STR_PAD_LEFT)}} <?php if ($current["m"]==$i){echo "selected";} ?>>{{$i}}月</option>
                        @endfor
                      </select>
                      <button type="submit" class="btn btn-seccess">移動</button>
                  </div>
                  {!! Form::close() !!}
                  @if(!empty($articles))
                  <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>日付</th>
                        <th>曜日</th>
                        <th>出勤</th>
                        <th>退勤</th>
                        <th>ユーザー</th>
                        <th>Detail</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($articles as $article)
                      <tr>
                          <th>{{$article->RecId}}</th>
                          <th>{{$article->日付}}</th>
                          <th>{{$article->曜日}}</th>
                          <th>{{$article->出勤}}</th>
                          <th>{{$article->退勤}}</th>
                          <th>{{$article->ユーザーid}}</th>
                          <th><a href="{{url('archives/'.$article->RecId)}}" class="btn btn-primary">詳細</a></th>
                          <th><a href="{{url('archives/'.$article->RecId."/edit")}}" class="btn btn-success">編集</a></th>
                          <th><a href="{{url('archives/'.$article->RecId."/delete")}}" class="btn btn-danger delete">削除</a></th>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                    <h2>データがありません</h2>
                  @endif
              </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function(){
	//id="save"の要素を3秒（3000ミリ秒）でゆっくりと非表示にする
	$('#save').fadeOut(3000);
});
$(function(){
  $(".delete").on('click', function(){
      if(window.confirm("消します。")) {
          location.href = $(this).attr('href');
      } else {
          return false;
      }
  });
});
</script>
@endsection
