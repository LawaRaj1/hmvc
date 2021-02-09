
<div id="container">
	<h1 style="text-align: start;">Hello Everyone! Welcome to HMVC Test Project.</h1>

	<div id="body">
		<p style="text-align: end;">Please take this project as the testing project for the Codeigniter HMVC.</p>
	</div>
	<input type="hidden" name="frontend_value" value="yes" id="backend_value">
	<input type="hidden" name="backend_value" value="yes" id="frontend_value">

	<div class="button_wrap">
		<button type="button" class="btn_primary backend_button">Backend
		</button>
		<button type="button" class="btn_primary frontend_button">Frontend
		</button>
	</div>
	
	<div class="row">
		<div class="col-sm-6">
		<div class="backend_message"></div>
		<div class="backend_success_message"></div>
						
		</div>
		<div class="col-sm-6" style="text-align:right;">
		<div class="frontend_message"></div>
		<div class="frontend_success_message"></div>
						
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		// console.log('test')
    	var baseUrl = "<?php echo base_url();?>";
    	// console.log(baseUrl)
		$(document).on("click",".backend_button",function() {
    		// alert("backend button has been clicked");
    		var backend_value = $("#backend_value").val();
    		// alert(backend_value);

    		$.ajax({
           		url: baseUrl+'backend/post_backend',
           		type: 'POST',
           		data: {
           				backend_value:backend_value,
           			},
           			error: function() {
              			alert('Something is wrong in backend method.');
           			},
           			success: function(data) {
           				// alert(data)
                		if(data.status === 'success'){
                			$(".backend_message").html(data.message)
                			$(".backend_success_message").append(data.view)
                			// window.location.href="<?php echo base_url('backend');?>";
                		}else{
                			$(".backend_message").html(data.message)
                		}
           		}
        	});

		});


		$(document).on("click",".frontend_button",function() {
    		// alert("frontend button has been clicked");
    		var frontend_value = $("#frontend_value").val();
    		// alert(frontend_value);
    		$.ajax({
           		url: baseUrl+'frontend/get_frontend',
           		type: 'GET',
           		data: {
           				frontend_value:frontend_value,
           			},
           			error: function() {
              			alert('Something is wrong in frontend method.');
           			},
           			success: function(data) {
           				// alert(data)
                		if(data.status === 'success'){

                			$(".frontend_message").html(data.message)
                			$(".frontend_success_message").append(data.view)

                			// window.location.href="<?php echo base_url('frontend');?>";
                		}else{
                			$(".frontend_message").html(data.message)
                		}
           			}
        		});
		});
	});
</script>

