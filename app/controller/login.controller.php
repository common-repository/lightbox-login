<?php
include_once( LIGHTBOX_DIR . '/app/view/login.view.php' );
/*****************************************************************************
 * class LoginController                                                     *
 *****************************************************************************/
class LoginController extends Mixer
{
  /***************************************************************************
   * __construct()                                                           *
   ***************************************************************************/
  public function __construct()
  {
    $this->addMixin( new DebugModel() );
    $this->addMixin( new LoginView() );
    add_action( 'template_redirect',
     array( $this, 'check_login' ) ); 
    add_shortcode( 'lightbox_login', 
      array( $this, 'lightbox_login_shortcode' ) );
    add_action( 'wp_enqueue_scripts',
      array( $this, 'load_scripts' ) );
  }
  /***************************************************************************
   * check_login()                                                           *
   ***************************************************************************/
  public function check_login()
  {
     if (isset( $_POST['username'] ) && (isset( $_POST['password'] ))){
       $credentials = array(
         'user_login' => $_POST['username'],
         'user_password' => $_POST['password']
       );
       wp_signon( $credentials );
       wp_redirect( get_permalink() );
     }
  }
  /***************************************************************************
   * lightbox_login_shortcode( $atts, $content = null )                                              *
   ***************************************************************************/
  public function lightbox_login_shortcode( $atts, $content = null )
  {
    $this->debug( 'lightbox_login_shortcode()' );
    if (!is_user_logged_in()){
      $this->debug( 'show login lightbox' );
      $this->render_login( $this );
    } else {
      $this->debug( 'do nothing because user is logged in' );
    }
  }
 /****************************************************************************
  * load_scripts()                                                           *
  ****************************************************************************/
  public function load_scripts()
  {
    $this->debug( 'load_scripts()' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-ui' );
    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_script( 'lightbox-login', LIGHTBOX_URL . 'lightbox-login.js' );
    wp_register_style( 'lightbox-login', LIGHTBOX_URL . 'lightbox-login.css' );
    wp_enqueue_style( 'lightbox-login' );
  } 
}
?>
