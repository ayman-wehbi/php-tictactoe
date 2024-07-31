<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tic Tac Toe</h1>
        <div class="board">
            <form action="game_logic.php" method="post">
                <?php
                session_start();
                
                if (!isset($_SESSION['board'])) {
                    $_SESSION['board'] = array_fill(0, 9, '');
                    $_SESSION['turn'] = 'X';
                }

                $board = $_SESSION['board'];
                for ($i = 0; $i < 9; $i++) {
                    echo "<input type='submit' name='cell$i' value='{$board[$i]}' class='cell'>";
                    if ($i % 3 == 2) {
                        echo "<br>";
                    }
                }
                ?>
            </form>
            <form action="game_logic.php" method="post">
                <input type="submit" name="reset" value="Reset" class="reset">
            </form>
        </div>
    </div>
</body>
</html>
