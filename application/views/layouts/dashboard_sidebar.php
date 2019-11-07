<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
					</ul>
					<div class="search-element">
						<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
						<button class="btn" type="submit"><i class="fas fa-search"></i></button>
						<div class="search-backdrop"></div>
						<!--<div class="search-result">
							<div class="search-header">
							</div>
							<div class="search-item"></div>
						</div>-->
					</div>
				</form>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="<?= base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
							<div class="d-sm-none d-lg-inline-block">Hi, <?= $user_data['user_details']->name; ?></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Logged in 5 min ago</div>
							<a href="features-profile.html" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							<a href="features-activities.html" class="dropdown-item has-icon">
								<i class="fas fa-bolt"></i> Activities
							</a>
							<a href="features-settings.html" class="dropdown-item has-icon">
								<i class="fas fa-cog"></i> Settings
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url() . "auth/logout"; ?>" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="<?= base_url() . "admin"; ?>">HIMATIF</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="<?= base_url() . "admin"; ?>">HM</a>
					</div>
					<ul class="sidebar-menu">
						<li class="menu-header">Dashboard</li>
						<li>
							<a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
						</li>
						<li class="menu-header">Management</li>
						<li>
							<a href="<?= base_url() . "elections"; ?>" class="nav-link">
								<i class="fas fa-vote-yea"></i><span>Elections</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url() . "candidates"; ?>" class="nav-link">
								<i class="fas fa-user-tie"></i><span>Candidates</span>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Users</span></a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url() . "users"; ?>" class="nav-link"><span>List</span></a></li>
								<li><a href="<?= base_url() . "users/logs"; ?>" class="nav-link"><span>Logs</span></a></li>
								<li><a href="<?= base_url() . "users/feedbacks"; ?>" class="nav-link"><span>Feedbacks</span></a></li>
							</ul>
						</li>
						<li class="menu-header">Pages</li>
						<li>
							<a href="<?= base_url() . "admin/logs"; ?>" class="nav-link">
								<i class="fas fa-history"></i><span>Logs</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url() . "admin/settings"; ?>" class="nav-link">
								<i class="fas fa-cogs"></i><span>Settings</span>
							</a>
						</li>
						<li><a href="<?= base_url() . "auth/logout"; ?>" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
					</ul>

					<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
						<a href="https://elections.mrizal.id/" class="btn btn-primary btn-lg btn-block btn-icon-split">
							<i class="fas fa-rocket"></i> Online
						</a>
					</div>
				</aside>
			</div>
