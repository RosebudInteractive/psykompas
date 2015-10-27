    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
        <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
        </script>
        <div id="true_loadmore" class="knopkaR btnsmallR">Загрузить ещё</div>
    <?php endif; ?>