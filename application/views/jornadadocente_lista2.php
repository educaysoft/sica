<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tabla con celda roja</title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    .rojo {
        background-color: red;
    }
</style>
</head>
<body>

<?php foreach ($jornadadocente as $iddocente => $jornadas): ?>
    <h2>Docente ID: <?php echo $iddocente; ?></h2>
    <table>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Nivel</th>
                <th>Paralelo</th>
                <th>Aula</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Duración (minutos)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jornadas as $jornada): ?>
                    <?php if($jornada['horainicio']>$horafin) { ?>

                    <td><?php echo "  "; ?></td>
                    <td><?php echo "  "; ?></td>
                    <td><?php echo "  "; ?></td>
                    <td><?php echo "  "; ?></td>
                    <td><?php echo " "; ?></td>
                    <td><?php echo $horafin; ?></td>
                    <td><?php echo $jornada['horainicio']; ?></td>
                    <?php }  ?>

                <tr>
                    <td><?php echo $jornada['idasignatura']; ?></td>
                    <td><?php echo $jornada['nivel']; ?></td>
                    <td><?php echo $jornada['paralelo']; ?></td>
                    <td><?php echo $jornada['aula']; ?></td>
                    <td><?php echo $jornada['dia']; ?></td>
                    <td><?php echo $jornada['horainicio']; ?></td>
                    <td><?php echo $jornada['horafinal']; ?></td>
                <?php if($jornada['duracionminutos']>120){ ?>
                    <td class="rojo"><?php echo $jornada['duracionminutos']; ?></td>
                <?php }else{  ?>
                    <td><?php echo $jornada['duracionminutos']; ?></td>
                <?php }  
                    $horafin=$jornada['horafinal'];
?>


                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>
</body>
</html>

