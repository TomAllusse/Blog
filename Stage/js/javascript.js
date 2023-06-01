const allLines = document.querySelectorAll(".burger")
const menu = document.querySelector(".options-container")
const toutDoc = document.querySelector(".tout-contenu")

allLines.forEach(line => {
    line.addEventListener('click', e => {
        e.target.classList.toggle("active");
        menu.classList.toggle("active")
        if (menu.classList.contains('active')) {
            toutDoc.style.display = "none";
        } 
        else {
            toutDoc.style.display = "block";
        }
    })
})