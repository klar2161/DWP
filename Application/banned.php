
<?php 
ob_start();
define('USER_LEVEL_BANNED' , '2');

function isBanned() {
    if ( isset( $_SESSION['useruid'] ) && $_SESSION['user_level'] == 2 ) {
        return header('location:banned_message.php');
    } else {
        return false;
    }
}

if ( isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) : ?>
				<?php if ( isBanned() ) : ?>
					<div>
						<h1>You are banned bratan,unlucky</h1>
					</div>
				<?php endif; ?>
				<div>
					
				</div>
				
			<?php endif; ?>

