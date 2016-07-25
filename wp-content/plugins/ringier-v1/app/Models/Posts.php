<?php
/**
 * Created by PhpStorm.
 * User: Vo sy dao
 * Date: 3/21/2016
 * Time: 4:31 PM
 */
namespace RVN\Models;
use RVN\Library\Images;

class Posts {
    protected      $_wpdb;
    protected      $_table_post_info;

    private static $instance;

    /**
     * Users constructor.
     */
    function __construct(){
        global $wpdb;
        $this->_wpdb           = $wpdb;

        $this->_table_post_info = $wpdb->prefix . "post_info";
    }

    public static function init()
    {
        if ( ! isset( self::$instance )) {
            self::$instance = new Posts();
        }

        return self::$instance;
    }

    /**
     * Lấy bài viết dựa theo thông số truyền vào
     * Document: https://codex.wordpress.org/Class_Reference/WP_Query#Parameters
     *
     * @param array $args
     * @return array|bool
     */
    public function getList($args = array()){
        $args_default = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 20,
            'paged' => 1,
            'orderby' => 'ID',
            'order'   => 'DESC',
            'is_cache' => true,
            'is_paging' => false,
        );

        $args = array_merge($args_default,$args);
        //var_dump($args);
        $cacheId = __CLASS__ . 'getPostBy' . md5(serialize($args));

        if ($args['is_cache']) {
            $result = wp_cache_get($cacheId);
        } else {
            $result = false;
        }

        if ($result == FALSE) {
            $query = new \WP_Query( $args );
            //var_dump($query->request);
            $data = $query->posts;
            $total = $query->found_posts;

            if ($data) {
                foreach ($data as &$val) {
                    $val = $this->getInfo($val);
                }
            }

            $result = array(
                'data' => $data,
                'total' => $total,
            );

            wp_cache_set($cacheId, $result, CACHEGROUP, CACHETIME);
            //set_cache_tag($cacheId, 'getPostBy');
        }

        if($args['is_paging']) {
            $this->_set_paging($result['data'], $result['total'], $args['posts_per_page'], $args['paged']);
        }

        return $result;
    }

    /**
     * Lấy chi tiết thêm của bài viết, có thể truyền post_id hoặc object post.
     *
     * @param $post
     * @return mixed
     */
    public function getInfo($post){
        if(is_numeric($post)){
            $post = get_post($post);
        }

        $cacheId = __CLASS__ . 'getInfo' . $post->ID;
        $result = wp_cache_get($cacheId);
        if($result == false){

            $objImages = Images::init();
            $post->images = $objImages->getPostImages($post->ID, ['thumbnail', 'featured']);
            $post->permalink = get_permalink($post->ID);

            wp_cache_set($cacheId, $result, CACHEGROUP, CACHETIME);
        }

        return $post;
    }

    /**
     * Set paging for wp_paging
     * @param array $data
     * @param int $total
     * @param int $limit
     * @param int $page
     */
    private function _set_paging($data, $total, $limit, $page){
        global $wp_query;
        $wp_query->posts = $data;
        $wp_query->is_paged = ($page >= 1) ? true : false;
        $wp_query->found_posts = $total;
        $wp_query->max_num_pages = ceil($total / $limit);
    }
}
