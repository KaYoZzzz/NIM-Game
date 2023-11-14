<?php
function resetGame()
{
    $_SESSION['l1'] = 1;
    $_SESSION['l2'] = 3;
    $_SESSION['l3'] = 5;
    $_SESSION['l4'] = 7;
    $_SESSION['stick'] = 16;
    $_SESSION['player'] = 1; // Aggiunto per tenere traccia del giocatore corrente
}

function createLine($row, $numberOfSticks)
{
    $maxSticks = 7; // maximum number of sticks in a row
    $emptyCells = ($maxSticks - $numberOfSticks) / 2;
    echo '<tr>';
    echo '<td> ' . $row . ' </td>';
    for ($i = 0; $i < $emptyCells; $i++) {
        echo '<td></td>';
    }
    for ($i = 0; $i < $numberOfSticks; $i++) {
        $id = $row * 10 + $i + 1;
        echo '
            <td style="text-align: center;">
                <img src="img/stick.jpg" width = 70 height = 70 id = ' . $id . ' onclick=clickMe(' . $id . ')>
            </td>
        ';
    }
    for ($i = 0; $i < $emptyCells; $i++) {
        echo '<td></td>';
    }
    echo '</tr>';
}
?>