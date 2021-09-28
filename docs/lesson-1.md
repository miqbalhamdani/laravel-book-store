#### Add model and migration file

```bash
$ php artisan make:model Author -m
```

<br>

Add column that you wanna add to `Author` table.
[More about column types](https://laravel.com/docs/8.x/migrations#available-column-types)

```php
// database/migrations/2021_09_27_095022_create_authors_table.php
// line 18
$table->string('name');
$table->string('address');
```

<br>

you should define which model attributes you want to make mass assignable using the `$fillable` property on the model.

```php
// app/Models/Author.php
// line 12
protected $fillable = [
    'name',
    'address',
];
```

<br>

#### Add `Author` controller

```bash
# create AuthorController file
$ php artisan make:controller AuthorController -r
```

<br>

And follow `AuthorController` in `/app/Http/Controllers/AuthorController.php`.

```php
// /app/Http/Controllers/AuthorController.php

// import author model  // line 5
use App\Models\Author;

// show all authors  // line 15
public function index()
{
    $data = [
        'authors' => Author::get(),
    ];

    return view('author.authorIndex', $data);
}

// show author input form  // line 29
public function create()
{
    return view('author.authorForm');
}

// store new author to database  // line 40
public function store(Request $request)
{
    $author = [
        'name' => $request->input('inputName'),
        'address' => $request->input('inputAddress'),
    ];

    Author::create($author);

    return redirect('/author');
}

// show edit form author  // line 69
public function edit($id)
{
    $author = Author::find($id);

    return view('author.authorForm', [
        'author' => $author,
    ]);
}

// update author by id  // line 85
public function update(Request $request, $id)
{
    $author = Author::find($id);

    $author->name = $request->input('inputName');
    $author->address = $request->input('inputAddress');
    $author->update();

    return redirect('/author');
}

// delete author  // line 102
public function destroy($id)
{
    Author::destroy($id);

    return redirect('/author');
}
```

For `Author::get()`, we use [Laravel Eloquent](https://laravel.com/docs/8.x/eloquent#introduction).

<br>

#### Make Views

`resources/views/author/authorIndex.blade.php` for showing author data.

```php
// store author data with looping  // line 24
@foreach ($authors as $author)
  <tr>
    // get name atribute from author  // line 26
    <td class="align-middle">{{ $author->name }}</td>
    ...
    ...
  </tr>
@endforeach
```

<br>

`resources/views/author/authorForm.blade.php` for creating and updating data.

```php
// send data to controller for create or updated  // line 16
<form method="POST" action="{{ url($postUrl) }}">

  // to protect our application, we need to add CSRF
  // every incoming POST, PUT, PATCH, or DELETE.  // line 17
  {{ csrf_field() }}

  // for get old data when update author.  // line 31
  // @ prevent error, when $author is empty data.
  value="{{ @$author['name'] }}"
```

<br>

#### Add routing

Add routing for pointing controller and view.
Check [Laravel Routing](https://laravel.com/docs/8.x/routing) for the detail.

```php
// routes/web.php

// import AuthorController class
use App\Http\Controllers\AuthorController;

// pointing link `author` to `AuthorController`
Route::get('/author', [AuthorController::class, 'index']);
...
...
```
