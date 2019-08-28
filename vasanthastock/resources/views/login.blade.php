@include('master')

<style type="text/css">
	body {
	  /*background: #76b852; 
	  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
	  background: -moz-linear-gradient(right, #76b852, #8DC26F);
	  background: -o-linear-gradient(right, #76b852, #8DC26F);
	  background: linear-gradient(to left, #76b852, #8DC26F);
	  font-family: "Roboto", sans-serif;
	  -webkit-font-smoothing: antialiased;
	  -moz-osx-font-smoothing: grayscale;*/  
	    background-image: url("assets/images/10.jpg");
   		background-color: #cccccc;    
   		background-repeat: no-repeat;

	}
	.form {
	  position: relative;
	  z-index: 1;
	  background:#3d7359;
	  max-width: 360px;
	  margin: 0 auto 100px;
	  padding: 45px;
	  text-align: center;
	  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);

	}
	.form input {
	  font-family: "Roboto", sans-serif;
	  outline: 0;
	  background: #f2f2f2;
	  width: 100%;
	  border: 0;
	  margin: 0 0 15px;
	  padding: 15px;
	  box-sizing: border-box;
	  font-size: 14px;
	  height: 44px;
	  border-radius: 4px 4px 4px 4px;
	}
	.form #btn {
	  font-family: "Roboto", sans-serif;
	  text-transform: uppercase;
	  outline: 0;
	  background: #4CAF50;
	  width: 100%;
	  border: 0;
	  padding: 15px;
	  color: #FFFFFF;
	  font-size: 14px;
	  -webkit-transition: all 0.3 ease;
	  transition: all 0.3 ease;
	  cursor: pointer;
	}
	.form #btn:hover,.form #btn:active,.form #btn:focus {
	  background: #43A047;
	}
	.form .message {
	  margin: 15px 0 0;
	  color: #b3b3b3;
	  font-size: 12px;
	}
	.form .message a {
	  color: #4CAF50;
	  text-decoration: none;
	}
	.form .register-form {
	  display: none;
	}
</style>
<body background="https://is1-3.housingcdn.com/4f2250e8/d5abdb3282c486e1a16c1cece30d45c4/v6/_m/vasantha_city-hafeezpet-hyderabad-vasantha_group.jpg">
<div class="container">
<div class="row">
	<div class="col-md-12" style="margin-top: 100px;">
		<div class="col-md-8">
			<img src="{{asset('assets/images/group.png')}}" class="img-responsive" style="height:383px;">
		</div>
		<div class="col-md-4">
			<div class="login-page" style="margin-top: 10px;">

			  <div class="form">
			  	<h2 style="text-align: center;font-weight: bold;color:white;margin-top: -5px;">Login Here</h2>
			    <form class="login-form" action="dologin" method="post" style="margin-top: 45px;" autocomplete="off">
			      {{csrf_field()}}
			      <input type="text" name="username" id="username" placeholder="Username" required />
			      <input type="password" name="password" id="password" placeholder="Password" required />
			      <p style="color: red;">{{ implode('', $errors->all(':message')) }}</p>
			      <input type="submit" name="submit" value="Login" id="btn">
			      <!-- <button class="btn btn-primary btn-outline btn-lg" style="border-radius: 4px;" type="submit" name="submit">Submit</button> -->
			    </form>
			  </div>
			</div>
		</div>
	</div>
</div>
</div>
</body>