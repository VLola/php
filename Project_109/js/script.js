document.addEventListener('DOMContentLoaded', function (dom){

    document.getElementsByName("bSubmit")[0].onclick = function (e){

        if(CheckQuestions()){
            console.log("ok");
        }
        else{
            e.preventDefault();
            document.getElementById("errorQuestions").style.display = "block";
        }
    }
});