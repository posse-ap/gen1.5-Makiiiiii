// チェックボックスの背景色
function check(contentID) {

    var contentID = document.getElementById(contentID);
    if (contentID.checked == true) {
        contentID.parentNode.style.backgroundColor = '#e7f5ff';
        } else {
        contentID.parentNode.style.backgroundColor = '#F5F5F8';
        }
};

// awesome画面遷移
let timer = null;
let modalReplace = document.getElementById('modalReplace');
let loader = document.getElementById('loader');
let awesome = document.getElementById('awesome');

function gotoAwesome() {
    let twitterCheck = document.getElementById('twitterCheck');
    if (twitterCheck.checked) {
        tweet();
    }

    modalReplace.style.display="none";
    loader.style.display="block";

    timer = setTimeout(countUp, 1000);

}

function countUp() {
    loader.style.display="none";
    awesome.style.display="block";
} 

// モーダルを閉じた時
$('#recordRegistrationModalCenter').on('hidden.bs.modal', function () {
    modalReplace.style.display="flex";
    loader.style.display="none";
    awesome.style.display="none";
})

// ツイート関数
function tweet() {
    const comment = document.getElementById("comment").value;
    window.open("https://twitter.com/intent/tweet?text=" + comment, '_blank');
}