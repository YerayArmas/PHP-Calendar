<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    
    <title>CALENDAR PHP</title>

    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <div class="background"></div>

    <div class="calendar-container">

        <h1>CALENDAR PHP</h1>

        <?php

/*      F	A full textual representation of a month, such as January or March
        m	Numeric representation of a month, with leading zeros
        M	A short textual representation of a month, three letters
        n	Numeric representation of a month, without leading zeros*/

        // Call the current year and month and storage it 
        $currentYear = date("Y");
        $currentMonth = date("n");

        // In each month, we need the number of days
        $daysInMonth = date("t", mktime(0, 0, 0, $currentMonth, 1, $currentYear));

        // Get the day of the week the first day of month falls on
        $firstDayOfWeek = date("n", mktime(0, 0, 0, $currentMonth, 1, $currentYear));

        // Calendar table 
        echo "<table border='1'>";
        echo "<tr><th colspan='7'>" . date("F Y") . "</th></tr>";
        echo "<tr>
        <th>Mon</th>
            <th>Tue</th>
                <th>Wed</th>
                    <th>Thu</th>
                        <th>Fri</th>
                            <th>Sat</th>
                                <th>Sun</th>
                                    </tr>";

        // First row 
        echo "<tr>";

        // Filling in blank cells before the first days of the month
        for ($i = 1; $i < $firstDayOfWeek; $i++) {
            echo "<td>&nbsp;</td>";
        }

        // Filling in the days of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            // Also have to start a row at the beginning of each week
            if (($day + $firstDayOfWeek - 1) % 7 == 1) {
                echo "</tr><tr>";
            }
            echo "<td>$day</td>";
        }

        // Filling in blank cells at the end of the month
        for ($i = 1; ($i <= (7 - ($firstDayOfWeek + $daysInMonth - 1) % 7) % 7); $i++) {
            echo "<td>&nbsp;</td>";
        }

        echo "</tr>";
        echo "</table>";

        ?>
    </div>

</body>
</html>