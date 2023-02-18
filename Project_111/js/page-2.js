function CheckQuestion(number){
    let check = false;
    for (let j = 1; j < 5; j++){
        document.getElementsByName(`Quest_${number}_${j}`).forEach((it)=>{
            if(it.checked) check = true;
        });
    }
    return check;
}
function CheckQuestions(){
    let check = true;
    for (let i = 1; i < 11; i++){
        if(!CheckQuestion(i)) check = false;
    }
    return check;
}
