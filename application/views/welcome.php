Hi, <strong><?php echo $username; ?></strong>! You are logged in now.  <?php echo anchor('/auth/logout/', 'Logout'); print_r($this->session->userdata);  ?>