<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Task Management</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <!-- google font: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <!-- main css -->
  <link rel="stylesheet" href="./assets/css/styles2.css" />
  <link rel="stylesheet" href="./assets/css/styles1.css" />
</head>

<body>
  <!-- Because body has height 100%, we need a container to wrap the individual 
    elements. The purpose is to add top & bottom padding -->
  <div class="content-container">
    <!-- success notification -->
    <div id="notification" class="notification green-background">
      <iconify-icon icon="mdi:check-circle-outline" style="color: black" width="24" height="24"></iconify-icon>
      <p>The task was deleted</p>
    </div>
    <!-- header -->
    <div class="max-width-container">
      <div class="header flex items-center justify-between">
        <h1 class="title">My tasks</h1>
        <div class="buttons-container">
          <button id="add-task-cta" class="button regular-button blue-background">
            Add
          </button>
          <button class="sign-out-cta">Sign out</button>
        </div>
      </div>
    </div>
    <!-- radio buttons -->
    <div class="radio-buttons-container">
      <div class="max-width-container flex">
        <div class="radio-container">
          <input type="radio" id="list" name="view-option" value="list" class="radio-input" checked />
          <label for="list" class="radio-label">
            <!-- list-bulleted -->
            <iconify-icon icon="material-symbols:format-list-bulleted-rounded" style="color: black" width="24"
              height="24"></iconify-icon>
            <span>List</span>
          </label>
        </div>
      </div>
    </div>
    <!-- tasks -->
    <div class="max-width-container">
      <!-- list view -->
      <div id="list-view" class="list-view">
        <div class="list-container pink">
          <h2 class="list-header">
            <span class="circle pink-background"></span><span class="text">To do</span>
          </h2>
          <ul class="tasks-list">
            <li class="task-item">
              <button class="task-button">
                <p class="task-name">Design UI</p>
                <p class="task-due-date">Due on January 7, 2020</p>
                <!-- arrow -->
                <iconify-icon icon="material-symbols:arrow-back-ios-rounded" style="color: black" width="18" height="18"
                  class="arrow-icon"></iconify-icon>
              </button>
            </li>
            <li class="task-item">
              <button class="task-button">
                <p class="task-name">Design UI</p>
                <p class="task-due-date">Due on January 7, 2020</p>
                <!-- arrow -->
                <iconify-icon icon="material-symbols:arrow-back-ios-rounded" style="color: black" width="18" height="18"
                  class="arrow-icon"></iconify-icon>
              </button>
            </li>
            <li class="task-item">
              <button class="task-button">
                <p class="task-name">Design UI</p>
                <p class="task-due-date">Due on January 7, 2020</p>
                <!-- arrow -->
                <iconify-icon icon="material-symbols:arrow-back-ios-rounded" style="color: black" width="18" height="18"
                  class="arrow-icon"></iconify-icon>
              </button>
            </li>
          </ul>
        </div>
        <div class="list-container blue">
          <h2 class="list-header">
            <span class="circle blue-background"></span><span class="text">Doing</span>
          </h2>
          <ul class="tasks-list">
            <li class="task-item">
              <button class="task-button">
                <p class="task-name">Design UI</p>
                <p class="task-due-date">Due on January 7, 2020</p>
                <!-- arrow -->
                <iconify-icon icon="material-symbols:arrow-back-ios-rounded" style="color: black" width="18" height="18"
                  class="arrow-icon"></iconify-icon>
              </button>
            </li>
            <li class="task-item">
              <button class="task-button">
                <p class="task-name">Design UI</p>
                <p class="task-due-date">Due on January 7, 2020</p>
                <!-- arrow -->
                <iconify-icon icon="material-symbols:arrow-back-ios-rounded" style="color: black" width="18" height="18"
                  class="arrow-icon"></iconify-icon>
              </button>
            </li>
            <li class="task-item">
              <button class="task-button">
                <p class="task-name">Design UI</p>
                <p class="task-due-date">Due on January 7, 2020</p>
                <!-- arrow -->
                <iconify-icon icon="material-symbols:arrow-back-ios-rounded" style="color: black" width="18" height="18"
                  class="arrow-icon"></iconify-icon>
              </button>
            </li>
          </ul>
        </div>
        <div class="list-container green">
          <h2 class="list-header">
            <span class="circle green-background"></span><span class="text">Done</span>
          </h2>
          <ul class="tasks-list">
            <li class="task-item">
              <button class="task-button">
                <p class="task-name">Design UI</p>
                <p class="task-due-date">Due on January 7, 2020</p>
                <!-- arrow -->
                <iconify-icon icon="material-symbols:arrow-back-ios-rounded" style="color: black" width="18" height="18"
                  class="arrow-icon"></iconify-icon>
              </button>
            </li>
            <li class="task-item">
              <button class="task-button">
                <p class="task-name">Design UI</p>
                <p class="task-due-date">Due on January 7, 2020</p>
                <!-- arrow -->
                <iconify-icon icon="material-symbols:arrow-back-ios-rounded" style="color: black" width="18" height="18"
                  class="arrow-icon"></iconify-icon>
              </button>
            </li>
            <li class="task-item">
              <button class="task-button">
                <p class="task-name">Design UI</p>
                <p class="task-due-date">Due on January 7, 2020</p>
                <!-- arrow -->
                <iconify-icon icon="material-symbols:arrow-back-ios-rounded" style="color: black" width="18" height="18"
                  class="arrow-icon"></iconify-icon>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- add + update task -->
  <div id="set-task-overlay" class="overlay set-task-overlay hide">
    <div class="overlay-content pink-background">
      <!-- close button -->
      <button class="button circle-button blue-background flex justify-center items-center close-button">
        <iconify-icon icon="material-symbols:close-rounded" style="color: black" width="26" height="26"></iconify-icon>
      </button>
      <h1 class="header">Add task</h1>
      <form class="form" id="taskForm" autocomplete="off">
        <label for="name" class="label">Name</label>
        <input type="text" name="name" id="name" class="input white-background" required />
        <label for="description" class="label">Description</label>
        <textarea name="description" id="description" rows="8" class="textarea-input white-background"
          required></textarea>
        <h2 class="label">Due date</h2>
        <div class="divided-inputs-container">
          <div>
            <label for="due-date-day" class="secondary-label">Day</label>
            <input type="number" name="due-date-day" id="due-date-day" class="input white-background" min="1" max="31"
              required />
          </div>
          <div>
            <label for="due-date-month" class="secondary-label">Month</label>
            <input type="number" name="due-date-month" id="due-date-month" class="input white-background" min="1"
              max="12" required />
          </div>
          <div>
            <label for="due-date-year" class="secondary-label">Year</label>
            <input type="number" name="due-date-year" id="due-date-year" class="input white-background" min="2024"
              required />
          </div>
        </div>
        <h2 class="label">Status</h2>
        <div id="status-select" class="status-select white-background flex items-center justify-between cursor-pointer">
          <span>To do</span>
          <iconify-icon icon="material-symbols:arrow-back-ios-rounded" style="color: black" width="18" height="18"
            class="arrow-icon"></iconify-icon>
        </div>
        <ul id="status-dropdown" class="status-dropdown white-background hide">
          <li>
            <input type="radio" id="to-do-radio" name="status-option" value="To do" class="radio-input" checked />
            <label for="to-do-radio" class="radio-label">
              <span class="circle pink-background"></span><span>To do</span>
            </label>
          </li>
          <li>
            <input type="radio" id="doing-radio" name="status-option" value="Doing" class="radio-input" />
            <label for="doing-radio" class="radio-label">
              <span class="circle blue-background"></span><span>Doing</span>
            </label>
          </li>
          <li>
            <input type="radio" id="done-radio" name="status-option" value="Done" class="radio-input" />
            <label for="done-radio" class="radio-label">
              <span class="circle green-background"></span><span>Done</span>
            </label>
          </li>
        </ul>
        <div class="text-center">
          <button type="submit" class="button regular-button green-background cta-button">
            Add task
          </button>
        </div>
      </form>
    </div>
  </div>
  <!-- view task -->
  <div id="view-task-overlay" class="overlay view-task-overlay hide">
    <div class="overlay-content green-background">
      <!-- close button -->
      <button class="button circle-button blue-background flex justify-center items-center close-button">
        <iconify-icon icon="material-symbols:close-rounded" style="color: black" width="26" height="26"></iconify-icon>
      </button>
      <h1 class="header no-margin">Name</h1>
      <p class="value">some long task name</p>
      <h1 class="header">Description</h1>
      <p class="value">
        some long task namesome long task namesome long task name
      </p>
      <div class="flex items-center">
        <h1 class="header min-width">Due date</h1>
        <p class="value">January 7, 2020</p>
      </div>
      <div class="flex items-center">
        <h1 class="header min-width">Status</h1>
        <p class="value status-value">
          <span class="circle blue-background"></span><span>Doing</span>
        </p>
      </div>
      <div class="control-buttons-container">
        <!-- edit button -->
        <button class="button circle-button pink-background flex justify-center items-center">
        </button>
        <!-- delete button -->
        <button id="delete-task-cta" class="button circle-button pink-background flex justify-center items-center">
        </button>
      </div>
    </div>
  </div>
  <!-- import IconifyIcon web component -->
  <script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>
  <!-- js -->
  <script src="./assets/js/main.js"></script>
</body>

</html>