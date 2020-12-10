<div class="container docs__header margin-bottom-3">
	<div class="row">
		<div class="gr-12">
			<div class="docs__chapter"></div>
			<div class="docs__title">Form</div>
		</div>
	</div>
</div>

<div class="container position-relative margin-bottom-3">
	<div class="row">
		<div class="gr-6@md gr-12">
			<form>

				<div class="row">

					<div class="gr-12">
						<input type="email" placeholder="Input type Email">
						<input type="text" placeholder="Input type Text">
						<input type="password" placeholder="Input type Password">
						<input type="date" id="birthday" name="birthday" placeholder="Input type Date">
						<input type="search" id="gsearch" name="gsearch" placeholder="Input type Search">
						<input type="number" id="quantity" name="quantity" placeholder="Input type Number">
						<input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="Input type Tel">
						<input type="url" id="homepage" name="homepage" placeholder="Input type Url">
						<textarea name="description" placeholder="Textarea"></textarea>
						<input type="range" id="vol" name="vol" min="0" max="50">
					</div>

					<div class="gr-12">
						<label for="cars">Choose a car:</label>
						<select id="cars" name="carlist" form="carform">
							<option value="volvo">Volvo</option>
							<option value="saab">Saab</option>
							<option value="opel">Opel</option>
							<option value="audi">Audi</option>
						</select>
					</div>

					<div class="gr-12 margin-bottom-1">
						<input type="radio" id="male" name="gender" value="male">
						<label for="male">Male</label><br>
						<input type="radio" id="female" name="gender" value="female">
						<label for="female">Female</label><br>
						<input type="radio" id="other" name="gender" value="other">
						<label for="other">Other</label>
					</div>

					<div class="gr-12 margin-bottom-1">
						<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
						<label for="vehicle1"> I have a bike</label><br>
						<input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
						<label for="vehicle2"> I have a car</label><br>
						<input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
						<label for="vehicle3"> I have a boat</label>
					</div>

					<div class="gr-12">
						<label for="myfile">Select a file:</label>
						<input type="file" id="myfile" name="myfile">
					</div>

					<div class="gr-12">
						<button type="submit" class="button">Submit</button>
					</div>

				</div>
			</form>
		</div>
	</div>
</div>
