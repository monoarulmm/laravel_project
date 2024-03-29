<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					{{-- <div class="search_bar dropdown">
						<span class="search_icon p-3 c-pointer" data-bs-toggle="dropdown">
							<i class="mdi mdi-magnify"></i>
						</span>
						<div class="dropdown-menu p-0 m-0">
							<form>
								<input class="form-control" type="search" placeholder="Search" aria-label="Search">
							</form>
						</div>
					</div> --}}
				</div>

				<ul class="navbar-nav header-right">
					<li class="nav-item dropdown notification_dropdown">
					     <h4>DIST</h4>
					</li>
					<li class="nav-item dropdown header-profile">
						<a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
							<img src="admin/images/profile/pic1.jpg" width="20" alt="" />
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<form method="POST" action="{{ route('logout') }}">
								@csrf

								<x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
									{{ __('Log Out') }}
								</x-dropdown-link>
							</form>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>