<?php include("header.php") ?>
	<div class="intro">
	<h1>Get On Board With <span class="logo">train!</span></h1>
	   <h2>Sign Up for What's Up, and get:</h2>
	   		<p>Detailed information on upcoming tours, shows and events.</p>
            <p>Our latest songs and upcoming releases.</p>
            <p>Read our latest blogs - no, not just about us - our commentaries about where music and the music industry is going.</p>
            <p>Join the discussion on our forum!</p>
            <img src="images/musicCropBlack.png" class="music" alt="musical notes">
    </div><!--end of intro-->
<?php require ('database_connect.php');
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$error=array();
		if (empty($_POST['name'])) {
			$error[] = 'You did not enter your name.';
		}else{
			$n=mysqli_real_escape_string($dprv,trim($_POST['name']));
		}
		if (!empty($_POST['street'])){
			$se=mysqli_real_escape_string($dprv,trim($_POST['street']));
		}else{
			$se='';
		}
		if (!empty($_POST['state'])){
			$sa=mysqli_real_escape_string($dprv,trim($_POST['state']));
		}else{
			$sa='';
		}
		if (!empty($_POST['zip'])){
			$z=mysqli_real_escape_string($dprv,trim($_POST['zip']));
		}else{
			$z='';
		}
		if (empty($_POST['email'])){
			$error[] = 'You did not enter an email address.';
		}else{
			$e=mysqli_real_escape_string($dprv,trim($_POST['email']));
		}
		if (!empty($_POST['month'])){
			$m=mysqli_real_escape_string($dprv,trim($_POST['month']));
		}else{
			$m='';
		}
		if (!empty($_POST['day'])){
			$d=mysqli_real_escape_string($dprv,trim($_POST['day']));
		}else{
			$d='';
		}
		if (!empty($_POST['year'])){
			$y=mysqli_real_escape_string($dprv,trim($_POST['year']));
		}else{
			$y='';
		}
		if (empty($_POST['preference'])){
			$error[] = 'You did not select an email preference.';
		}else{
			$p=mysqli_real_escape_string($dprv,trim($_POST['preference']));
		}
		if (($_POST['terms'])!="yes"){
			$error[] = 'You did not agree to the terms.';
		}
		if (empty($_POST['type'])){
			$error[] = 'You did not select a message type.';
		}else{
			$t=mysqli_real_escape_string($dprv,trim($_POST['type']));
		}
		if (empty($_POST['message'])){
			$error[] = 'You did not enter a message.';
		}else{
			$mqc=mysqli_real_escape_string($dprv,trim($_POST['message']));
		}
		if (empty($error)){
			$q = "INSERT INTO message (name,street,state,zip,email,month,day,year,preference,type,message) VALUES ('$n','$se','$sa','$z','$e','$m','$d','$y','$p','$t','$mqc')";
			$result = @mysqli_query ($dprv,$q);
			if ($result){
				echo"<h3 class='feedback'>Thanks for your Feedback</h3>";
				exit();
			}else{
				echo '<div class="error"><h2>System Error</h2>
				<p>You could not be registered due to a system error. We apologize for any inconvenience.</p></div>';
				echo '<p>' . mysqli_error($dprv);
			}
			mysqli_close($dprv);
			exit();
		}else{
			echo '<div class="error" style="target="#collapse"><h2>Error!</h2>
			<p> The following error(s) occurred:<br>';
			foreach ($error as $msg) {
				echo " - $msg<br>\n";
			}
			echo "</div>";
		}
		mail("placeholder_email@fakewebsite.con","Train - ".$n,$p,$mqc);
	}
