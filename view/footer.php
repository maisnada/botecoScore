<?php

echo '

<div class="row" style="margin-top: 60px; bottom:0; ">

	<div class="col-md-12 text-center">	

	<p style="margin:0; padding:0;"><small>&copy; BotecoScore ' . (new \DateTimeImmutable())->format('Y') . ' <a href="mailto:admin@botecoscore.com.br"><i class="far fa-envelope"></i></a><small></p>

	</div>

</div>



</div>

</body>

<script>

let btns_estatistica = document.querySelectorAll(".btn_estatistica");

for (var i = 0; i < btns_estatistica.length; i++) {
    btns_estatistica[i].addEventListener("click", function(event) {
		
		let id = event.target.getAttribute("data-id");

		let load = document.querySelector("#cam_load_" + id);

		let cam = document.querySelector("#cam_estatisticas_" + id);
		
		cam.innerHTML= "";

		load.classList.remove("hide");
		load.classList.add("show");	
		
		event.preventDefault();

		sendRequest(id)
		.then(data => {
			load.classList.remove("show");
			load.classList.add("hide");
			cam.innerHTML= data;
		})
		.catch(data => {			
			load.classList.remove("show");
			load.classList.add("hide");
			cam.innerHTML=data;
		});
    });
}

async function sendRequest(id){

	let response = await fetch("/estatistica?id=" + id);

	let data = response.text();

	if(response.ok)
		return data;

	throw new Error();
	
}

function handleClick(event){

	console.log(event.getAttribute("data-id"));

	elmnt = document.getElementById(event.getAttribute("data-id"));

	elmnt.scrollIntoView({block: "start", behavior: "smooth"});
}

</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
	integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	crossorigin="anonymous"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
	integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	crossorigin="anonymous"></script>

</html>
';
