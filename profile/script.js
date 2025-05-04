/* ----- BASE ------ */
"use strict";

// get required selectors to maniplute menu toggle
const navbar = document.querySelector(".navbar");
const menuTogglersContainer = document.querySelector(".menu-togglers");
const bxMenu = document.querySelector(".bx-menu");

/* -- show/hide menu -- */
menuTogglersContainer.addEventListener("click", () => {
  // if navbar tag have show-nav in as class
  navbar.classList.toggle("show-nav");
});

/* ================================================ */

/* -------- theme changing -------- */
const themeTogglers = document.querySelector(".theme-togglers");
const lightIcon = document.querySelector(".bxs-sun");
const darkIcon = document.querySelector(".bxs-moon");

var lightmode = localStorage.getItem("lightmode");

// enable dark mode function
const enableLightMode = () => {
  // add class dark mode to the body
  document.body.classList.add("lightmode");
  localStorage.setItem("lightmode", "enabled");
  // change theme toggle styles
  lightIcon.style.display = "none";
  darkIcon.style.display = "block";
};

if (lightmode && lightmode === "enabled") {
  enableLightMode();
}

// disable dark mode function
const disableLightMode = () => {
  // remove class dark mode from the body
  document.body.classList.remove("lightmode");
  localStorage.setItem("lightmode", null);
  // change theme toggle styles
  lightIcon.style.display = "block";
  darkIcon.style.display = "none";
};

// active/deactive dark mode
themeTogglers.addEventListener("click", () => {
  lightmode = localStorage.getItem("lightmode");
  if (!lightmode || lightmode !== "enabled") {
    enableLightMode();
  } else {
    disableLightMode();
  }
});


/* -- hide show hero buttons -- */
// delay before showing them
const heroButtonsContainer = document.querySelector(".hero-btns-container");

var delayTime = 1000;

heroButtonsContainer.style.transition = "opacity 1000ms";

setTimeout(() => {
  heroButtonsContainer.style.opacity = 1;
}, delayTime);

// --- prevent form submission on contact section ---
const sendMsgButton = document.querySelector(".send-msg-btn");
sendMsgButton.addEventListener("click", (e) => {
  e.preventDefault();
});





function updateTimeLeft(id, deadline) {
  const element = document.getElementById(id);
  const interval = setInterval(() => {
    const now = new Date().getTime();
    const timeLeft = deadline - now;

    if (timeLeft < 0) {
      clearInterval(interval);
      element.innerHTML = "Expired";
      return;
    }

    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    element.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
  }, 1000);
}

document.addEventListener("DOMContentLoaded", () => {
  const deadlines = [
    new Date("2024-12-31T23:59:59").getTime(), // Deadline for Contest 1
    new Date("2024-12-24T23:59:59").getTime(), // Deadline for Contest 2
    new Date("2024-12-17T23:59:59").getTime()  // Deadline for Contest 3
  ];

  updateTimeLeft("time-left-1", deadlines[0]);
  updateTimeLeft("time-left-2", deadlines[1]);
  updateTimeLeft("time-left-3", deadlines[2]);
});












document.addEventListener("DOMContentLoaded", function () {
  // Show popup form
  document.getElementById('edit-button').onclick = function () {
      document.getElementById('popup-form').style.display = 'block';
  };

  // Close popup form
  document.getElementById('close-button').onclick = function () {
      document.getElementById('popup-form').style.display = 'none';
  };

  // Handle form submission
  const editForm = document.getElementById('edit-form');
  if (editForm) {
      editForm.addEventListener('submit', function (event) {
          event.preventDefault(); // Prevent page reload

          let nameInput = document.getElementById('name');
          if (!nameInput) {
              console.error("Name input field not found");
              return;
          }

          let name = nameInput.value;
          console.log("Name:", name);

          let formData = new FormData(editForm);
          fetch('profile.php', {
              method: 'POST',
              body: formData
          })
          .then(response => response.text())
          .then(data => {
              alert(data);
              location.reload(); // Reload to reflect changes
          })
          .catch(error => console.error('Error:', error));
      });
  } else {
      console.error('Edit form not found');
  }
});
