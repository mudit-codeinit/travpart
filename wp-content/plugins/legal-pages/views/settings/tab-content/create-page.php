<!--Tab: Create page content-->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="adl_lp_title">Add New Legal Page</h1>
            <form action="" method="post" id="addNewLegalPage">
                <div class="form-group">
                    <input type="text" name="lp_title" class="form-control" id="lp_title" placeholder="Enter a title or Choose a Template from the right">
                </div>
                <?php
                    $content = ( isset( $_POST['adl_lp_content']  ) ) ? wp_kses_post( $_POST['adl_lp_content'] ): 'Enter some content or Choose a template from the right side to edit and publish. After saving the page, you can find it in the "All Legal Pages" tab or you can find it under WordPress page menu';
                    wp_editor($content, 'adl_lp_content', array('editor_height' => 400));
                ?>
                <button type="submit" class="btn btn-primary btn-outline-rounded"> Save Page</button>
                <?php wp_nonce_field( $ADL_LP->nonceAction(), $ADL_LP->nonceName()); ?>
            </form>
        </div> <!--ends .col-md-8 left column-->



        <div class="col-md-4">
            <div id="ChooseTemplate" class="postbox">
                <h3><span class='dashicons dashicons-admin-generic'></span> Choose a Template</h3>
                <?php
                global $wpdb;
                // show all templates
                $sql = 'SELECT * from '.$ADL_LP->template_table_name .' LIMIT 30';
                $results = $wpdb->get_results($sql);
                $html ='';
                foreach ( $results as $result   ) {
                    $html .= "<p><span class='dashicons dashicons-arrow-right
'></span> <a href='#' id='id-{$result->id}' data-id='{$result->id}'>{$result->name} </a></p>";
                }
                echo $html;
                ?>
            </div>
        <hr>

        <!--Show upgrade feature notice-->
        <?php $ADL_LP->loadView('upgrade-template-lists'); ?>

        </div>  <!--ends .col-md-4 right column-->

    </div>
</div>



