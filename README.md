# PHP Fetch Utility

A PHP utility for performing fetch requests with customizable options such as HTTP method, headers, body, timeout, and SSL verification. The utility validates input and handles cURL errors, making it easy to send HTTP requests and receive responses in various formats.

### Requirements

-   PHP 7.0 or higher
-   cURL extension enabled

### Installation

To install the utility, you can use Composer. Add the following to your `composer.json` file:

```json
{
	"require": {
		"mohiwalla/php-fetch": "1.0.0"
	}
}
```

Then run:

```sh
composer install
```

OR just run this command directly:

```sh
composer require mohiwalla/php-fetch
```

### Usage

Include the utility in your PHP script and use the `fetch` function to perform HTTP requests.

#### Basic Example

```php
require __DIR__ . '/vendor/mohiwalla/php-fetch/index.php';

$res = fetch('https://dummyjson.com/users/1');
$data = json_decode($res);

echo print_r($data, true);
```

#### Supported Options

-   **method**: The HTTP method to use for the request (default: `GET`).
-   **headers**: An associative array of custom headers to include in the request.
-   **body**: The request body data, used with methods like `POST` and `PUT`.
-   **timeout**: Request timeout in seconds (default: `30`).
-   **ssl_verify**: Whether to verify SSL certificates (default: `false`).

#### Exception Handling

The `php-fetch` utility throws the following exceptions:

-   `InvalidArgumentException`: If the options parameter is not an array or an invalid HTTP method is specified.
-   `RuntimeException`: If a cURL error occurs during the request.

### Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -am 'Add new feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Create a new Pull Request.

### License

This project is licensed under the MIT License. See the [LICENSE](https://github.com/mohiwalla/php-fetch/blob/main/LICENSE) file for details.
