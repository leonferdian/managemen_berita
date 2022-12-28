<div class="nano">
    <div class="nano-content">
        <nav id="menu" class="nav-main" role="navigation">
            <ul class="nav nav-main">
                <?php
                $query = $this->db->query("SELECT * FROM menu order by menu_id asc");
                foreach ($query->result() as $row) {
                    $menu_label = trim($row->menu_label);
                    $url = $row->url;
                    echo '<li>
                            <a href="' . site_url($url) . '">
                                <i class="'.$row->icon.'" aria-hidden="true"></i>
                                <span>'.$menu_label.'</span>
                            </a>
                        </li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>