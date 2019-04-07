
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {

    		$('#dustbinid').on('keyup', function() {
    			var value = $('#dustbinid').val();

	    		if (value != '') {
	    			$.ajax({
	    				method: 'POST',
	    				url: '<?php echo WEBSITE_URL . "ajax/search.php"; ?>',
	    				data: {query: value},
	    				success: function(data) {
	    					$('#address-list').fadeIn();
	    					$('#address-list').html(data);
	    				}
	    			});
	    		} else {
					$('#address-list').fadeOut();	    			
	    		}
    		});

    		$('#address-list').on('click', 'li', function() {
    			$('#dustbinid').val($(this).text());
    			$('#address-list').fadeOut();
    		});
    	});
    </script>
  </body>
</html>