<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <style>
        .container {
            margin-top: 50px;
        }
        .board {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-template-rows: repeat(3, 100px);
            gap: 10px;
            justify-content: center;
        }
        .cell {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            width: 100px;
            height: 100px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #e0e0e0;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .cell:hover {
            background-color: #d0d0d0;
        }
        .reset {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card-panel teal lighten-2 white-text center-align">
            <h4>Tic Tac Toe</h4>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! <a href="logout.php" class="white-text">Logout</a></p>
        </div>
        <div class="row">
            <div class="col s6">
                <h5 class="center-align">X Wins: <?php echo $_SESSION['x_wins']; ?></h5>
            </div>
            <div class="col s6">
                <h5 class="center-align">O Wins: <?php echo $_SESSION['o_wins']; ?></h5>
            </div>
        </div>
        <form action="game_logic.php" method="post">
            <div class="board">
                <?php
                if (!isset($_SESSION['board'])) {
                    $_SESSION['board'] = array_fill(0, 9, '');
                    $_SESSION['turn'] = 'X';
                }

                $board = $_SESSION['board'];
                $gameEnded = !empty($_SESSION['message']);
                for ($i = 0; $i < 9; $i++) {
                    $disabled = $gameEnded ? 'disabled' : '';
                    echo "<button type='submit' name='cell$i' class='cell' $disabled>{$board[$i]}</button>";
                }
                ?>
            </div>
        </form>
        <form action="game_logic.php" method="post" class="center-align reset">
            <button type="submit" name="reset" class="btn waves-effect waves-light red">Reset</button>
        </form>
    </div>
</body>
</html>
