<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>Watch them 検索結果画面</title>

<div class="header-logo-menu">
    <div id="nav-drawer">
    <input id="nav-input" type="checkbox" class="nav-unshown">
    <label id="nav-open" for="nav-input"><span></span></label>
    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
    <div id="nav-content">
    <ul>
        <li>
        <li><a href="{{ url('diet/index') }}">
            <h3>議員一覧</h3>
        </a></li>
        </ul>
    </div>
    <script>
    $(function() {
        $('#nav-content li a').on('click', function(event) {
        $('#nav-input').prop('checked', false);
        });
    });
    </script>
</div>
</div>@if (!empty($diets))
<div class="test-hover">
    <p>全{{ $diets->count() }}件</p>
        <table class="table table-hover" style=" width:80%;">
            <thead style="background-color: #ffd900;">
            <tr>
                <th style="width:5%">会派</th>
                <th style="width:10%">選挙区</th>
                <th style="width:20%">名前</th>
                <th style="width:5%">年齢</th>
                <th style="width:20%">不祥事数</th>

            </tr>
            </thead>
            @foreach($diets as $diet)
            <tr>
                        <td>{{ $diet->type }}</td>
                        <td>{{ $diet->area }}</td>
                        <td>{{ $diet->name }}</td>
                        <td>{{ $diet->age}}</td>
                        <td>{{ $diet->scandal }}</td>
                        <td>
                            <div class="button"><a href="{{ route('diet_each',['id'=>$diet->id]) }}">表示</a></div>
                        </td>
                        @endforeach
                    </tr>
        </table>
</div>
<!--テーブルここまで-->
<!--ページネーション-->
<!--  -->
<!--ページネーションここまで-->
@endif
