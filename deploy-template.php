<?php

/**
     * GIT DEPLOYMENT SCRIPT
     *
     * Used for automatically deploying websites via GitHub
     *
     */


// array of commands
$commands = array(
'git pull',
'git status',
//'docker exec -it expensetrimcore_app_1 bash -c "composer install; php artisan migrate; exit"',
);



// exec commands
$output = '';

foreach($commands AS $command){
	
	$tmp = shell_exec($command);
	
	
	$output .= $command;
	
	$output .= htmlentities(trim($tmp)) . "  \n<br /><br />";
	
}

?>


    <?php 
    // Display the output below
    echo $output;
?>
   