const settings = document.querySelector("#settings");
const settingsbar = document.querySelector("#settingsbar");

settings.addEventListener("click", () => {
    settingsbar.classList.toggle("hidden");
  });