<div class="x_top_header_wrapper float_left">
		<div class="container">
			<div class="x_top_header_left_side_wrapper float_left">
				<p>Call Us : 0814 251 152</p>
			</div>
			<div class="x_top_header_right_side_wrapper float_left">
				<div class="x_top_header_social_icon_wrapper">
					<ul>
						{{-- <li><a href="#"><i class="fa fa-facebook-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-twitter-square"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-instagram"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-linkedin-square"></i></a>
						</li> --}}
					</ul>
				</div>
				<div class="x_top_header_all_select_box_wrapper">
					<ul>
						{{-- <li class="language">
							<select class="myselect">
								<option>EN</option>
								<option>RO</option>
								<option>IT</option>
							</select> <i class="fa fa-globe"></i>
						</li> --}}
						{{-- <li class="usd">
							<select class="myselect">
								<option>Register</option>
								<option>EUR</option>
								<option>CAD</option>
							</select> <i class="fa fa-money"></i>
						</li> --}}
						@if (Auth::user())
						<li class="login"> <a href="{{ url('dashboard') }}"><i class="fa fa-power-off"></i> &nbsp;&nbsp;Dashboard</a>
						</li>
							
						@else
						<li class="login"> <a href="{{ url('login') }}"><i class="fa fa-power-off"></i> &nbsp;&nbsp;login</a>
						</li>
						<li>
							<div class="dropdown-wrapper menu-button"> 
								<a class="menu-button" href="#">Daftar</a>
								<div class="drop-menu"> 
									
									<a class="menu-button" style="padding: 5px; text-align: center; color: black;font-size: 1rem" href="{{ url('auth/register') }}">Daftar Rental CV</a>
									{{-- <a class="menu-button" style="padding: 5px; text-align: center; color: black;font-size: 1rem" href="{{ url('auth/register') }}">Daftar Rental Perorangan</a> --}}
									<a class="menu-button" style="padding: 5px; text-align: center; color: black;font-size: 1rem" href="{{ url('auth/register-customer') }}">Daftar Penyewa</a>
								</div>
							</div>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>