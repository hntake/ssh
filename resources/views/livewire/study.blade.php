<div id="text1">
    <meta charset="utf8">
    @foreach($words as $word)
        <button wire:click="translate({{ $word->id }})">日本語で</button>
        <p>
            {{$word->ja1}}
        @endforeach
        </p>
</div>
