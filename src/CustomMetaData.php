<?php
namespace NM\CMD;


class CustomMetaData {

  public function __construct() {
    //var_dump('hyperawesome');
    add_action( 'wp_head', array($this, 'render') );
    
    add_post_type_support( 'page', 'excerpt' );

  }
  function render() {
     
      //EXCERPT Meta Description
      $excerptMeta =  get_the_excerpt();

      //Content If no Excerpt
      $contentMeta = get_post(get_the_ID())->post_content ;
      $contentMeta = $this->content_filter_vs_shortcodes($contentMeta) ;
      if ($excerptMeta != ""):
        ?>
         <meta name="excerpttest" />
          <meta name="description" content="<?php echo $excerptMeta;?>"/>
        <?php
      else:  
      ?>
          <meta name="description" content="<?php echo $contentMeta;?>"/>
      <?php
      endif;

  }
  function render_title() {
     //Set the Title from the Metabox create for cai
     $titleMeta = $this->get_metabox_string(get_the_ID(),'_wpse_molefitb');
     if ($titleMeta != ""):
       ?>
         <meta name="title" content="<?php echo $titleMeta;?>"/>
       <?php
     else:  
     ?>
         <meta name="title" content="<?php the_title();?>"/>
     <?php
     endif;
  }
  function get_metabox_string($idsent, $stringsent){
    $molefitbcontent = get_post_meta($idsent, $stringsent , true );
    $molefitbcontent = htmlspecialchars_decode($molefitbcontent);
    return $molefitbcontent;
  }
  function content_filter_vs_shortcodes($text = ''){
    $text = do_shortcode( $text );
    $text = wp_trim_words( $text , 70, '...' );
    return $text;
  }

}
