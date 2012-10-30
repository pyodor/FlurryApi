<div class='attributes'>
    <h3>Attributes</h3>
    <table>
<?php foreach($attr as $key => $value ) { ?>
    <tr>
        <th>
<?php echo $key ?>
        </th>
        <td>
<?php echo $value ?>
        </td>
    </tr>
<?php } ?>
    <table>
</div>

<div class='data'>
    <h3>Data</h3>
    <table>
    <tr>
        <th>Date</th>
        <th>
<?php echo $attr['@metric'] ?>
        </th>
    </tr>
<?php foreach($data as $day) { ?>
    <tr>
        <td>
<?php echo date("M Y", strtotime($day['@date'])) ?>
        </td>
        <td>
<?php echo $day['@value'] ?>
        </td>
    </tr>
<?php } ?>
    </table>
</div>
