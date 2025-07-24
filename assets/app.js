/**
 * Frontend JavaScript for the Modern To-Do App.
 * Handles form submission, fetching tasks, and marking tasks as done.
 */

// Base URL for the API endpoints — REMOVE extra `/api`
const API_BASE = "http://localhost:8080";

// Get references to DOM elements
const taskForm = document.getElementById("taskForm");
const titleInput = document.getElementById("title");
const descriptionInput = document.getElementById("description");
const taskList = document.getElementById("taskList");
const messageBox = document.getElementById("messageBox");

// --- Event Listeners ---

// Load tasks when the page content is fully loaded
document.addEventListener("DOMContentLoaded", fetchTasks);

// Handle form submission for adding a new task
taskForm.addEventListener("submit", async function(e) {
  e.preventDefault();

  const title = titleInput.value.trim();
  const description = descriptionInput.value.trim();

  if (!title || !description) {
    displayMessage("Please provide both a title and a description.", "error");
    return;
  }

  try {
    const response = await fetch(`${API_BASE}/api/addTask.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ title, description })
    });

    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

    const data = await response.json();

    displayMessage(data.message, data.success ? "success" : "error");
    fetchTasks();
    this.reset();
  } catch (error) {
    console.error("Error adding task:", error);
    displayMessage("Failed to add task. Please try again.", "error");
  }
});

// --- Functions ---

async function fetchTasks() {
  try {
    const response = await fetch(`${API_BASE}/api/getTasks.php`);

    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

    const data = await response.json();
    taskList.innerHTML = "";

    if (Array.isArray(data) && data.length > 0) {
      data.forEach(task => {
        const card = document.createElement("div");
        card.className = "task-card";
        card.innerHTML = `
          <h5>${task.title}</h5>
          <p>${task.description}</p>
          <button onclick="markDone(${task.id})" class="btn btn-success btn-sm">
            <i class="bi bi-check-lg"></i> Mark as Done
          </button>
        `;
        taskList.appendChild(card);
      });
    } else {
      taskList.innerHTML = `
        <div class="empty-state">
          <i class="bi bi-clipboard-x"></i>
          <h5>No tasks yet!</h5>
          <p>Add your first task to get started.</p>
        </div>
      `;
    }
  } catch (error) {
    console.error("Error fetching tasks:", error);
    displayMessage("Failed to load tasks. Please check the server connection.", "error");
  }
}

async function markDone(id) {
  try {
    const response = await fetch(`${API_BASE}/api/markDone.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ id })
    });

    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

    const data = await response.json();

    displayMessage(data.message, data.success ? "success" : "error");
    fetchTasks();
  } catch (error) {
    console.error("Error marking task as done:", error);
    displayMessage("Failed to mark task as done. Please try again.", "error");
  }
}

function displayMessage(message, type) {
  if (messageBox) {
    messageBox.textContent = message;
    messageBox.className = `message-box ${type}`;
    messageBox.style.display = "block";

    setTimeout(() => {
      messageBox.style.display = "none";
      messageBox.textContent = "";
      messageBox.className = "message-box";
    }, 4000);
  } else {
    console.warn("Message box element not found. Message:", message);
  }
}
