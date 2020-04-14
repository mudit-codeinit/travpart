<?php $adl_lps = (!empty($args->posts)) ? $args->posts : null; // data are passed to pages wrapped in the $args variable.

?>
<div class="container" id="legalPageContainer">
    <div class="row">
        <div class="col-md-12">            
            <table class="table table-striped">
                <thead>
                <a href="<?= $ADL_LP->adl_lp_plugin_page('allPages'); ?>" class="btn btn-primary btn-xs pull-right"> <span class="glyphicon glyphicon-refresh"></span> Refresh page lists </a>
                <a href="<?= $ADL_LP->adl_lp_plugin_page('createLegalPage'); ?>" id="add_new_LP_button" class="btn btn-primary btn-xs pull-left"> <span class="glyphicon glyphicon-plus-sign"></span> Add New Legal Page </a>

                <tr>
                    <th>Page ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Created at</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
    
                <?php
                $adl_lps = !empty($adl_lps) ? $adl_lps : array();
                if ( count($adl_lps) ) {
                foreach ($adl_lps as $adl_lp) {    ?>
                    <tr id="id-<?= $adl_lp->ID; ?>" data-id="<?= $adl_lp->ID; ?>" >
                        <td><?= $adl_lp->ID; ?></td>
                        <td><a href="<?= get_edit_post_link($adl_lp->ID); ?>" title="Edit this"> <?= $adl_lp->post_title; ?>  </a></td>
                        <td><?= $ADL_LP->author_name_and_post_link($adl_lp->post_author, 'page'); ?></td>
                        <td><?= $ADL_LP->humanDate($adl_lp->ID); ?></td>
                        <td class="text-center"><a class='btn btn-info btn-xs' href="<?= $adl_lp->guid; ?>" title="View page"><span class="glyphicon glyphicon-eye-open"></span> View</a> <a class='btn btn-info btn-xs' href="<?= get_edit_post_link($adl_lp->ID); ?>" title="Edit page"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" data-id="<?= $adl_lp->ID; ?>" class="btn btn-danger btn-xs moveToTrash" title="Move to Trash"><span class="glyphicon glyphicon-trash"></span> Trash</a></td>
                    </tr>
               <?php  }
                } else {
                    echo '<tr> <td> <p> Looks like you have not created any legal pages yet.</p> <button class="btn button-primary" id="CreateALegalPage">Create a new Legal Page</button> </td> </tr>';
                }
                ?>
            </table> <!--ends .table table-striped-->
        </div>   <!--ends .col-md-12-->
    </div> <!--ends .row-->
</div><!--ends .container-->
