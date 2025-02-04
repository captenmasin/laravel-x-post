# Laravel X Post
Create posts from a x page in laravel.

## Requirements

- PHP >=8.3
- Laravel >= 11

## Installation
```
composer require captenmasin/laravel-x-post
```
## Configuration
You can publish the configuration file `config/x-post.php` optionally by using the following command:
``` 
php artisan vendor:publish --provider="Captenmasin\LaravelXPost\XPostServiceProvider" --tag="config"
```

Configure `.env` file
```
TWITTER_APP_ID=
TWITTER_CONSUMER_KEY=
TWITTER_CONSUMER_SECRET=
TWITTER_ACCESS_TOKEN=
TWITTER_ACCESS_TOKEN_SECRET=
TWITTER_API_VERSION=1.1
```

## Usage

### Get All posts
``` 
use Captenmasin\LaravelXPost\Facades\XPost;

$posts = XPost::getPosts();
```

### Create Basic Text post
``` 
use Captenmasin\LaravelXPost\Facades\XPost;

$post = XPost::createPost('Hello world');
```

### Create post with photo
``` 
use Captenmasin\LaravelXPost\Facades\XPost;

$text = 'Hello world'; //optional
$imageUrl = 'https://example.com/image.jpg';

$response = XPost::createPostWithPhoto($imageUrl, $text);
```

### Create post with link
``` 
use Captenmasin\LaravelXPost\Facades\XPost;

$text = 'Hello world'; //optional
$url = 'https://example.com';

$response = XPost::createPostWithLink($url, $text);
```

### Update  post
``` 
use Captenmasin\LaravelXPost\Facades\XPost;

$message = 'Foo bar';
$postId = '1234567890_987654321'; // Your post id

$response = XPost::updatePost($postId, $message);
```

### Delete  post
``` 
use Captenmasin\LaravelXPost\Facades\XPost;

$postId = '1234567890_987654321'; // Your post id
$response = XPost::deletePost($postId);
```

## Example Responses

### Success
``` 
[
  "status" => "success"
  "status_code" => 200
  "message" => "Post created successfully"
  "post_id" => "1234567890_987654321"
]
```

### Failure
``` 
[
  "status" => "fail"
  "status_code" => 422
  "message" => "Message is required"
]
```

## Links

### [X Page API](https://developers.x.com/docs/pages-api)
### [X Access Token](https://developers.x.com/docs/x-login/guides/access-tokens/get-long-lived)

## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
