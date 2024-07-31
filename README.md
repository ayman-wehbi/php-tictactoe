# Tic Tac Toe Game

A web-based Tic Tac Toe game built with PHP, HTML, CSS (MaterializeCSS), and MySQL. This project includes user authentication, win counters, and persistent game state management.

## Features

- User authentication for secure gameplay
- Win counters for both X and O players
- Persistent game state with session management
- Modern and responsive design using MaterializeCSS
- Interactive and user-friendly gameplay experience

## Installation

### Prerequisites

- [XAMPP](https://www.apachefriends.org/index.html) (or any other local server with PHP and MySQL)
- A web browser

### Setup

1. **Clone the repository:**

    ```bash
    git clone https://github.com/ayman-wehbi/php-tictactoe.git
    cd tic-tac-toe
    ```

2. **Set up the database:**

    - Start XAMPP and open phpMyAdmin by navigating to `http://localhost/phpmyadmin`.
    - Create a new database called `tic_tac_toe`.
    - Run the following SQL query to create the `users` table:

      ```sql
      CREATE TABLE users (
          id INT AUTO_INCREMENT PRIMARY KEY,
          username VARCHAR(50) NOT NULL UNIQUE,
          password VARCHAR(255) NOT NULL
      );
      ```

3. **Configure the database connection:**

    - Open `db.php` and update the database credentials if necessary:

      ```php
      <?php
      $host = 'localhost';
      $db = 'tic_tac_toe';
      $user = 'root'; // your database username
      $pass = ''; // your database password (leave empty if you didn't set one)

      try {
          $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          die("Could not connect to the database: " . $e->getMessage());
      }
      ?>
      ```

4. **Run the application:**

    - Place the project folder `tic-tac-toe` in the `htdocs` directory of your XAMPP installation.
    - Start the Apache and MySQL services in XAMPP.
    - Open your web browser and navigate to `http://localhost/tic-tac-toe`.

## Usage

1. **Register a new user:**
    - Navigate to `http://localhost/tic-tac-toe/register.php`.
    - Fill in the registration form and submit.

2. **Log in:**
    - Navigate to `http://localhost/tic-tac-toe/login.php`.
    - Enter your registered username and password to log in.

3. **Play the game:**
    - Click on the cells to play Tic Tac Toe.
    - The win counters will update based on the game results.
    - Use the reset button to start a new game.

## Acknowledgments

- [MaterializeCSS](https://materializecss.com/) for the UI components and styling.
- [XAMPP](https://www.apachefriends.org/index.html) for the local development environment.
