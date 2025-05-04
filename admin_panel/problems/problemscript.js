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

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('addProblemBtn').addEventListener('click', showAddProblemForm);

    const updateForm = document.getElementById('editProblemForm');
    updateForm.addEventListener('submit', updateProblem);
});

function showAddProblemForm() {
    document.getElementById('addProblemModal').style.display = 'block';
}

function hideAddProblemForm() {
    document.getElementById('addProblemModal').style.display = 'none';
}

function addProblem(event) {
    event.preventDefault();
    
    const form = document.getElementById('addProblemForm');
    const formData = new FormData(form);

    fetch('problems.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        if (data.includes("New problem added successfully")) {
            alert("Problem added successfully!");
        } else {
            alert("Error adding problem: " + data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred while adding the problem.");
    });
}

function deleteProblem(button) {
    const row = button.parentElement.parentElement;
    row.remove();
}

function openEditForm(button) {
    const row = button.parentElement.parentElement;
    const problemId = row.cells[0].innerText;
    const title = row.cells[1].innerText;
    const description = row.cells[2].innerText;
    const input = row.cells[3].innerText;
    const output = row.cells[4].innerText;
    const example = row.cells[5].innerText;
    const testInput = row.cells[6].innerText;
    const testOutput = row.cells[7].innerText;
    const difficulty = row.cells[8].innerText;
    const editorial = row.cells[9].innerText;

    document.getElementById('editProblemId').value = problemId;
    document.getElementById('editTitle').value = title;
    document.getElementById('editDescription').value = description;
    document.getElementById('editInput').value = input;
    document.getElementById('editOutput').value = output;
    document.getElementById('editExample').value = example;
    document.getElementById('editTestInput').value = testInput;
    document.getElementById('editTestOutput').value = testOutput;
    document.getElementById('editDifficulty').value = difficulty;
    document.getElementById('editEditorial').value = editorial;

    document.getElementById('editProblemModal').style.display = 'block';
}

function updateProblem(event) {
    event.preventDefault();

    const form = document.getElementById('editProblemForm');
    const formData = new FormData(form);

    fetch('problems.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Log the response from the server
        if (data.includes("Record updated successfully")) {
            alert("Problem updated successfully!");
            document.getElementById('editProblemModal').style.display = 'none';
        } else {
            alert("Error updating problem: " + data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred while updating the problem.");
    });
}

function hideEditProblemModal() {
    document.getElementById('editProblemModal').style.display = 'none';
}




function hideViewBlogModal() {
    document.getElementById('viewBlogModal').style.display = 'none';
}

function openEditForm(button) {
    // Get the data from the row
    const row = button.parentElement.parentElement;
    const problemId = row.cells[0].innerText;
    const title = row.cells[1].innerText;
    const description = row.cells[2].innerText;
    const input = row.cells[3].innerText;
    const output = row.cells[4].innerText;
    const example = row.cells[5].innerText;
    const testInput = row.cells[6].innerText;
    const testOutput = row.cells[7].innerText;
    const difficulty = row.cells[8].innerText;
    const editorial = row.cells[9].innerText;

    // Populate the modal fields
    document.getElementById('editProblemId').value = problemId;
    document.getElementById('editTitle').value = title;
    document.getElementById('editDescription').value = description;
    document.getElementById('editInput').value = input;
    document.getElementById('editOutput').value = output;
    document.getElementById('editExample').value = example;
    document.getElementById('editTestInput').value = testInput;
    document.getElementById('editTestOutput').value = testOutput;
    document.getElementById('editDifficulty').value = difficulty;
    document.getElementById('editEditorial').value = editorial;

    // Show the modal
    document.getElementById('editProblemModal').style.display = 'block';
}

function updateProblem(event) {
    event.preventDefault();

    const form = document.getElementById('editProblemForm');
    const formData = new FormData(form);

    fetch('problems.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Log the response from the server
        if (data.includes("Record updated successfully")) {
            alert("Problem updated successfully!");
            document.getElementById('editProblemModal').style.display = 'none';
        } else {
            alert("Error updating problem: " + data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred while updating the problem.");
    });
}


function hideEditProblemModal() {
    document.getElementById('editProblemModal').style.display = 'none';
}
