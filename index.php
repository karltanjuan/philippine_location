<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Philippine Location</title>
</head>
<body>

	<label for="">State/Province</label>
	<select class="provinces">
	</select>
	<br><br>
	<label for="">City/Municipality</label>
	<select class="cities">
		<option disabled selected>Please select state/province first</option>
	</select>
	<br><br>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

	<script>

		$.getJSON('provinces.json', function(result) {
			var htm = "";
			htm += "<option disabled selected>Please select state/province</option>";
			$.each(result, function(x,y){
				htm += "<option value='"+y.name+"' data-key='"+y.key+"'>"+y.name+"</option>";

		    });

		    $('.provinces').html(htm);

		});

		$(document).on('change', '.provinces', function() {
			var htm = "";
			var province_key = $('.provinces option:selected').attr('data-key');
			$.getJSON('cities.json', function(result) {
				$.each(result, function(x,y){
					if (province_key == y.province) {
						htm += "<option value='"+y.name+"' >"+y.name+"</option>";
					}
			    });

			    $('.cities').html(htm);
			});
		});


	</script>
</body>
</html>