<form id="msform" method="post" action="php/create_user_server.php">
	<ul id="progressbar">
		<li class="active">Account Setup</li>
		<li class="">Personal Details</li>
		<li class="">Profile Picture</li>
	</ul>
	<div class="isVisible isField">
		<h2 class="fs-title">Create your account</h2>
		<h3 class="fs-subtitle">This is step 1</h3>
		<input type="text" name="login" onInput="verifPseudo(this)" value="" placeholder="Login" />
		<input type="text" name="email" onInput="verifMail(this)" value="" placeholder="Email" />
		<input type="password" name="password" onInput="verifPassword(this)" value="" placeholder="Password" />
		<input type="password" name="password_confirm" onInput="verifVerifPassword(this)" value="" placeholder="Confirm Password" />
		<input type="button" name="next" class="next action-button next1" value="Next" />
	</div>
	<div class="isInactive isField" >
		<h2 class="fs-title">Personal Details</h2>
		<h3 class="fs-subtitle">This is step 2</h3>
		<input type="text" name="fname" placeholder="First Name" />
		<input type="text" name="lname" placeholder="Last Name" />
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</div>
	<div class="isInactive isField">
		<h2 class="fs-title">Profile Picture</h2>
		<h3 class="fs-subtitle">This is step 3</h3>
		<label>
			<input type="radio" name="profile_picture" value="sources/create_user/dogface.png" id="img1"/>
			<img id="grey" src="sources/create_user/dogface.png" width="200" height="200"/>
		</label>
		<label>
			<input type="radio" name="profile_picture" value="sources/create_user/Bikerface.png" id="img2"/>
			<img id="grey" src="sources/create_user/Bikerface.png" width="200" height="200"/>
		</label>
		<label>
			<input type="radio" name="profile_picture" value="sources/create_user/hooker.png" id="img3"/>
			<img id="grey" src="sources/create_user/hooker.png" width="200" height="200"/>
		</label>
		<label>
			<input type="radio" name="profile_picture" value="sources/create_user/sushiguy.png" id="img4"/>
			<img id="grey" src="sources/create_user/sushiguy.png" width="200" height="200"/>
		</label>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="submit" name="submit" class="submit action-button" value="Submit" />
	</div>
</form>
</div>
