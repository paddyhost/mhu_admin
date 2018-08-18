<header id="header" class="clearfix" data-current-skin="blue">
    <ul class="header-inner">
        <li class="logo hidden-xs">
            <a href="/admin/dashboard">Mobile Health Unit</a>
        </li>

        <li class="pull-right">
            <ul class="top-menu">
                <li>
                    <a href="/admin/newregistration" class="bgm-green"><span class="tm-label tm-icon"><i class="zmdi zmdi-plus-square zmdi-hc-fw"></i>&nbsp;New Registration</span></a> 
                </li>
                <li>
                    <a href="/admin/dashboard"><span class="tm-label tm-icon">Dashboard</span></a> 
                </li>
                <li>
                    <a href="/admin/patientlist"><span class="tm-label">Patient List</span></a> 
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" data-toggle="dropdown">
                    <span class="tm-label tm-icon">
                        <i class="zmdi zmdi-account-circle zmdi-hc-fw" style="font-size: 18px"></i>
                        <?php  
               $name;
                    if($this->session->has_userdata('user'))
                    {
                            $name = $this->session->user;
            
        }
        else
        {
            
            redirect(base_url(), 'refresh');
        }

         
         echo $name[0]->user_name;
          

             ?>
                    </span>
                    </a>
                    <ul class="dropdown-menu dm-icon pull-right">
                        <li>
                            <a href="<?php echo base_url("/Login/logout"); ?>"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</header>

