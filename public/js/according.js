$(function () {
    //アコーディオンをクリックした時の動作
    $('.title').on('click', function () {
        var findElm = $(this).next(".box"); //直後のアコーディオンを取得
        $(findElm).slideToggle(); //スライドで表示/非表示を切り替え

        if ($(this).hasClass('close')) {
            $(this).removeClass('close');
        } else {
            $(this).addClass('close');
        }
    });
});
