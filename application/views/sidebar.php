<aside id="sidebar" class="sidebar c-overflow">
    <div class="profile-menu">
        <a href="">
            <div class="profile-pic">
                <img src="/assets/img/default-user-photo.png" alt="">
            </div>


            <div class="profile-info">
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
            </div>
        </a>
    </div>

    <ul class="main-menu">
        <li class="active">
            <a href="<?php echo base_url("/admin/dashboard"); ?>"><i class="zmdi zmdi-home"></i> Dashboard</a>
        </li>
        <li>
            <a href="<?php echo base_url("/Login/logout"); ?>"><i class="zmdi zmdi-time-restore"></i> Logout</a>
        </li>
    </ul>
</aside>

