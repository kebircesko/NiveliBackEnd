	const form = document.getElementById("loginForm");

		form.addEventListener("submit", function(event){

			let username = document.getElementById("username").value;
			let password = document.getElementById("password").value;

			if(username.trim() === "" || password.trim() === ""){
				alert("Please fill all fields!");
			}

		});