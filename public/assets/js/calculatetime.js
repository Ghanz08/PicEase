// timeago.js

// Function to calculate time difference and update time display
function updateTimeDisplay(element, time) {
  const currentTime = new Date().getTime();
  const difference = currentTime - time;
  const seconds = Math.floor(difference / 1000);
  let interval = Math.floor(seconds / 31536000);

  if (interval > 1) {
    element.textContent = interval + " years ago";
    return;
  }
  interval = Math.floor(seconds / 2592000);
  if (interval > 1) {
    element.textContent = interval + " months ago";
    return;
  }
  interval = Math.floor(seconds / 604800);
  if (interval > 1) {
    element.textContent = interval + " weeks ago";
    return;
  }
  interval = Math.floor(seconds / 86400);
  if (interval > 1) {
    element.textContent = interval + " days ago";
    return;
  }
  interval = Math.floor(seconds / 3600);
  if (interval > 1) {
    element.textContent = interval + " hours ago";
    return;
  }
  interval = Math.floor(seconds / 60);
  if (interval > 1) {
    element.textContent = interval + " minutes ago";
    return;
  }
  element.textContent = Math.floor(seconds) + " seconds ago";
}

// Function to apply timeago to elements
function applyTimeago() {
  const createdAtElements = document.querySelectorAll(".created-at");
  createdAtElements.forEach((element) => {
    const time = new Date(element.textContent).getTime();
    updateTimeDisplay(element, time);
  });
}

// Apply timeago when the DOM content is loaded
document.addEventListener("DOMContentLoaded", function () {
  applyTimeago();
});
