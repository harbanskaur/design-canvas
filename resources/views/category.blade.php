<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #fff;
        }

        #blog-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .blog-item {
            width: 300px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .blog-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .blog-item h3 {
            font-size: 20px;
            margin: 15px 10px;
            color: #333;
        }

        .blog-item p {
            margin: 0 10px 10px;
            color: #666;
        }

        .blog-item button {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
            width: 100%;
        }

        .like-button,
        .share-button,
        .comment-button {
            color: #333;
        }

        .blog-item:hover {
            transform: scale(1.05);
        }

        /* Responsive Styles */
        @media only screen and (max-width: 768px) {
            .blog-item {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h1>ALL BLOGS</h1>
    <!-- Category Select Option -->
    <div class="mb-3">
        <label for="category" class="form-label">Select Category:</label>
        <select id="category" name="category" class="form-select">
            @foreach($category as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
    </div>
   
    <!-- Blog Photos Section -->
    <div id="blog-container">
        @foreach($data as $blog)
            <div class="blog-item">
                <img src="{{ asset($blog->image) }}" alt="{{ $blog->names }}" class="card-img-top">
                <div class="p-3">
                    <h3 class="card-title">{{ $blog->pname }}</h3>
                    <p class="card-text" >{{Str::limit($blog->desc,100)}}</p>
                    <span  href="">Read More -> </span>
                    <div class="interaction-icons">
                        <button class="like-button btn" data-blog-id="{{ $blog->id }}"><i class="fas fa-thumbs-up"></i> Like</button>
                        <button class="share-button btn" data-blog-id="{{ $blog->id }}"><i class="fas fa-share"></i> Share</button>
                        <button class="comment-button btn" data-blog-id="{{ $blog->id }}"><i class="fas fa-comment"></i> Comment</button>
                    </div>
                    <div class="count-info mt-3">
                        <p><i class="fas fa-thumbs-up"></i> Likes: {{ $blog->likes }}</p>
                        <p><i class="fas fa-share"></i> Shares: {{ $blog->shares }}</p>
                        <p><i class="fas fa-comment"></i> Comments: {{ $blog->comments }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
