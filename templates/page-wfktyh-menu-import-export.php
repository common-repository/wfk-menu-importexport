<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Retrieve menu locations.
if ( current_theme_supports( 'menus' ) ) {
    $locations = get_registered_nav_menus();
    $menu_locations = get_nav_menu_locations();
}
$nav_menus = wp_get_nav_menus();
?>
<div class="wrap">
    <h1></h1>
</div>
<div class="wrap">
    <div class="wfp_menu_import_export_container">
        <h1><?php esc_html_e("Menu Import Export","wfk-menu-importexport"); ?></h1>   
        <div class="wfk_vertical_tabs_container">
            <div class="tabs-btn mie-lg-4">
                <ul class="nav nav-pills">
                    <li class="tab-button active" >
                        <a href="#"  data-tab="wfk-export-content"><?php esc_html_e("Export","wfk-menu-importexport") ?></a>
                    </li>
                    <li class="tab-button">
                        <a href="#"  data-tab="wfk-import-content"><?php esc_html_e("Import","wfk-menu-importexport") ?></a>
                    </li>
                </ul>
            </div>

            <div class="mfk-tabconten_wrap mie-lg-8">
                <div id="wfk-export-content" class="mfk-mie_tabcontent default">
                    <div class="wfp_importexport card">
                        <label for="select-menu-import-export" class="selected-menu"
                            style="display: block;"><?php esc_html_e( 'Select a menu to Export:','wfk-menu-importexport' );?></label>

                        <?php 
                        if(is_array($nav_menus) && !empty($nav_menus)){
                        ?>
                        <form action="" method="post">                     
                            <select name="menu" id="select-menu-import-export" class="wfp-mie-select">
                                <option value=""><?php esc_html_e( "Select Menu", "wfk-menu-importexport" )?></option>
                                <?php if(is_array($nav_menus)){ foreach (  $nav_menus as $_nav_menu ): ?>
                                <option value="<?php echo esc_attr( $_nav_menu->term_id ); ?>">
                                    <?php
                                        printf(esc_html__("%s",'wfk-menu-importexport'), $_nav_menu->name ) ;
                                    ?>
                                </option>
                                <?php endforeach; }?>
                            </select>
                            <?php
                                $menu_items = wp_get_nav_menu_items( "main-menu" );
                            ?>
                            <div class="wfk_menuie_lists">
                                <ul id="export-menu_item" class="wfk-menu-item">
                                    <?php 
                                        if(is_array($menu_items)){
                                            foreach ( $menu_items as $menu_item ) { ?>
                                            <li><a href='<?php echo esc_url($menu_item->url); ?>'> <?php printf(esc_html__("%s","wfk-menu-importexport"), $menu_item->title ) ; ?> </a></li>
                                            <?php } 
                                        } 
                                    ?>
                                </ul>
                                <a href="#" class="wfk_menu_export_btn" id="wfk_menu_export_btn"><?php esc_html_e("Export","wfk-menu-importexport") ?></a>
                            </div>
                        </form>
                        <?php }else{
                            ?>
                            <p><?php esc_html_e("There is no nav menu for export!","wfk-menu-importexport") ?></p>
                            <?php                          
                        } ?>
                    </div>
                </div>
                <div id="wfk-import-content" class="mfk-mie_tabcontent">
                    <div class="container">
                        <div class="card">
                            <h3><?php esc_html_e("Upload Menu Json File","wfk-menu-importexport") ?></h3>
                            <div class="warning"></div>
                            <form  id="wfk_mie_import_form" method="post" enctype="multipart/form-data">
                                     <div class="drop_box">
                                     <input type="file" hidden accept=".json" name="mie_import_file" id="menuJsonFile" style="display:none;">
                                        <header id="fileHeaderText">
                                            <h4><?php esc_html_e("Select File Here","wfk-menu-importexport") ?></h4>
                                        </header>
                                        <div class="menu_name_input">
                                             <p><?php esc_html_e("Files Supported Only Json","wfk-menu-importexport") ?></p>    
                                        </div>
                                        <button class="btn chooseMenuFile"><?php esc_html_e("Choose File","wfk-menu-importexport") ?></button>
                                    </div>
                                <button type="submit" class="wfk_menu_import_btn" id="wfk_menu_import_btn"><?php esc_html_e("Import","wfk-menu-importexport") ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>