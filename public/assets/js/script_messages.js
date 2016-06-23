
var message = "{{ Session::get('message') }}"		

if ("{{ Session::has('message') }}") {
	swal(
		message, 
		"", 
		"success"
		)
}