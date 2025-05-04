const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})













let currentRow;

function openEditForm(button) {
    currentRow = button.parentElement.parentElement;
    const cells = currentRow.children;
    document.getElementById('user_id').value = cells[0].innerText;
    document.getElementById('photo').value = cells[1].querySelector('img').src;
    document.getElementById('name').value = cells[2].innerText;
    document.getElementById('university').value = cells[3].innerText;
    document.getElementById('email').value = cells[4].innerText;
    document.getElementById('rating').value = cells[5].innerText;

    document.getElementById('editFormPopup').style.display = 'flex';
}

function closeEditForm() {
    document.getElementById('editFormPopup').style.display = 'none';
}

function saveEdit() {
    const cells = currentRow.children;
    cells[0].innerText = document.getElementById('user_id').value;
    cells[1].querySelector('img').src = document.getElementById('photo').value;
    cells[2].innerText = document.getElementById('name').value;
    cells[3].innerText = document.getElementById('university').value;
    cells[4].innerText = document.getElementById('email').value;
    cells[5].innerText = document.getElementById('rating').value;

    closeEditForm();
}

function deleteUser(button) {
    const row = button.parentElement.parentElement;
    row.remove();
}

function toggleBlock(checkbox) {
    const row = checkbox.parentElement.parentElement.parentElement;
    row.classList.toggle('blocked', checkbox.checked);
}