?>
<form id="myform" class="group" action="form.php" method="post">
	<fieldset title="Keeping You In The Know!">
		<legend>Login Info</legend>
		<ol>
			<li>
				<label for="name">Name *</label>
				<input type="text" name="name" id="name" autofocus placeholder="Last, First" required value="<?php if (isset($_POST['name']))echo $_POST['name']; ?>"/>
			</li>
			<li>
				<label for="street">Street Address</label>
				<input type="text" name="street" id="street" title="street" placeholder="Street Address" value="<?php if (isset($_POST['street']))echo $_POST['street']; ?>"/>
			</li>
			<li>
				<label for="state">State</label>
				<select name="state" id="state" title="State" value="<?php if (isset($_POST['state']))echo $_POST['state']; ?>">
					<option value="" selected>select a state</option>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DC">District of Columbia</option>
					<option value="DE">Delaware</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
			</li>
			<li>
				<label for="zip">5-digit Zip Code</label>
				<input type="number" name="zip" id="zip" max="99999" title="Please enter your 5-digit postal zip code." placeholder="12345" value="<?php if (isset($_POST['zip']))echo $_POST['zip']; ?>"/>
			</li>
			<li>
				<label for="email">Email *</label>
				<input type="email" name="email" id="email" required placeholder="someone@example.com" value="<?php if (isset($_POST['email']))echo $_POST['email']; ?>"/>
			</li>
			<li>
				<p>Birthday</p>
				<select name="month" id="month" title="Month" value="<?php if (isset($_POST['month']))echo $_POST['month']; ?>">
					<option value="" selected>select a month</option>
					<option value="Jan.">Jan.</option>
					<option value="Feb.">Feb.</option>
					<option value="Mar.">Mar.</option>
					<option value="Apr.">Apr.</option>
					<option value="May">May</option>
					<option value="Jun.">Jun.</option>
					<option value="Jul.">Jul.</option>
					<option value="Aug.">Aug.</option>
					<option value="Sept.">Sept.</option>
					<option value="Oct.">Oct.</option>
					<option value="Nov.">Nov.</option>
					<option value="Dec.">Dec.</option>
				</select>
			</li>
			<li>
				<select name="day" id="day" title="Day" value="<?php if (isset($_POST['day']))echo $_POST['day']; ?>">
					<option value="" selected>select a day</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
			</li>
			<li>
				<select name="year" id="year" title="Year" value="<?php if (isset($_POST['year']))echo $_POST['year']; ?>">
					<option value="" selected>select a year range</option>
					<option value="before 1945">before 1945: Oldies but Goodies</option>
					<option value="1945-1964">1945-1964: Baby-Boomers</option>
					<option value="1965-1981">1965-1981: Generation X</option>
					<option value="1982-2000">1982-2000: Millenials</option>
					<option value="2001-present">2001-present: Generation Y</option>
				</select>
			</li>
		</ol>
	</fieldset>
	<fieldset title="Other">
		<legend>Other</legend>
		<ol>
			
			<li>
				<div class="grouphead">Email preference *</div>
				<ol>
					<li>
						<input type="radio" name="preference" required  value="HTML" id="htmlpreference"/>
						<label for="htmlpreference">HTML</label>
					</li>
					<li>
						<input type="radio" name="preference" required  value="PlainText" id="textpreference" />
						<label for="textpreference">Plain Text</label>
					</li>
				</ol>
				
			</li>
			<li>
				<label>Terms of This Website:</label>
				<p class="terms">
					I agree not to diss this website on social networks, and instead let people judge for themselves.
				</p>
				<p class="terms">
					I agree to purchase Train's music instead of ripping it off.
				</p>
				<p class="terms">
					I agree that Elaine must have worked very hard on this discography project!
				</p>
			</li>
			<li>
				<div class="grouphead">Well? *</div>
				<ol>
					<li>
						<input type="radio" name="terms" value="yes" id="agree" required />
						<label for="agree">If you say so </label>
					</li>
					<li>
						<input type="radio" name="terms" value="no way" id="disagree" />
						<label for="disagree"> No way</label>
					</li>
				</ol>
			</li>
		</ol>
	</fieldset>
	<fieldset title="Message">
	<legend>Message</legend>
		<ol>
			<li>
				<div class="grouphead">Request Type *</div>
				<ol>
					<li>
						<input type="radio" name="type" value="question" required  id="question" />
						<label for="question">Question</label>
					</li>
					<li>
						<input type="radio" name="type" value="comment" required id="comment" />
						<label for="comment">Comment</label>
					</li>
				</ol>
			</li>
			<li>
				<label for="message">Message *</label>
				<textarea name="message" id="message" value="<?php if (isset($_POST['message']))echo $_POST['message']; ?>"></textarea>
			</li>
		</ol>
		<button type="submit">send</button>
</fieldset>
</form>
<?php include("footer.php"); ?>