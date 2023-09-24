<form action="/adduser" method="POST">
	@csrf	
	<label for="username"> Username: </label>
	<input type="text" name="username"></br>
	<label for="pw"> Pw: </label>
	<input type="text" name="pw"></br>
	<label for="NIF"> NIF: </label>
    <input type="text" name="nif"></br>
    <label for="email"> Email: </label>
	<input type="text" name="email"></br>
	<label for="name"> Name: </label>
	<input type="text" name="name"></br>
	<label for="surname"> SurName: </label>
	<input type="text" name="surname"></br>
	<label for="phone"> Phone: </label>
	<input type="text" name="phone"></br>
	<label for="add"> address: </label>
	<input type="text" name="add"></br>
	<label for="postal"> postal: </label>
	<input type="text" name="postal"></br>
	<button> Send</button>
</form>
