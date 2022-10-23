<?php
    $self = $_SERVER['PHP_SELF'];

    if(isset($_GET['month'])) {
        $month = $_GET['month'];
    } else {
        $month = date('n');
    }

    if(isset($_GET['year'])) {
        $year = $_GET['year'];
    } else {
        $year = date('Y');
    }

    $timestamp = mktime(0, 0, 0, $month, 1, $year);
    $first_of_month = date("w", $timestamp);

    $last_month = date("n", $timestamp - (24*60*60));
    if($month == 1) {
        $last_year = $year-1;
    }
    else {
        $last_year = $year;
    }

    $next_month = date("n", $timestamp + (date("t", $timestamp)*24*60*60));
    if($month == 12) {
        $next_year = $year+1;
    }
    else {
        $next_year = $year;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Calendar</title>
</head>
<body>
    <div class="calendar">
        <div class="header">
            <a class="prev" href="<?php echo $self."?month=".$last_month."&year=".$last_year ?>"><<</a>
            <div class="info">
                <div class="mounth"><?php echo date("F", $timestamp) ?></div>
                <div class="year"><?php echo $year ?></div>
            </div>
            <a class="next" href="<?php echo $self."?month=".$next_month."&year=".$next_year ?>">>></a>
        </div>
        <div class="main">
            <div class="days_headings">
                <div>SUN</div>
                <div>MON</div>
                <div>TUE</div>
                <div>WED</div>
                <div>THU</div>
                <div>FRI</div>
                <div>SAT</div>
            </div>
                <?php
                    $days_counter = 0;
                    echo "<div class='week'>";

                    for (; $days_counter < $first_of_month; $days_counter++) {
                        echo "<div class='day'></div>";
                    }

                    for($i = 1; $i <= date("t", $timestamp); $i++) {
                        if ($days_counter == 7) {
                            echo "</div><div class='week'>";
                            $days_counter = 0;
                        }

                        if(date("j", time()) == $i && date("n-Y", time()) == $month."-".$year) {
                            echo "<div class='day current_day'>".$i."</div>";
                        } else {
                            echo "<div class='day'>".$i."</div>";
                        }

                        $days_counter++;
                    }

                    $remainder = ($first_of_month + date("t", $timestamp)) % 7;
                    if($remainder != 0) {
                        for($i = $remainder; $i < 7; $i++) {
                            echo "<div class='day'></div>";
                        }
                    }

                    echo "</div>";
                ?>
        </div>
    </div>
</body>
</html>