<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Home</h1>
    </header>
    <div class="tweet-container">
        <?php
        // Assuming you have already connected to the database
        
        // Fetch tweets from the database
        $tweets = mysqli_query($connection, "SELECT * FROM tweets");
        
        // Loop through the tweets and display them
        while ($tweet = mysqli_fetch_assoc($tweets)) {
            $tweetId = $tweet['id'];
            $author = $tweet['author'];
            $content = $tweet['content'];
            $likes = $tweet['likes'];
            $subscribed = $tweet['subscribed'];
        ?>
        <div class="tweet">
            <div class="tweet-author">
                <img src="profile1.jpg" alt="Profile Picture">
                <div class="author-info">
                    <h3><?php echo $author; ?></h3>
                    <button class="subscribe">Subscribe</button>
                </div>
            </div>
            <div class="tweet-content">
                <p><?php echo $content; ?></p>
            </div>
            <div class="tweet-actions">
                <form method="POST" action="like.php">
                    <input type="hidden" name="tweet_id" value="<?php echo $tweetId; ?>">
                    <button type="submit" class="retweet">Retweet</button>
                </form>
                <form method="POST" action="like.php">
                    <input type="hidden" name="tweet_id" value="<?php echo $tweetId; ?>">
                    <button type="submit" class="like">Like (<?php echo $likes; ?>)</button>
                </form>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- Add more tweets here -->
    </div>
</body>
</html>
