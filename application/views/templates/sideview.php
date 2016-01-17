<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
        <!-- Start: Sidebar -->
        <aside id="sidebar_left" class="nano nano-primary">
            <div class="nano-content">
				<ul class="nav sidebar-menu">
				<?php $calt = 0; $navcnt = 0; $syscnt = 0; $usrcnt =0; foreach($sidebar0 as $sidebar1) {
					switch ($sidebar1['screen']){
						case "1.0.0":
							if ($navcnt == 0) {
								echo '<li class="sidebar-label pt20">System Navigation</li>';
								$navcnt++;
							}
							echo '<li ';
							if($screenid == '1.0.0') { echo $sdbaract; }
							echo '><a href="'.base_url('dashboard').'">';
							echo '<span class="glyphicons glyphicons-home"></span><span class="sidebar-title">Dashboard</span></a></li>';
						break;
						case "1.1.0":
							if ($navcnt == 0) {
								echo '<li class="sidebar-label pt20">System Navigation</li>';
								$navcnt++;
							}
							echo '<li ';
							if($screenid == '1.1.0') { echo $sdbaract; }
							echo '><a href="'.base_url('companies').'">';
							echo '<span class="glyphicons glyphicons-building"></span><span class="sidebar-title">Companies</span></a></li>';
						break;
						case "1.2.0":
							if ($navcnt == 0) {
								echo '<li class="sidebar-label pt20">System Navigation</li>';
								$navcnt++;
							}
							echo '<li ';
							if($screenid == '1.2.0') { echo $sdbaract; }
							echo '><a href="'.base_url('outlets').'">';
							echo '<span class="glyphicons glyphicons-bank"></span><span class="sidebar-title">Outlets</span></a></li>';
						break;
						case "1.3.0":
							if ($navcnt == 0) {
								echo '<li class="sidebar-label pt20">System Navigation</li>';
								$navcnt++;
							}
							echo '<li ';
							if($screenid == '1.3.0') { echo $sdbaract; }
							echo '><a href="'.base_url('machines').'">';
							echo '<span class="glyphicons glyphicons-imac"></span><span class="sidebar-title">Machines</span></a></li>';
						break;
						case "1.4.0":
							if ($navcnt == 0) {
								echo '<li class="sidebar-label pt20">System Navigation</li>';
								$navcnt++;
							}
							echo '<li ';
							if($screenid == '1.4.0') { echo $sdbaract; }
							echo '><a href="'.base_url('tickets').'">';
							echo '<span class="glyphicons glyphicons-sampler"></span><span class="sidebar-title">Tickets</span></a></li>';
						break;
						case "1.5.0":
							if ($navcnt == 0) {
								echo '<li class="sidebar-label pt20">System Navigation</li>';
								$navcnt++;
							}
							echo '<li ';
							if($screenid == '1.5.0') { echo $sdbaract; }
							echo '><a href="'.base_url('reports').'">';
							echo '<span class="glyphicons glyphicons-blog"></span><span class="sidebar-title">Reports</span></a></li>';
						break;
						
						case "3.1.0":
							if ($syscnt == 0) {
								echo '<li class="sidebar-label pt20">System Settings</li>';
								$syscnt++;
							}
							echo '<li ';
							if($screenid == '3.1.0') { echo $sdbaract; }
							echo '><a href="'.base_url('systeminfo').'">';
							echo '<span class="glyphicons glyphicons-cogwheels"></span><span class="sidebar-title">System Information</span></a></li>';
						break;
						case "3.2.0":
							if ($syscnt == 0) {
								echo '<li class="sidebar-label pt20">System Settings</li>';
								$syscnt++;
							}
							echo '<li ';
							if($screenid == '3.2.0') { echo $sdbaract; }
							echo '><a href="'.base_url('notifications').'">';
							echo '<span class="glyphicons glyphicons-comments"></span><span class="sidebar-title">Notification Settings</span></a></li>';
						break;
						case "3.3.0":
							if ($syscnt == 0) {
								echo '<li class="sidebar-label pt20">System Settings</li>';
								$syscnt++;
							}
							echo '<li ';
							if($screenid == '3.3.0') { echo $sdbaract; }
							echo '><a href="'.base_url('errorcodes').'">';
							echo '<span class="glyphicons glyphicons-warning_sign"></span><span class="sidebar-title">Error Code Settings</span></a></li>';
						break;
						case "3.4.0":
							if ($syscnt == 0) {
								echo '<li class="sidebar-label pt20">System Settings</li>';
								$syscnt++;
							}
							echo '<li ';
							if($screenid == '3.4.0') { echo $sdbaract; }
							echo '><a href="'.base_url('users').'">';
							echo '<span class="glyphicons glyphicons-group"></span><span class="sidebar-title">System Users</span></a></li>';
						break;
						case "3.5.0":
							if ($syscnt == 0) {
								echo '<li class="sidebar-label pt20">System Settings</li>';
								$syscnt++;
							}
							echo '<li ';
							if($screenid == '3.5.0') { echo $sdbaract; }
							echo '><a href="'.base_url('roles').'">';
							echo '<span class="glyphicons glyphicons-keys"></span><span class="sidebar-title">User Roles</span></a></li>';
						break;
						case "3.6.0":
							if ($syscnt == 0) {
								echo '<li class="sidebar-label pt20">System Settings</li>';
								$syscnt++;
							}
							echo '<li ';
							if($screenid == '3.6.0') { echo $sdbaract; }
							echo '><a href="'.base_url('faq').'">';
							echo '<span class="glyphicons glyphicons-circle_question_mark"></span><span class="sidebar-title">FAQ Screen Settings</span></a></li>';
						break;
					}
				};?>
				</ul>
            </div>
        </aside>