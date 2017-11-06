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
              <div class="panel-heading">ユーザーデータリスト</div>
                <div class="panel-body">
                  <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>アカウント</th>
                        <th>氏名</th>
                        <th>権限</th>
                        <th>削除フラグ</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                          <th>{{$user->RecId}}</th>
                          <th>{{$user->アカウント}}</th>
                          <th>{{$user->氏名}}</th>
                          <th>{{$user->権限}}</th>
                          <th><input type="checkbox" data-toggle="toggle" data-onstyle="danger" onchange="del({{$user->RecId}})" <?php if($user->フラグ_削除!=""){echo "checked";} ?>></th>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
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

function del(id){
  $.get("{{url("api/deluser")}}/"+id, function(data){
    data = JSON.parse(data);
      alert(data.current);
  });
}
</script>
@endsection
