<?php ?>
<head>
<link rel="stylesheet" type="text/css" href="reaction.css" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- jQuery for Reaction system -->
<script type="text/javascript" src="js/reaction.js"></script>
</head>

 <!-- Reaction system start -->
<div class="reaction-container"><!-- container div for reaction system -->
    <span class="reaction-btn"> 
    <span class="reaction-btn-emo clapping-btn-default"></span> 
    <span class="reaction-btn-text">React</span> 
        <ul class="emojies-box"> <!-- Reaction buttons container-->
            <li class="emoji emo-clap" data-reaction="Clap"></li>
            <li class="emoji emo-love" data-reaction="Love"></li>
            <li class="emoji emo-brokenheart" data-reaction="BrokenHeart"></li>
            <li class="emoji emo-sneez" data-reaction="Sneez"></li>
        </ul>
    </span>
    <div class="like-stat"> <!-- Like statistic container-->
    <span class="like-emo"> <!-- like emotions container -->
    <span class="like-btn-clap"></span> <!-- given emotions like, heart, clap (default:Like) -->
    </span>
    <span class="like-details">Knowband and 10k others</span>
    </div>
</div>
<!-- Reaction system end -->