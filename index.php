<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern To-Do App</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-xl-10">
        <div class="main-container">
          <!-- Header Section -->
          <div class="header-section">
            <h1><i class="bi bi-check2-square"></i> TaskMaster</h1>
            <p>Organize your life, one task at a time</p>
          </div>

          <!-- Content Section -->
          <div class="content-section">
            <!-- Message Box -->
            <div id="messageBox" class="message-box"></div>

            <div class="row">
              <!-- Form Column - Takes full width on mobile, half on tablet+ -->
              <div class="col-12 col-md-6">
                <div class="form-section">
                  <h3><i class="bi bi-plus-circle"></i> Add New Task</h3>
                  <form id="taskForm">
                    <div class="mb-3">
                      <label for="title" class="form-label">Task Title</label>
                      <input type="text" class="form-control" id="title" placeholder="Enter task title..." required>
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea class="form-control" id="description" rows="4" placeholder="Describe your task..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                      <i class="bi bi-plus-lg"></i> Add Task
                    </button>
                  </form>
                </div>
              </div>

              <!-- Tasks Column - Takes full width on mobile, half on tablet+ -->
              <div class="col-12 col-md-6">
                <div class="tasks-section">
                  <h3><i class="bi bi-list-task"></i> Your Tasks</h3>
                  <div id="taskList">
                    <!-- Tasks will be loaded here by JavaScript -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JavaScript -->
  <script src="assets/app.js"></script>
</body>
</html>