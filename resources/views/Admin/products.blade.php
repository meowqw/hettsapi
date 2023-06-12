<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Color</th>
                <th scope="col">Category</th>
                <th scope="col">Size</th>
                <th scope="col">Characteristics</th>
                <th scope="col">Image</th>
                <th scope="col">DELETE</th>

            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->color->title}}</td>
                    <td>{{$product->category->title}}</td>
                    <td>{{$product->size->title}}</td>
                    <td>{{$product->characteristics}}</td>
                    <td>{{$product->image}}</td>

                    <td>
                        <form method="POST" action="{{ route('destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                </tr>
            @endforeach

            </tbody>
        </table>
       <form action="/admin/product" method="POST" enctype="multipart/form-data">
           @csrf
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="title">
            </div>

           <div class="mb-3">
               <label for="price" class="form-label">price</label>
               <input type="number" name="price" class="form-control" id="price" placeholder="price">
           </div>
            <div class="mb-3">
                <label for="images" class="form-label">images</label>
                <input class="form-control" name="image" type="file" id="images" multiple>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
           <div class="mb-3">
               <label for="characteristics" class="form-label">characteristics</label>
               <textarea class="form-control" name="characteristics" id="characteristics" rows="3"></textarea>
           </div>

            <select class="form-select mb-3" name="category_id" aria-label="Category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{$category->title}}</option>
                @endforeach
            </select>

            <select class="form-select mb-3" name="color_id" aria-label="Color">
                @foreach($colors as $color)
                    <option value="{{ $color->id }}">{{$color->title}}</option>
                @endforeach
            </select>

            <select class="form-select mb-3" name="size_id" aria-label="Size">
                @foreach($sizes as $size)
                    <option value="{{ $size->id }}">{{$size->title}}</option>
                @endforeach
            </select>

           <button type="submit" class="btn btn-primary">Добавить</button>
       </form>
    </div>


</body>
</html>
