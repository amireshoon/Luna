# Luna
Luna is a simple very light class to render HTML pages or views in PHP

# Instalation
You can install via composer or direclty copy the class or clone repo.
```bash
composer require amireshoon/luna
```

## Content format
You can render HTML pages or view or any context of any kind of file. You just have to include your keyword like this:
```
This is my {message} for you dear {name}.
```
or in html format your content should be like this:
```html
<!DOCTYPE html>
<html>
  <head>
    <title>{title}</title>
  </head>
  <body>

    <h1>This is my {message} for you dear <code>{name}</code></h1>

  </body>
</html>
```

## Usage
It's simple just give luna the file and variables, That's it.

You can get rendered output by two methods, You can directly print on-screen, or luna will be return rendered content to you.

`render()` function takes one argument that is output type. By setting it true you will get renderer out put and you can use it however you want to, And if you set that false rendered content will be direclty print on screen. Anyways it's optional default is true.
```php
$luna->page( __DIR__ . '/mypage.html')
     ->with([
        'title'   => 'My very first page',
        'message' => 'Hello world',
        'name'    => 'Gophy',
     ])
     ->render(false);
```
