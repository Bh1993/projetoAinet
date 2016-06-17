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
							@if(!Auth::check())
							<li><a href="{{url('auth/register')}}"><span class="glyphicon glyphicon-user"></span> Create accout </a></li>
							<li><a href="{{url('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
							@else
							<li><a href="{{route('farmersmarket.user-myprofile',['id' => Auth::user()->id])}}"><span class="glyphicon glyphicon-cog"></span> My Profile </a></li>
							<li><a href="{{route('farmersmarket.user-my-advertisements',['id' => Auth::user()->id])}}"><span class="glyphicon glyphicon-book"></span> My Advertisements </a></li>
							<li><a href="{{route('farmersmarket.user-my-bids',['id' => Auth::user()->id])}}"><span class="glyphicon glyphicon-shopping-cart"></span> My Bids </a></li>
							@if(Auth::user()->admin == 1 && Auth::user()->blocked == 0)
							<li><a href="{{url('users')}}"><span class="glyphicon glyphicon-log-in"></span> Dashboard </a></li>
							@endif
							<li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>	
							@endif
						</ul>
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
						<li class="active"><a href="{{url('farmersmarket')}}">Home</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users</a>
							<ul class="dropdown-menu">
								<li><a href="{{url('users-toprated')}}">Top Rated</a></li>
								<li><a href="{{url('users-topsellers')}}">Best Sellers</a></li>
								<li><a href="{{url('users-all')}}">All Users</a></li>
							</ul>
						</li>

						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Advertisements</a>
							<ul class="dropdown-menu">
								<li><a href="{{url('advertisements-mostrecent')}}">Most Recent</a></li>
								<li><a href="{{url('advertisements-all')}}">All Advertisements</a></li>
							</ul>
						</li>
						<li><a href="{{url('farmersmarket-market-bids')}}">Market</a></li>
						<li><a href="">About Us</a></li> 
						<li><a href="">Contacts</a></li>

					<form class="navbar-form navbar-left" role="search" action="{{route('farmersmarket.search')}}" method="get">
						<div class="form-group">
							<input type="text" name="search" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					                     
					</ul>
				</div>
			</div>
		</div>
	</nav>	
</header>