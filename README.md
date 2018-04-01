# Twitter API
This is simple PHP Library to use Twitter API.


## Cara Install
Summarizer dapat diinstall dengan [Composer](https://getcomposer.org/).

``
composer require bagusrin/twitter:1.*
``

Jika Anda masih belum memahami bagaimana cara menggunakan Composer, silahkan baca [Getting Started with Composer](https://getcomposer.org/doc/00-intro.md).

## Get consumer access key and token from Twitter

Register your application at http://apps.twitter.com/app

## Usage

```php
use Abraham\TwitterOAuth\TwitterOAuth;
use Bagusrin\Twitter\Client;

$twitterOAuth = new TwitterOAuth($consumerKey, $consumerSecret);
$client = new Client($twitterOAuth);

// Retrieve the last 50 items in the user's timeline
$tweets = $client->getTimeline(50);