#### Migration

use another column types in migration, like `enum`.

```php
// database/migrations/2021_09_27_151903_create_books_table.php
// line 20
$table->enum('status', ['preorder', 'available']);
```

<br>

#### Eloquent: Relationships

Try to defining relationships between book and author table.

```php
// app/Models/Book.php  // line 33
public function author()
{
    return $this->belongsTo(Author::class);

    // or you can matching key manually
    return $this->belongsTo(Author::class, 'author_id', 'id');
}
```

<br>

And then we can call author data in book model like this. More detail check [Eloquent Relationships](https://laravel.com/docs/8.x/eloquent-relationships#has-one-of-many).

```php
// resources/views/book/bookForm.blade.php  // line 31
<td class="align-middle">{{ $book->author->name }}</td>
```

<br>

#### Eloquent: Attribute

We can transform attribute with format `get{Attribute}Attribute`. [Eloquent Attribute](https://laravel.com/docs/8.x/eloquent-mutators).

```php
// line 23
public function getStatusBadgeAttribute()
{
    if ($this->status === 'preorder') {
        return '<span class="mt-1 badge rounded-pill bg-warning">preorder</span>';
    }

    return '<span class="mt-1 badge rounded-pill bg-success">available</span>';
}
```

<br>

And access it like this. `{!! !!}` to convert string to html render.

```php
// resources/views/book/bookForm.blade.php  // line 29
{!! $book->status_badge !!}
```

> From this ***`getStatusBadgeAttribute()`*** to this ***`$book->status_badge`***

<br>

#### Controller

We can merge `create()`, `store`, `edit`, `update` with just one. Check all about [Database: Query Builder](https://laravel.com/docs/8.x/queries#ordering) here.

```php
// /app/Http/Controllers/BookController.php

// line 15
public function index()
{
    $data = [
        // get Books data with query builder.
        'books' => Book::orderBy('created_at', 'desc')->get(),
    ];

    return view('book.bookIndex', $data);
}

// line 40
public function store(Request $request, $id = '')
{
    $book = null;

    // this $id indicate that is create or updated
    if ($id) $book = Book::find($id);

    // and isMethod('post') was indicate is show book form or store to database
    if ($request->isMethod('post')) {
        $data = [
            'title' => $request->input('inputTitle'),
            'author_id' => $request->input('inputAuthorId'),
            'status' => $request->input('inputStatus'),
            'price' => $request->input('inputPrice'),
        ];

        if ($id) {
            $book->save($data); // for update book
        } else {
            Book::create($data); // for create new book
        }

        return redirect('/book');
    }

    $data = [
        'book' => $book,
        'authors' => \App\Models\Author::get(), // inline syntax to get author model
    ];

    return view('book.bookForm', $data);
}
```

<br>

And `routing` will be like this.

```php
// routes/web.php  // line 41
Route::get('/book/create', [BookController::class, 'store']);
Route::post('/book/store', [BookController::class, 'store']);
Route::get('/book/edit/{id}', [BookController::class, 'store']);
Route::post('/book/update/{id}', [BookController::class, 'store']);
```

<br>

#### Helper

Create custom helper.

```php
// app/Helpers.php  // line 7
if (!function_exists('rupiahFormat'))
{
    function rupiahFormat($number)
    {
        return 'IDR '. number_format((int)$number,0,',','.');
    }
}
```

<br>

And we can call in anywhere like this.

```php
// /app/Http/Controllers/BookController.php  // line 32
<td class="align-middle">{{ rupiahFormat($book->price) }}</td>
```

<br>

And dont forget to run `composer dump-autoload` in console, after you create Helper for the first time.

```php
// composer.json  // line 43
"files": [
    "app/Helpers.php"
]
```
