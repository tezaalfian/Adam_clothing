<section class="content-header">
	<h1>
		<?= ucfirst($this->uri->segment(2));?>
	</h1>
	<ol class="breadcrumb">
		<?php $i=0; ?>
        <?php foreach ($this->uri->segments as $segment) : ?>
            <?php 
                $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
                $is_active =  $url == $this->uri->uri_string;
            ?>
            <li class="<?php echo $is_active ? 'active': '' ?>">
                <?php if($is_active): ?>
                    <?php echo ucfirst($segment) ?>
                <?php else: ?>
                <a href="<?php echo base_url($url) ?>"><?php echo ucfirst($segment) ?></a>
                <?php endif; ?>
                <?php if (++$i == 3) break;?>
            </li>
        <?php endforeach; ?>
	</ol>  
</section>