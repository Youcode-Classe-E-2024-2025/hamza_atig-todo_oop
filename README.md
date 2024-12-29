# To-Do App with OOP in PHP

This is a simple To-Do application built using PHP, utilizing Object-Oriented Programming (OOP) principles. Users can efficiently manage tasks, features, and bugs with a clean and modular structure for scalability.

## Features

- **User Authentication**: Secure login and logout functionality.
- **Task Management**: Create, view, and manage tasks seamlessly.
- **Issue Tracking**: Separate handling for bugs and features.
- **Modular Design**: Reusable classes for tasks, bugs, features, and users.
- **MVC Structure**: Organized like an MVC framework for better maintainability.
- **Database Setup**: Includes a script for easy database setup.

## Project Structure

TODO_OOP/
├── public/
│   ├── css/
│   │   └── style.css       # Styling for the application
│   ├── js/
│   │   └── index.php       # Placeholder for JavaScript functionality (if needed)
├── src/
│   ├── classes/
│   │   ├── Bug.php         # Class for managing bugs
│   │   ├── Feature.php     # Class for managing features
│   │   ├── Task.php        # Class for managing tasks
│   │   └── User.php        # Class for managing user authentication and data
│   ├── config/
│   │   ├── db.php          # Database connection configuration
│   │   ├── schema.sql      # SQL script to create database schema
│   │   └── setup_database.php # Script to set up the database
│   ├── views/
│   │   ├── layout.php      # Main layout template
│   │   ├── login.php       # Login page
│   │   ├── logout.php      # Logout script
│   │   ├── task_detail.php # Task details page
│   │   ├── tasks_create.php# Page to create new tasks
│   │   └── tasks.php       # Main page for viewing tasks
└── README.md               # Project documentation

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Youcode-Classe-E-2024-2025/hamza_atig-todo_oop.git
   cd todo_oop
   ```

2. **Set Up the Database**:
   - Import the `schema.sql` file into your database.
   - Update the database connection details in `src/config/db.php`.

3. **Start the Server**:
   - Place the project in your web server's root directory (e.g., `htdocs` for XAMPP, `www` for Laragon).
   - Start the server using your preferred local server setup.

4. **Access the App**:
   - Open your browser and navigate to `http://localhost/todo_oop`.

## Usage

- Login with valid credentials to access the task management system.
- Use the "Create Task" page to add new tasks.
- View and edit task details on the task details page.
- Use the logout option to end your session.

## Requirements

- PHP 7.4+
- MySQL
- A local server environment (e.g., XAMPP, Laragon)

## Contributing

Feel free to fork this repository and submit pull requests with improvements or bug fixes.

## License

This project is open-source and available under the MIT License.