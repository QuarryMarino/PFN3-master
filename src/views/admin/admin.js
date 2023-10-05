const settingsbar = document.querySelector("#settingsbar");
const settings = document.querySelector("#settings");
const btnNewUser = document.querySelector("#btnNewUser");
const newuser = document.querySelector("#newuser");
const exit = document.querySelectorAll('.exit')


settings.addEventListener("click", () => {
  settingsbar.classList.toggle("hidden");
});

if(newuser){
btnNewUser.addEventListener("click", () => {
  newuser.classList.toggle("hidden");
});

exit.forEach((e)=>{

    e.addEventListener('click',()=>{

        newuser.classList.toggle("hidden");

    })

})}