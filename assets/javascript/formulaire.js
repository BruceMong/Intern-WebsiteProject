
document.body.style.backgroundImage = "url('assets/images/background-neutral.jpg')";






// document.getElementById("myRadio").disabled = true; 
// faut disable pour le bouton opposé pendant l'anim pour éviter bug 



const btn_femme = document.querySelector(".btn_femme");
const btn_homme = document.querySelector(".btn_homme");
const block_femme = document.querySelector(".forGirl");


btn_femme.addEventListener("click", function() {

    if(btn_femme.checked == true)
    {

        document.body.style.backgroundImage = "url('assets/images/background-girl.jpg')";

        if (block_femme.classList.contains('hidden')) {
            block_femme.classList.remove('hidden');
            setTimeout(function () {
                block_femme.classList.remove('visuallyhidden');
            }, 20);
          }

          
          
        document.querySelector(".heart").style.display = "initial";
        document.querySelector(".heart").style.display = "none";
        
    }




})

btn_homme.addEventListener("click", function() {

    if(btn_homme.checked == true)
    {
        document.body.style.backgroundImage = "url('assets/images/background-boy.jpg')";


            block_femme.classList.add('visuallyhidden');    
            block_femme.addEventListener('transitionend', function(e) {
                block_femme.classList.add('hidden');
            }, {
              capture: false,
              once: true,
              passive: false
            });
          
        

        document.querySelector(".heart").style.display = "none";
    }
})





