<?php
	echo $this->Html->script('jquery.min');
	echo $this->Form->input('country', array(
		'id' =>'country',
		'options' => $Country,
		'empty' => 'select country',
	));
	echo $this->Html->image('ajax-loader.gif', array('alt' => 'lodding', 'id' => 'loding1')); 
	echo $this->Form->input('state', array(
		'id' =>'state',
		//'type' => 'select'
		'options' => '$states',
		'empty' => 'select state',
	));
	echo $this->Html->image('ajax-loader.gif', array('alt' => 'lodding', 'id' => 'loding2'));
	echo $this->Form->input('city', array(
		'id' =>'city',
		//'type' => 'select'
		'empty' => 'select city',
		'options' => '$city',
	));
	echo '<br>';
	
?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#loding1").hide();
		$("#loding2").hide();
		$("#country").on('change',function() {
			var id = $(this).val();
			$("#loding1").show();
			$("#state").find('option').remove();
			$("#city").find('option').remove();
			if (id) {
				var dataString = 'id='+ id;
				$.ajax({
					type: "POST",
					url: '<?php echo Router::url(array("controller" => "countries", "action" => "getStates")); ?>' ,
					data: dataString,
					cache: false,
					success: function(html) {
						$("#loding1").hide();
						$.each(html, function(key, value) {              
							$('<option>').val('').text('select');
							$('<option>').val(key).text(value).appendTo($("#state"));
						});
					} 
				});
			}
		});

		$("#state").on('change',function() {
			var id = $(this).val();
			$("#loding2").show();
			$("#city").find('option').remove();
			if (id) {
				var dataString = 'id='+ id;
				$.ajax({
					type: "POST",
					url: '<?php echo Router::url(array("controller" => "countries", "action" => "getCities")); ?>',
					data: dataString,
					cache: false,
					success: function(html) {
						$("#loding2").hide();
						$.each(html, function(key, value) {              
							$('<option>').val(key).text(value).appendTo($("#city"));
						});
					} 
				});
			}	
		});
	});

	
</script>