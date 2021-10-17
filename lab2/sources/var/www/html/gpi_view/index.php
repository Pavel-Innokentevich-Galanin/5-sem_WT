<?php
    $PAGE_TITLE = "gpi_view";
    include '../_html/gpi_head.php';
    include '../_sql/gpi_connect.php';
    include '../_sql/gpi_delete.php';
    
    $gpi_sql = "SELECT * FROM `$MYSQL_DATABASE`.`wt_lab2_students`;";
    $gpi_result = mysqli_query($connect, $gpi_sql);

    $gpi_array = array();
    $gpi_item = mysqli_fetch_assoc($gpi_result);
    $gpi_i = 0;
    while ($gpi_item != "") {
        $gpi_array[$gpi_i] = $gpi_item;
        $gpi_item = mysqli_fetch_assoc($gpi_result);
        $gpi_i += 1;
    }
?>

<table>
    <?php
        $gpi_array_length = count($gpi_array);

        if ($gpi_array_length == 0) {
            echo "<p>База данных пуста</p>";
        }
        else {
    ?>
    <tr>
        <td>ИД</td>
        <td>Студент</td>
        <td>Факультет</td>
        <td>Курс</td>
        <td>Группа</td>
        <td>Удалить</td>
    </tr>
    <?php
            $gpi_i = 0;
            while($gpi_i < $gpi_array_length) {
    ?>
    <tr>
        <td><?php echo $gpi_array[$gpi_i]["ID"]; ?></td>
        <td><?php echo $gpi_array[$gpi_i]["Student"]; ?></td>
        <td><?php echo $gpi_array[$gpi_i]["Faculty"]; ?></td>
        <td><?php echo $gpi_array[$gpi_i]["Course"]; ?></td>
        <td><?php echo $gpi_array[$gpi_i]["Group"]; ?></td>
        <td><a href="?ID=<?php echo $gpi_array[$gpi_i]["ID"]; ?>">delete</a></td>
    </tr>
    <?php
                $gpi_i += 1;
            } // end while
        } // end if
    ?>
</table>