// 選択肢
const sentakushi = [["たかなわ", "こうわ", "たかわ"],
["かめいど", "かめと", "かめど"],
["こうじまち", "かゆまち", "おかとまち"],
["おなりもん","おかどもん","ごせいもん"],
["とどろき", "たたら", "たたろき"],
["しゃくじい", "せきこうい", "いじい"],
["ぞうしき", "ざっしき", "ざっしょく"],
["おかちまち", "みとちょう", "ごしろちょう"],
["ししぼね", "ろっこつ", "しこね"],
["こぐれ", "こばく", "こしゃく"]];


// 正解の配列
const answer = ["たかなわ", "かめいど", "こうじまち", "おなりもん", "とどろき", "しゃくじい", "ぞうしき", "おかちまち", "ししぼね", "こぐれ"];


// 選択肢シャッフル
for (let q = 0; q < 10; q++){
    var one = sentakushi[q];
    
    for (let p = 0; p < 10; p++){
        const shuffle = (one) => {
            for (let i = one.length - 1; i >= 0; i--){
                const j = Math.floor(Math.random() * (i + 1));
                [one[i], one[j]] = [one[j], one[i]];
            }
            return one;
        }
        
        shuffle(one);
    };
};

// 正解のID配列
var arr = []; 

// それぞれの問題表示
for (let i = 0; i < 10; i++){
    
    let x = 
    '<div class="quiz">' +
    `<h3><span class="chimei">${i + 1}.この地名はなんて読む？</span></h3>` +
    `<img src="./image/${i}.png">` +
    '<ul>';
    
    for (let j = 0; j < 3; j++){

        x += `<li class="list" id="${i}_${j}" onclick="judge(${i},${j})">${sentakushi[i][j]}</li>`;
        
        // 正解の選択肢把握
        var answer1 = answer[i];
        var answer_json = JSON.stringify(answer1);
        var blueS = sentakushi[i][j];
        var blueS_json = JSON.stringify(blueS);

        if(blueS_json == answer_json){

            arr.push(`${i}_${j}`);
        };
    };
        
    x +=
    '</ul>' +
    `<div class="torf" id="torf${i}">` +
    `<p id="result${i}"></p>`;

    if ( i === 8 ){
        x += `<p id="resultText${i}">江戸川区にあります。</p>`
    } else {
        x += `<p id="resultText${i}">正解は「` + answer[i] + '」です！</p>'
    };

    x +=
    '</div>' +
    '</div>';
        
    document.write(x);
};
    
console.log(arr);
    

// 正誤判定
function judge(parts, questions) {
    var click = sentakushi[parts][questions];
    var click_json =JSON.stringify(click);
    console.log(click_json);
    
    var judgeAns = answer[parts];
    var judgeAns_json = JSON.stringify(judgeAns);
    console.log(judgeAns_json);
    
    document.getElementById(`torf${parts}`).classList.add('torfHyouji');
    
    var blueIDName = arr[parts];
    var blueID = document.getElementById(`${blueIDName}`);
    blueID.classList.add('blue');

    if (click_json == judgeAns_json){

        console.log("一致");
        document.getElementById(`result${parts}`).appendChild(document.createTextNode('正解！'));
        document.getElementById(`result${parts}`).classList.add('bbb');          
    } else {

        console.log("不一致");
        document.getElementById(`${parts}_${questions}`).classList.add('red');
        document.getElementById(`result${parts}`).appendChild(document.createTextNode('不正解！'));
        document.getElementById(`result${parts}`).classList.add('aaa');       
    };
    

    // 2回クリック禁止！
    for (let j = 0; j < 3; j++){
    document.getElementById(`${parts}_${j}`).classList.add('cantclick');
    };
                
    // スクロール
    function scrollToAns(){
        var rect = blueID.getBoundingClientRect();
        var position = rect.top;
        scrollBy(0, position);
    };
    scrollToAns();
};