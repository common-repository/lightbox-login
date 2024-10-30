<?php
/*****************************************************************************
 * class LoginView                                                           *
 *****************************************************************************/
class LoginView
{
 /****************************************************************************
  * render_login( $controller )                                              *
  ****************************************************************************/
  public function render_login( $controller )
  {
    $controller->debug( 'render_login( $controller )' );
    ob_start();
    ?>
      <div class='dialog app'
           title='<h1>Login</h1><h2>Please log in</h2>'>
        <div class='panel'>
          <form name='lightbox-login-form'
                id='lightbox-login-form'
                method='POST'>
            <article>
              <div class='username'>
                <label for='username'>User Name:</label>
                <input id='username'
                       name='username'
                       type='text'
                       value=''
                       placeholder='User Name'>
                <label for='password'>Password:</label>
                <input id='password'
                       name='password'
                       type='password'
                       value=''
                       placeholder='Password'>
              </div>
            </article>
            <footer>
              <button id='lightbox-login-submit'
                      class='blue submit'>
                <span>Login</span>
              </button>
            </footer>
          </form>
        </div>
      </div>
    <?php
    echo ob_get_clean();
  }
}
?>
