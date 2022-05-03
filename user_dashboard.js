const promptBg = document.getElementById("prompt");
const AccBtn = document.getElementById("removeacc");
const promptClose = document.getElementById("close");

AccBtn.onclick = function(){
  promptBg.style.display = "block";
}

window.addEventListener("mousedown", ev => {
  if(promptBg.style.display == "block"){
    if(ev.target == promptBg || ev.target == promptClose){
      promptBg.style.display = "none";
    }
  }
})