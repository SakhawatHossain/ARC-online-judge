function showAddBlogForm() {
    document.getElementById('addBlogModal').style.display = 'block';
}

function hideAddBlogForm() {
    document.getElementById('addBlogModal').style.display = 'none';
}

function addBlog(event) {
    event.preventDefault();
    
    const blogId = document.getElementById('blogId').value;
    const blogPicture = document.getElementById('blogPicture').value;
    const authorHandle = document.getElementById('authorHandle').value;
    const authorId = document.getElementById('authorId').value;
    const blogTitle = document.getElementById('blogTitle').value;
    const blogContent = document.getElementById('blogContent').value.replace(/'/g, "\\'");
    const date = new Date().toLocaleDateString();
    const likes = 0;

    const tableBody = document.getElementById('blogTableBody');
    const row = document.createElement('tr');

    row.innerHTML = `
        <td>${blogId}</td>
        <td><img src="${blogPicture}" alt="Blog Picture"></td>
        <td>${authorHandle}</td>
        <td>${authorId}</td>
        <td>${blogTitle}</td>
        <td>${date}</td>
        <td>${likes}</td>
        <td>
            <button onclick="viewBlog('${blogId}', '${blogPicture}', '${authorHandle}', '${authorId}', '${blogTitle}', '${blogContent}', '${date}', ${likes})">View Blog</button>
            <button onclick="deleteBlog(this)">Delete</button>
        </td>
    `;

    tableBody.appendChild(row);
    hideAddBlogForm();
    document.getElementById('addBlogForm').reset();
}

function deleteBlog(button) {
    const row = button.parentElement.parentElement;
    row.remove();
}

function viewBlog(blogId, blogPicture, authorHandle, authorId, blogTitle, blogContent, date, likes) {
    const blogDetails = `
        <strong>Blog Picture:</strong> <img src="${blogPicture}" alt="Blog Picture"><br>
        <strong>Author's Handle:</strong> ${authorHandle}<br>
        <strong>Blog Title:</strong> ${blogTitle}<br>
        <strong>Blog Content:</strong> ${blogContent}<br>
        <strong>Number of Likes:</strong> ${likes}
    `;
    document.getElementById('viewBlogContent').innerHTML = blogDetails;
    document.getElementById('viewBlogModal').style.display = 'block';
}

function hideViewBlogModal() {
    document.getElementById('viewBlogModal').style.display = 'none';
}
