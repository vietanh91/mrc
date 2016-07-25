<?php

get_header();
$list_journey_type = $list_journey_type ? $list_journey_type : array();

view('journey/quick-search');
?>

<div class="container">
    <div class="row">
        <h1 class="col-xs-12 col-sm-12 tile-main">All Journeys
            <br> <img src="<?php echo VIEW_URL . '/images/line.png' ?>">
        </h1>

        <?php if($list_journey_type['data']){
            foreach ($list_journey_type['data'] as $v){
                
                ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="box-journey">
                        <div class="image">
                            <a href="<?php echo $v->permalink ?>" title="<?php echo $v->post_title ?>">
                                <img src="<?php echo $v->images->featured ?>" alt="<?php echo $v->post_title ?>" class="lazy">
                            </a>
                        </div>
                        <div class="desc">
                            <a href="<?php echo $v->permalink ?>" class="title" title="<?php echo $v->post_title ?>"><?php echo $v->post_title ?></a>
                            <p><?php echo cut_string_by_char($v->post_content,150) ?></p>
                            <a href="<?php echo $v->permalink ?>" class="explore" title="">Explore</a>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>


    </div>
</div>


<?php get_footer() ?>