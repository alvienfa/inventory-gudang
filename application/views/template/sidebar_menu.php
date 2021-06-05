<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Dashboard User</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm ">
            <a href="/">
                <img class="img-fluid p-3" src="https://www.coronabuster.id/wp-content/uploads/2020/04/CB-1.1.png" alt="logo">
            </a>
        </div>
        <ul class="sidebar-menu">
            <?php
            if ($role == 5) {
                $this->load->view('template/sidebar/atasan');
            } else {
                $this->load->view('template/sidebar/user');
            }
            ?>
        </ul>
    </aside>
</div>