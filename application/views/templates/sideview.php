<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
        <!-- Start: Sidebar -->
        <aside id="sidebar_left" class="nano nano-primary">
            <div class="nano-content">

                <!-- sidebar menu -->
                <ul class="nav sidebar-menu">
                    <li class="sidebar-label pt20">System Navigation</li>
                    <li <?php if($screenid == '1.0.0') { echo $sdbaract; } ?>>
                        <a href="<?php echo base_url('dashboard'); ?>">
                            <span class="glyphicons glyphicons-home"></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a>
                    </li>
                    <li <?php if($screenid == '1.1.0') { echo $sdbaract; } ?>>
                        <a href="<?php echo base_url('companies'); ?>">
                            <span class="glyphicons glyphicons-building"></span>
                            <span class="sidebar-title">Companies</span>
                        </a>
                    </li>
                    <li <?php if($screenid == '1.2.0') { echo $sdbaract; } ?>>
                        <a href="<?php echo base_url('outlets'); ?>">
                            <span class="glyphicons glyphicons-bank"></span>
                            <span class="sidebar-title">Outlets</span>
                        </a>
                    </li>
                    <li <?php if($screenid == '1.3.0') { echo $sdbaract; } ?>>
                        <a href="<?php echo base_url('machines'); ?>">
                            <span class="glyphicons glyphicons-imac"></span>
                            <span class="sidebar-title">Machines</span>
                        </a>
                    </li>
                    <li <?php if($screenid == '1.4.0') { echo $sdbaract; } ?>>
                        <a href="<?php echo base_url('tickets'); ?>">
                            <span class="glyphicons glyphicons-sampler"></span>
                            <span class="sidebar-title">Tickets</span>
                        </a>
                    </li>
                    <li <?php if($screenid == '1.5.0') { echo $sdbaract; }; ?>>
                        <a href="<?php echo base_url('reports'); ?>">
                            <span class="glyphicons glyphicons-blog"></span>
                            <span class="sidebar-title">Reports</span>
                        </a>
                    </li>
                    <li class="sidebar-label pt20">System Settings</li>
                    <li <?php if($screenid == '3.1.0') { echo $sdbaract; } ?>>
                        <a href="<?php echo base_url('systeminfo'); ?>">
                            <span class="glyphicons glyphicons-cogwheels"></span>
                            <span class="sidebar-title">System Information</span>
                        </a>
                    </li>
                    <li <?php if($screenid == '3.2.0') { echo $sdbaract; } ?>>
                        <a href="<?php echo base_url('notifications'); ?>">
                            <span class="glyphicons glyphicons-comments"></span>
                            <span class="sidebar-title">Notification Settings</span>
                        </a>
                    </li>
                    <li <?php if($screenid == '3.3.0') { echo $sdbaract; } ?>>
                        <a href="<?php echo base_url('errorcodes'); ?>">
                            <span class="glyphicons glyphicons-warning_sign"></span>
                            <span class="sidebar-title">Error Code Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class="accordion-toggle <?php if($screenid == '3.4.0') { echo $sdbarmen; } if($screenid == '3.5.0') { echo $sdbarmen; }?>" href="#">
                            <span class="glyphicons glyphicons-parents"></span>
                            <span class="sidebar-title">Users Settings</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li <?php if($screenid == '3.4.0') { echo $sdbaract; } ?>>
                                <a href="<?php echo base_url('users'); ?>">
                                    <span class="glyphicons glyphicons-group"></span>System Users</a>
                            </li>
                            <li <?php if($screenid == '3.5.0') { echo $sdbaract; } ?>>
                                <a href="<?php echo base_url('roles'); ?>">
                                    <span class="glyphicons glyphicons-keys"></span>Roles</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if($screenid == '3.6.0') { echo $sdbaract; } ?>>
                        <a href="<?php echo base_url('faq'); ?>">
                            <span class="glyphicons glyphicons-circle_question_mark"></span>
                            <span class="sidebar-title">FAQ Screen Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>