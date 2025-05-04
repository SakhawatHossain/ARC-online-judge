document.addEventListener("DOMContentLoaded", () => {
    const addVideoPopup = document.getElementById("addVideoPopup");
    const videoTable = document.getElementById("videoTable").querySelector("tbody");
    const addVideoButton = document.getElementById("addVideoButton");
    const saveVideoButton = document.getElementById("saveVideoButton");
    const updateVideoButton = document.getElementById("updateVideoButton");

    let videos = [];
    let currentEditingRow = null;  // Track the row being edited

    // Show the Add Video Popup
    addVideoButton.addEventListener("click", () => {
        showPopup(addVideoPopup);
        clearVideoForm();  // Clear form when opening the popup
        saveVideoButton.style.display = "block";  // Show Save button
        updateVideoButton.style.display = "none";  // Hide Update button
        currentEditingRow = null;  // Reset editing state
    });

    // Save button click handler (for adding a new video)
    saveVideoButton.addEventListener("click", () => {
        const title = document.getElementById("videoTitle").value;
        const description = document.getElementById("videoDescription").value;
        const link = document.getElementById("videoLink").value;
        const liveAt = document.getElementById("videoLiveAt").value;
        const imageInput = document.getElementById("videoImage");

        const image = imageInput.files.length > 0 ? imageInput.files[0].name : ''; // Get the image file name

        if (title && description && link && liveAt && image) {
            const videoId = Date.now().toString(); // Generate a unique ID for the new video
            const video = { id: videoId, title, description, link, liveAt, image };
            videos.push(video);  // Store the new video

            addVideoToTable(video);  // Add video to the table

            clearVideoForm();
            hidePopup(addVideoPopup);
        } else {
            alert("Please fill in all fields.");
        }
    });

    // Update button click handler (for editing a video)
    updateVideoButton.addEventListener("click", () => {
        const title = document.getElementById("videoTitle").value;
        const description = document.getElementById("videoDescription").value;
        const link = document.getElementById("videoLink").value;
        const liveAt = document.getElementById("videoLiveAt").value;
        const imageInput = document.getElementById("videoImage");

        const image = imageInput.files.length > 0 ? imageInput.files[0].name : ''; // Get the image file name
        const videoId = document.getElementById("videoId").value;  // Get the ID of the video being edited

        if (title && description && link && liveAt && image) {
            // Update the video in the array
            const videoIndex = videos.findIndex(v => v.id === videoId);
            if (videoIndex !== -1) {
                videos[videoIndex] = { id: videoId, title, description, link, liveAt, image };
                
                // Update the existing row in the table
                currentEditingRow.children[1].textContent = title;
                currentEditingRow.children[2].textContent = description;
                currentEditingRow.children[3].textContent = link;
                currentEditingRow.children[4].textContent = liveAt;
                currentEditingRow.children[5].textContent = image;

                // Reset editing state
                currentEditingRow = null;
                saveVideoButton.style.display = "block";  // Show Save button
                updateVideoButton.style.display = "none";  // Hide Update button
            }

            clearVideoForm();
            hidePopup(addVideoPopup);
        } else {
            alert("Please fill in all fields.");
        }
    });

    // Edit button click handler
    videoTable.addEventListener("click", (e) => {
        if (e.target.classList.contains("edit-btn")) {
            // Delete the first row before editing
            const firstRow = videoTable.querySelector("tr");
            if (firstRow) {
                firstRow.remove();  // Remove the first row
            }

            // Edit video
            const row = e.target.closest("tr");
            currentEditingRow = row;

            const videoId = row.children[0].textContent; // Get the ID of the video
            const title = row.children[1].textContent;
            const description = row.children[2].textContent;
            const link = row.children[3].textContent;
            const liveAt = row.children[4].textContent;
            const image = row.children[5].textContent;

            // Show the popup and populate the form with the current video's data
            showPopup(addVideoPopup);
            document.getElementById("videoId").value = videoId;  // Set the ID to the hidden input field
            document.getElementById("videoTitle").value = title;
            document.getElementById("videoDescription").value = description;
            document.getElementById("videoLink").value = link;
            document.getElementById("videoLiveAt").value = liveAt;
            document.getElementById("videoImage").value = image;

            // Change the buttons for update
            saveVideoButton.style.display = "none";
            updateVideoButton.style.display = "block";
        }
    });

    // Delete button click handler
    videoTable.addEventListener("click", (e) => {
        if (e.target.classList.contains("delete-btn")) {
            const row = e.target.closest("tr");
            const videoId = row.children[0].textContent; // Get the ID of the video

            // Remove video from array and table
            videos = videos.filter(video => video.id !== videoId);
            row.remove();
        }
    });

    // Show a popup
    function showPopup(popup) {
        popup.style.display = "block";
    }

    // Hide a popup
    function hidePopup(popup) {
        popup.style.display = "none";
    }

    // Clear the form inputs
    function clearVideoForm() {
        document.getElementById("videoTitle").value = "";
        document.getElementById("videoDescription").value = "";
        document.getElementById("videoLink").value = "";
        document.getElementById("videoLiveAt").value = "";
        document.getElementById("videoImage").value = "";
    }

    // Function to add a video to the table
    function addVideoToTable(video) {
        const tableBody = document.querySelector("#videoTable tbody");
        const newRow = document.createElement("tr");

        newRow.innerHTML = `
            <td>${video.id}</td>
            <td>${video.title}</td>
            <td>${video.description}</td>
            <td>${video.link}</td>
            <td>${video.liveAt}</td>
            <td>${video.image}</td>
            <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
            </td>
        `;

        tableBody.appendChild(newRow);
    }
});
