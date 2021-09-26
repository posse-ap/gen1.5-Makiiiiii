// 正誤判定
function judge(parts, questions) {
    var click = document.getElementById(`${parts}_${questions}`);
    click_json = click.textContent;
    
    var judgeAns = document.getElementById(`${parts}_1`);
    judgeAns_json = judgeAns.textContent;

    document.getElementById(`${parts}`).classList.add('torfHyouji');

    click.classList.add('red');
    judgeAns.classList.add('blue');

    if (click_json == judgeAns_json){

        document.getElementById(`result${parts}`).appendChild(document.createTextNode('正解！'));
        document.getElementById(`result${parts}`).classList.add('bbb');          
    } else {

        document.getElementById(`${parts}_${questions}`).classList.add('red');
        document.getElementById(`result${parts}`).appendChild(document.createTextNode('不正解！'));
        document.getElementById(`result${parts}`).classList.add('aaa');       
    };
    

    // 2回クリック禁止！
    for (let j = 1; j < 4; j++){
        document.getElementById(`${parts}_${j}`).classList.add('cantclick');
    };
};