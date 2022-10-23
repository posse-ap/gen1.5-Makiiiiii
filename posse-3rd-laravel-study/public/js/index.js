// チェックボックスの背景色
function check(contentID) {

    var contentID = document.getElementById(contentID);
    if (contentID.checked == true) {
        contentID.parentNode.style.backgroundColor = '#e7f5ff';
        } else {
        contentID.parentNode.style.backgroundColor = '#F5F5F8';
        }
};

// モーダルを閉じた時
$('#recordRegistrationModalCenter').on('hidden.bs.modal', function () {
    var $modalReplace = $("#modalReplace");
    var $loader = $("#loader");
    var $awesome = $("#awesome");
    var $error = $("#error");

    $modalReplace.css("display", "flex");
    $loader.css("display", "none");
    $awesome.css("display", "none");
    $error.css("display", "none");
})

// ツイート関数
function tweet() {
    const comment = document.getElementById("comment").value;
    window.open("https://twitter.com/intent/tweet?text=" + comment, '_blank');
}