<header id= "header">
		<div class= "top-bar">
			<div class= "container">
				<div class="col-sm-6 col-xs-4" style="padding-left:0px">
					<div class="top-contact">
						<ul class="contact">
							<li><a href=""> Contacts </li>
							<li><a href="#"> Site Map </a></li> 
						</ul>
					</div>
				</div>

				<div class="col-sm-6 col-xs-8">
					<div class="top-account">
						<ul class="account">
							<li><a href="#myModalAccount" data-toggle="modal" data-target="#myModalAccount"><span class="glyphicon glyphicon-user"></span> Create accout </a></li>
							<li><a href="#myModal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Log-in</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
						</div>      
						<div class="checkbox">
							<label><input type="checkbox"> Remember me</label>
						</div>
						
						<p class="text-right"><a href="#">Forgot password?</a></p>
					</div>
					<div class="modal-footer">
						<a href="#" data-dismiss="modal" class="btn">Close</a>
						<a href="#" class="btn btn-primary">Log-in</a>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="myModalAccount">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Create Account</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Full Name</label>
							<input class="form-control" id="exampleInputFullName1" placeholder="Enter full name" type="fullName">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="email">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Alternative Email address</label>
							<input class="form-control" id="exampleInputEmail1" placeholder="Enter alternative email" type="email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Confirm Password</label>
							<input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Personal page url</label>
							<input type="url" name="homepage">
						</div>
					</div>
					<div class="modal-footer">
						<a href="#" data-dismiss="modal" class="btn">Close</a>
						<a href="#" class="btn btn-primary">Create Account</a>
					</div>
				</div>
			</div>
		</div>

		<nav class="navbar navbar-inverse" role="banner">
			<div class="container">
				<div class="navbar header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href=" ">
						<img src="" alt="logo">
					</a>
					<div class="collapse navbar-collapse navbar-right">
						<ul class="nav navbar-nav">
							<li class="active"><a href="">Home</a></li>
							<li class="dropdown"><a href="{{}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users</a>
								<ul class="dropdown-menu">
									<li><a href="#">Top Rated</a></li>
									<li><a href="#">Most Recent</a></li>
								</ul>
							</li>
								
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
								<ul class="dropdown-menu">
									<li><a href="#">Top Rated</a></li>
									<li><a href="#">Best Sellers</a></li>
									<li><a href="#">Most Recent</a></li>
									<li><a href="#">Most Viewed</a></li>
								</ul>
							</li>
							<li><a href="">Market</a></li>
							<li><a href="">About Us</a></li> 
							<li><a href="">Contacts</a></li>                        
						</ul>
					</div>
				</div>
			</div>
		</nav>	
	</header>