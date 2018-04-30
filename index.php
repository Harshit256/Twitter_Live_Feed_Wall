<?php 
$counter = 0;
require_once("twitteroauth/twitteroauth.php");
$consumer_key = "xNmveqgGppTMpT5TJt33OBUFg";
$consumer_secret = "ob0EaHfuwtG7ZFMWvUvFOkfzBkYIZ6EonRZA88oYJJJ5bAQNEL";
$access_token = "1691902524-fPZSJWW4VJgvtsQ5PUsxDoR6fdBpCXIsj14DdXw";
$access_token_secret = "uKXMzYlaYwy2YL1FNClCbMx7xwYYLQenobGDXzYUxvVmE";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

//$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=%23tomorrowindia&since%3A2018-04-30&result_type=recent&lang=en&include_entities=true&count=500');
$tweets = $twitter->get('search/tweets',array('q' => '#TomorrowIndia', 'count' => 500,'result_type' => 'recent', 'since' => '2018-04-30', 'include_entities' => 'true'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" http-equiv="refresh" content="5">
  <title>Twitter COUNTER</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <style>
  body {
  background: url('https://rxzxbw.bl.files.1drv.com/y4mVTo2359f-R8ZzhfGNFHGMDsGro-rNFtS-H5jIioOIhEgBE7vp1rkIlxBtYld86ceuJ9QpYUJCA3xH3yWc6eQHyM42mF5sKTTVcRv9JpoRbXl1l2Q10wWqZhP9i3EBE-Z5mRVkAICUTWhcEp7ruw4bT6_CCM9kpGQ5alasH-iH-5iBGo17BvFnXHMu864Mion1C6ohCze9m4ZMyx0w-aJZg?width=2400&height=1500&cropmode=none'); }

  img {
  border-radius: 50%;
  }
  blockquote.twitter-tweet {
  display: inline-block;
  font-family: "Helvetica Neue", Roboto, "Segoe UI", Calibri, sans-serif;
  font-size: 13px;
  /*font-weight: bold;*/
  line-height: 14px;
  border-color: #eee #ddd #bbb;
  border-radius: 5px;
  /*border-style: solid;*/
  border-width: 1px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.30);
  margin: 10px 7px;
  padding: 0 16px 16px 16px;
  max-height: 120px;
  max-width: 250px;
  }

  blockquote.twitter-tweet p {
  font-size: 13px;
  font-weight: normal;
  line-height: 14px;
  }

  blockquote.twitter-tweet a {
  color: inherit;
  font-weight: normal;
  text-decoration: none;
  outline: 0 none;
  }

  blockquote.twitter-tweet a:hover,
  blockquote.twitter-tweet a:focus {
  text-decoration: underline;
  }

h1 {
    font: 500 1.5em/1 'Raleway', sans-serif;
    color: rgba(128,0,0,.5);
    text-align: center;
    text-transform: uppercase;
    letter-spacing: .5em;
    position: absolute;
    width: 100%;
}

span, span:after {
    font-weight: 900;
    /*color: #efedce;*/
    color: rgba(128,0,0,.8);
    white-space: nowrap;
    display: inline-block;
    position: relative;
    letter-spacing: .1em;
    padding: .2em 0 .25em 0;
}

span {
    font-size: 4em;
    z-index: 100;
    text-shadow: .04em .04em 0 #9cb8b3;
}

span:after {
    content: attr(data-shadow-text);
    color: rgba(0,0,0,.35);
    text-shadow: none;
    position: absolute;
    left: .0875em;
    top: .0875em;
    z-index: -1;
    -webkit-mask-image: url(https://f.cl.ly/items/1t1C0W3y040g1J172r3h/mask.png);
}

</style>
</head>
<body>
<center>
<h1>see your tweet in the stream LIVE!!</h1><br><br><span data-shadow-text="Text-Shadow">#tomorrowindia</span><br>
</center><br>

<?php if(isset($tweets->statuses)) { 
  foreach ($tweets->statuses as $key => $tweet) { 
    $counter++ ?>
    <blockquote class="twitter-tweet" lang="en"><br><img src="<?=$tweet->user->profile_image_url;?>" />&mdash;<?=$tweet->user->name; ?><br><p><?=$tweet->text; ?></p></blockquote>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<?php } } ?>
<center><br>Counts to <?php echo $counter; ?></center>

</body>
</html>