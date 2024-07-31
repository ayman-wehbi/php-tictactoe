<?php
session_start();

if (!isset($_SESSION['x_wins'])) {
    $_SESSION['x_wins'] = 0;
}

if (!isset($_SESSION['o_wins'])) {
    $_SESSION['o_wins'] = 0;
}

if (isset($_POST['reset'])) {
    $_SESSION['board'] = array_fill(0, 9, '');
    $_SESSION['turn'] = 'X';
    $_SESSION['message'] = '';
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = array_fill(0, 9, '');
    $_SESSION['turn'] = 'X';
    $_SESSION['message'] = '';
}

$board = &$_SESSION['board'];
$turn = &$_SESSION['turn'];
$message = &$_SESSION['message'];

if (isset($_POST)) {
    for ($i = 0; $i < 9; $i++) {
        if (isset($_POST["cell$i"]) && $board[$i] == '' && $message == '') {
            $board[$i] = $turn;
            $turn = $turn == 'X' ? 'O' : 'X';
            break;
        }
    }
}

$winner = checkWinner($board);
if ($winner) {
    $message = "Player $winner wins!";
    if ($winner == 'X') {
        $_SESSION['x_wins'] += 1;
    } else {
        $_SESSION['o_wins'] += 1;
    }
} elseif (!in_array('', $board) && $message == '') {
    $message = "It's a draw!";
}

header("Location: index.php");

function checkWinner($board) {
    $winningCombinations = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8], // rows
        [0, 3, 6], [1, 4, 7], [2, 5, 8], // columns
        [0, 4, 8], [2, 4, 6]  // diagonals
    ];

    foreach ($winningCombinations as $combination) {
        if ($board[$combination[0]] != '' &&
            $board[$combination[0]] == $board[$combination[1]] &&
            $board[$combination[1]] == $board[$combination[2]]) {
            return $board[$combination[0]];
        }
    }

    return null;
}
?>
