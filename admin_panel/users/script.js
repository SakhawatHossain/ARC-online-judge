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
    const userId = document.getElementById('user_id').value;
    const image = document.getElementById('photo').value;
    const name = document.getElementById('name').value;
    const university = document.getElementById('university').value;
    const email = document.getElementById('email').value;
    const rating = document.getElementById('rating').value;

    console.log(`Sending data to server: userId=${userId}, image=${image}, name=${name}, university=${university}, email=${email}, rating=${rating}`);

    fetch('update_user.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `user_id=${userId}&photo=${image}&name=${name}&university=${university}&email=${email}&rating=${rating}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the row in the table
            const cells = currentRow.children;
            cells[0].innerText = userId;
            cells[1].querySelector('img').src = image;
            cells[2].innerText = name;
            cells[3].innerText = university;
            cells[4].innerText = email;
            cells[5].innerText = rating;

            closeEditForm();
        } else {
            alert('Failed to update user data');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred');
    });
}




function deleteUser(button) {
    const row = button.parentElement.parentElement;
    const userId = row.children[0].innerText;  // Get the user_id from the first column

    // Confirm before deleting
    if (confirm("Are you sure you want to delete this user?")) {
        // Make an AJAX request to delete the user
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_user.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                const response = JSON.parse(xhr.responseText);

                if (response.success) {
                    alert("User deleted successfully");
                    row.remove();  // Remove the row from the table if the deletion is successful
                } else {
                    alert("Failed to delete the user");
                }
            }
        };

        // Send the user_id to the PHP file for deletion
        xhr.send("user_id=" + userId);
    }
}


function toggleBlock(checkbox) {
    const row = checkbox.parentElement.parentElement.parentElement;
    row.classList.toggle('blocked', checkbox.checked);
}
