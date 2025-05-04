const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle"),
      sidebar = body.querySelector("nav"),
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode === "dark"){
    body.classList.add("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus === "close"){
    sidebar.classList.add("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    } else {
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    } else {
        localStorage.setItem("status", "open");
    }
});

function showAddBlogForm() {
    document.getElementById('addBlogModal').style.display = 'block';
}

function hideAddBlogForm() {
    document.getElementById('addBlogModal').style.display = 'none';
}

function addBlog(event) {
    event.preventDefault();

    const form = document.getElementById('addBlogForm');
    const formData = new FormData(form);

    fetch('blog.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Log the response from the server
        if (data.includes("New blog added successfully")) {
            alert("Blog added successfully!");
            const blogPicture = document.getElementById('blogPicture').value;
            const blogTitle = document.getElementById('blogTitle').value;
            const blogContent = document.getElementById('blogContent').value.replace(/'/g, "\\'");

            const tableBody = document.getElementById('blogsTableBody');
            const row = document.createElement('tr');

            // Assuming the new blogId is in ascending order, fetch the last row's ID or from server response
            const newBlogId = tableBody.rows.length + 1;

            row.innerHTML = `
                <td>${newBlogId}</td>
                <td><img src="${blogPicture}" alt="Blog Picture"></td>
                <td>${blogTitle}</td>
                <td>${blogContent}</td>
                <td>
                    <button onclick="viewBlog('${newBlogId}', '${blogPicture}', '${blogTitle}', '${blogContent}')">View Blog</button>
                    <button onclick="deleteBlog(this)">Delete</button>
                </td>
            `;

            tableBody.appendChild(row);
            hideAddBlogForm();
            form.reset();
        } else {
            alert("Error adding blog: " + data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred while adding the blog.");
    });
}

function deleteBlog(button) {
    const row = button.parentElement.parentElement;
    row.remove();
}

function viewBlog(blogId, blogPicture, authorHandle, authorId, blogTitle, blogContent) {
    const blogDetails = `
        <strong>Blog Picture:</strong> <img src="${blogPicture}" alt="Blog Picture"><br>
        <strong>Author's Handle:</strong> ${authorHandle}<br>
        <strong>Blog Title:</strong> ${blogTitle}<br>
        <strong>Blog Content:</strong> ${blogContent}<br>
    `;
    document.getElementById('viewBlogContent').innerHTML = blogDetails;
    document.getElementById('viewBlogModal').style.display = 'block';
}

function hideViewBlogModal() {
    document.getElementById('viewBlogModal').style.display = 'none';
}
