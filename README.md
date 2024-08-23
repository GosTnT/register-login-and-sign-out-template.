# register-login-and-sign-out-template.
This project is a user authentication system built using PHP, SQL, CSS, JSON, and JavaScript. It provides a full-featured solution for user registration, login, and logout functionalities, along with personalized user dashboards.

Key Features
User Registration (Sign-up):

A registration form that collects user information, such as first name, last name, email, mobile number, and password.
Input validation using PHP, ensuring all required fields are filled, passwords match, and that the password meets the minimum security standards.
Duplicate email check to prevent multiple accounts using the same email.
Passwords are securely hashed using password_hash() before being stored in the database.
Error handling with JSON-encoded error messages displayed using JavaScript alerts.
User Login (Sign-in):

A login form where users provide their registered email and password.
Input validation to ensure the email and password fields are filled.
The login script checks the database for the user’s email and verifies the password using password_verify().
Upon successful login, the user is redirected to a personalized dashboard with a welcome message.
Sessions are used to manage user authentication across pages.
Personalized Dashboard:

Once logged in, users are greeted with a dashboard page that includes a personalized welcome message displaying their first name.
The dashboard is styled with CSS for a clean, responsive layout.
Users have access to a "Log Out" button that securely ends their session.
User Logout (Sign-out):

The logout script destroys the user’s session and redirects them to the login page, ensuring secure session management.
Technologies Used
PHP: Handles server-side processing, form handling, session management, and interactions with the database.
SQL (MySQL): Manages the database, stores user data, performs queries for registration, login, and user verification.
CSS: Provides styling for all pages, ensuring a responsive and visually appealing interface.
JavaScript (JSON): Enhances user experience by handling error display and dynamic form validation using JSON-encoded messages.
HTML: Structures the web pages, forming the base layout for registration, login, and the user dashboard.
Project Structure
Registration Page (register.php): Allows new users to create an account.
Login Page (login.php): Provides a login interface for returning users.
Dashboard Page (dashboard.php): Displays personalized content for logged-in users.
Logout Script (logout.php): Ends the user session and redirects to the login page.
Database (users table): Stores user data such as first name, last name, email, mobile, and hashed passwords.
Security Features
Passwords are securely hashed with PHP’s password_hash() function.
SQL queries are protected against SQL injection using prepared statements.
User sessions are securely managed and terminated on logout to prevent unauthorized access.

Conclusion
This project is a comprehensive and secure user authentication system suitable for web applications requiring user accounts. It integrates key technologies for both the front-end and back-end, providing a full-stack solution with a focus on user experience, security, and responsiveness.
