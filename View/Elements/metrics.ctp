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
	<h2><?php echo __('Data'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
        <th>Date</th>
        <th>
<?php echo $attr['@metric'] ?>
        </th>
    </tr>
<?php foreach($data as $day) { ?>
    <tr>
        <td>
<?php echo date(!isset($attr['@groupBy']) ? "M d, Y" : "M Y", strtotime($day['@date'])) ?>
        </td>
        <td>
<?php echo $this->Number->format($day['@value']) ?>
        </td>
    </tr>
<?php } ?>
    </table>
</div>
<div class="actions">
	<h3><?php echo __('App Metrics'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Users'), array('action' => 'new_users')); ?></li>
		<li><?php echo $this->Html->link(__('Active User'), array('action' => 'active_users')); ?> </li>
		<li><?php echo $this->Html->link(__('Median Session Length'), array('action' => 'median_session_length')); ?> </li>
		<li><?php echo $this->Html->link(__('Average Session Length'), array('action' => 'avg_session_length')); ?> </li>
		<li><?php echo $this->Html->link(__('Sessions'), array('action' => 'sessions')); ?> </li>
		<li><?php echo $this->Html->link(__('Retained Users'), array('action' => 'retained_users')); ?> </li>
		<li><?php echo $this->Html->link(__('Page Views'), array('action' => 'page_views')); ?> </li>
		<li><?php echo $this->Html->link(__('Average Page Views/Session'), array('action' => 'avg_page_views_per_session')); ?> </li>
	</ul>
</div>
