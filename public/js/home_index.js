window.addEventListener('load', function(){
    console.log('..');
    let boutons =  document.querySelectorAll("[id^=hidden_]"),
        etatGen = document.getElementById('etat_general');

    if(etatGen != null)
        etatGen.addEventListener("click",hiddenFunctionGen);
    

    for(let i = 0; i<boutons.length; i++){
        boutons[i].addEventListener("click", hiddenFunction);  
    }
});
    

function hiddenFunction(event){
    let divToShow = event.target,
        divToShowId = (/(\d+)/i.exec(divToShow.id)), 
        div = document.querySelector("[id$=box-"+divToShowId[1]+"]");
        
        div.classList.toggle('hidden');
    
}

function hiddenFunctionGen(){
    let div = document.getElementById('etat_gen_div');

    div.classList.toggle('hidden');
}