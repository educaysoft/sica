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
                <tr>
                    <td><?php echo $jornada['idasignatura']; ?></td>
                    <td><?php echo $jornada['nivel']; ?></td>
                    <td><?php echo $jornada['paralelo']; ?></td>
                    <td><?php echo $jornada['aula']; ?></td>
                    <td><?php echo $jornada['dia']; ?></td>
                    <td><?php echo $jornada['horainicio']; ?></td>
                    <td><?php echo $jornada['duracionminutos']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>

