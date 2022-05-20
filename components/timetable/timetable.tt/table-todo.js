
				$(document).ready(function(){

					$(document).on("click", "#delinst", function() {
					
						let urli = window.location.href;
					
					
						$.ajax({
							url: '/local/components/timetable/timetable.tt/inst.php',
							method: 'get',
							dataType: 'html',
							cache: false,
							data: {},
							success: function(data){

						}


            
					});


          location.reload();

					
					});
					
					});