#### Import Boostrap CDN

```html
<!-- resources/views/layout.blade.php -->

<!-- line 3 -->
<link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
  crossorigin="anonymous"
>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"
></script>

<!-- line 24 -->
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"
></script>
```

<br>

#### Make simple layout

We layouting Using [Template Inheritance](https://laravel.com/docs/8.x/blade#layouts-using-template-inheritance). The contents of these sections will be displayed in the layout using `@yield`.

```php
// resources/views/layout.blade.php
// line 22
@yield('content')
```

<br>

`@extends` Blade directive to specify which layout the child view should "inherit". Views which extend a Blade layout may inject content into the layout's sections using `@section` directives

```php
// resources/views/author/authorIndex.blade.php
// line 22
@extends('layout')

@section('content')
...
...
@endsection
```

<br>

Another approach for layouting, we can use [Layout Using Components](https://laravel.com/docs/8.x/blade#layouts-using-components).

<br>

#### Work with Laravel Component

First, you must make components inside `components` folder, and call it with `<x-{folder and component name>`.

```php
// resources/views/components/alert.blade.php
<x-alert></x-alert> // without folder

// resources/views/components/input/button.blade.php
<x-input.button></x-input.button> // with input folder
```

For example check `resources/views/components/logo.blade.php` and call it in `resources/views/layout.blade.php` line 20.

This approach is for Laravel 7 and abouve. [Laravel Component](https://laravel.com/docs/8.x/blade#components).s
