</div>


<div class="footer-wrapper">
        
<?php 

include_once '../includes/functions.inc.php';
//require( __DIR__ . '/includes/functions.inc.php');
//echo("Userid:" . $_SESSION["userid"]);

if ( isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) : ?>
				<?php if ( isAdmin() ) : ?>
					<div>
						<a class="a-default" href="adminpanel.php">Admin Panel</a>
					</div>
				<?php endif; ?>
				<div>
					
				</div>
				
			<?php endif; ?>
            
        </ul>

    </div>

</body>
</html>