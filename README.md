# Laravel Employee Management System

## Description
This is a robust Employee Management System built with Laravel. The application allows administrators to manage employee records, tasks, and leave requests. It features secure authentication for both admins and guests, ensuring that only authorized users can access sensitive information and perform administrative actions.

## Features
### Employee Management
- Add, show, edit, and delete employee records.
- Employee details include name, email, position, and department.

### Task Management
- Create, show, edit, and delete tasks.
- Assign tasks to employees.
- Mark tasks as complete or incomplete.
- Separate tables for incomplete and completed tasks.
- Timestamped records (created at and updated at).

### Leave Management
- Apply for leave (employees).
- Approve or reject leave requests (admin).

### Authentication
- Secure login for administrators.
- Guest access with limited functionality.

## Technologies Used
- Laravel 11.7.0
- PHP 8.2.4
- Bootstrap 4
- SQLite (for local development)

## Setup Instructions
### Prerequisites
- PHP >= 7.3
- Composer
- Git

### Steps to Set Up the Development Environment
1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/laravel_employee_management.git
   cd laravel_employee_management
   
   ```
   2. **Install Dependencies**
   ```bash
   composer install
   npm install

   ```
   3. **Set Up Environment Variables**
   - Copy the .env.example file to .env
   ```bash
   cp .env.example .env
   ```
   -Update the .env file to use SQLite for local development. Update the following lines:
   ```bash
   DB_CONNECTION=sqlite
   DB_DATABASE=/full/path/to/your/database.sqlite
   ```
   Create the SQLite database file:
    ```bash
   touch /full/path/to/your/database.sqlite
   ```
   4. **(Optional) MySQL Configuration**
   ```bash
    # DB_CONNECTION=mysql
    # DB_HOST=127.0.0.1
    # DB_PORT=3306
    # DB_DATABASE=employee_management
    # DB_USERNAME=root
    # DB_PASSWORD=
   ```
    4. **Generate Application Key**
   ```bash
    php artisan key:generate
   ```
    4. **Run Migrations**
   ```bash
   php artisan migrate
   ```
    4. **Start the Development Server**
   ```bash
    php artisan serve
   ```


**Usage Instructions**
-Employee Management
Add an Employee
Navigate to http://127.0.0.1:8000/employees/create and fill out the form to add a new employee.

-View Employees
Navigate to http://127.0.0.1:8000/employees to view all employee records.

-Edit an Employee
Click the "Edit" button next to an employee record to update its details.

-Delete an Employee
Click the "Delete" button next to an employee record to remove it.

-Task Management
Create a Task
Navigate to http://127.0.0.1:8000/tasks/create and fill out the form to create a new task.

-View Tasks
Navigate to http://127.0.0.1:8000/tasks to view all tasks. Incomplete tasks will be listed first, followed by completed tasks.

-Edit a Task
Click the "Edit" button next to a task to update its details.

-Mark a Task as Complete
Click the "Complete" button next to an incomplete task to mark it as complete. This will move the task to the completed tasks table, and vice versa.

-Delete a Task
Click the "Delete" button next to a task to remove it.

-Leave Management
Apply for Leave
Employees can navigate to http://127.0.0.1:8000/leaves/create to apply for leave.

-Approve/Reject Leave Requests
Admins can navigate to http://127.0.0.1:8000/leaves to view, approve, or reject leave requests.

**Contributing**
We welcome contributions! Please fork the repository and submit pull requests for any enhancements or bug fixes.

**License**
This project is open-source and available.

**Contact**
For any questions or feedback, please contact oliahammed02@gmail.com.
   
