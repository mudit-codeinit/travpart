<!--Tab: Create or edit page template-->
<?php

$adl_lp_templates = (!empty($args)) ? $args : null; // data are passed to pages wrapped in the $args variable.

?>
<div class="container" id="adl_legal_template_container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <a href="<?= $ADL_LP->adl_lp_plugin_page('editTemplates'); ?>" class="btn btn-primary btn-xs pull-right"> <span class="glyphicon glyphicon-refresh"></span> Refresh templates lists </a>
                <a href="<?= $ADL_LP->adl_lp_plugin_page('', 'adl-create-template'); ?>" id="createLPTemplateBtn" class="btn btn-primary btn-xs pull-left"> <span class="glyphicon glyphicon-plus-sign"></span> Add New Legal Page Template </a>
                <tr>
                    <th>Template id</th>
                    <th>Template Name</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>

                <?php
                if ( count($adl_lp_templates) ) {


                    foreach ($adl_lp_templates as $adl_lp) {
                    ?>
                        <tr id="id-<?= $adl_lp->id; ?>" data-id="<?= $adl_lp->id; ?>" >
                            <td><?= $adl_lp->id; ?></td>
                            <td><a href="<?php $ADL_LP->adl_lp_action_link($adl_lp->id); ?>" title="Edit this"> <?= $adl_lp->name; ?>  </a></td>
                            <td class="text-center"><a class='btn btn-info btn-xs' href="<?php $ADL_LP->adl_lp_action_link($adl_lp->id); ?>" title="Edit Template"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="<?php $ADL_LP->adl_lp_action_link($adl_lp->id, 'delete'); ?>" data-id="<?= $adl_lp->id; ?>" class="btn btn-danger btn-xs deleteLegalTemplate" title="Delete it permanently"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
                        </tr>

                    <?php  }
                }else {
                    echo '<tr> <td> <p> Looks like you have not created any legal pages yet.</p> <button class="btn button-primary" id="CreateALegalPage">Create a new Legal Page</button> </td> </tr>';
                }
                ?>
            </table> <!--ends .table table-striped-->
        </div>   <!--ends .col-md-12-->
    </div> <!--ends .row-->
</div><!--ends .container-->






