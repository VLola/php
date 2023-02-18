function CheckQuestion(number){
    let check = false;
    document.getElementsByName(`Quest_${number}`).forEach((it)=>{
        if(it.checked) check = true;
    });
    return check;
}
function CheckQuestions(){
    let check = true;
    for (let i = 1; i < 11; i++){
        if(!CheckQuestion(i)) check = false;
    }
    return check;
}
