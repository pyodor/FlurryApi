<div class='view'>
	<h2><?php echo __('Attributes'); ?></h2>
    <table cellpadding="0" cellspacing="0">
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
    <h2><?php echo __('Events'); ?></h2>
<?php if(!isset($headers)) { ?>
    <span>No Events tracked</span>
<?php } else { ?>
    <table cellpadding="0" cellspacing="0">
    <tr>
<?php foreach($headers as $header) { ?>
        <th>
<?php echo $header ?>
        </th>
<?php } ?>
    </tr>
<?php foreach($data as $event) { ?>
    <tr>
        <td>
<?php echo $event['@usersLastWeek'] ?>
        </td>
        <td>
<?php echo $event['@usersLastMonth'] ?>
        </td>
        <td>
<?php echo $event['@usersLastDay'] ?>
        </td>
        <td>
<?php echo $event['@totalSessions'] ?>
        </td>
        <td>
<?php echo $event['@totalCount'] ?>
        </td>
        <td>
<?php echo $event['@eventName'] ?>
        </td>
        <td>
<?php echo $event['@avgUsersLastWeek'] ?>
        </td>
        <td>
<?php echo $event['@avgUsersLastMonth'] ?>
        </td>
        <td>
<?php echo $event['@avgUsersLastDay'] ?>
        </td>
    </tr>
<?php } ?>
    </table>
<?php } ?>
</div>
