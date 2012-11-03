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
	<h2><?php echo __('Versions'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
        <th>Date</th>
        <th>Version</th>
    </tr>
<?php foreach($versions as $version) { ?>
    <tr>
        <td>
<?php echo $version['@createdDate'] ?>
        </td>
        <td>
<?php echo $version['@name'] ?>
        </td>
    </tr>
<?php } ?>
    </table>
</div>
