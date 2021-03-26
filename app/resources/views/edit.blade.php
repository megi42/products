<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Products</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="/edit/{{$product->id}}" method="post">
                @csrf

                    <div class="row form-group">
                        <div class="col-md-12">
                           <label for="">Name: </label>
                           <input type="text" name="name" class="form-control" value="{{$product->name}}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                           <label for="">Detail: </label>
                           <input type="text" name="detail" class="form-control" value="{{$product->detail}}" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                           <label for="manufacturer">Manufacturer: </label>
                           <select class="form-control" id="manufacturer" name="manufacturer" value="<?php echo $product->manufacturer_id ?>">
                                @foreach ($manufacturers as $manufacturer)           
                                    @if($manufacturer->id == $product->manufacturer_id){
                                        <option selected="selected" value="<?php echo $manufacturer->id ?>">{{$manufacturer->name}}</option>
                                    @else
                                        <option value="<?php echo $manufacturer->id ?>">{{$manufacturer->name}}</option>        
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-success w-50" style="margin:10px;">Update</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</body>
</html>