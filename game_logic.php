<?php
session_start();

if (isset($_POST['reset'])) {
    $_SESSION['board'] = array_fill(0, 9, '');
    $_SESSION['turn'] = 'X';
    header("Location: index.php");
    exit();
}

$board = &$_SESSION['board'];
$turn = &$_SESSION['turn'];

for ($i = 0; $i < 9; $i++) {
    if (isset($_POST["cell$i"]) && $board[$i] == '') {
        $board[$i] = $turn;
        $turn = $turn == 'X' ? 'O' : 'X';
        break;
    }
}

$winner = checkWinner($board);
if ($winner) {
    echo "<h2>Player $winner wins!</h2>";
    $_SESSION['board'] = array_fill(0, 9, '');
} elseif (!in_array('', $board)) {
    echo "<h2>It's a draw!</h2>";
    $_SESSION['board'] = array_fill(0, 9, '');
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
