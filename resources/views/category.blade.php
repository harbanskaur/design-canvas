@include('layouts.header')

<a href="{{url('/')}}" class="close">EXIT</a>
<body class="category">
    <h1>CATEGORY : {{ $selectedCategory->name }}</h1>
    <!-- Category Select Option -->
    {{-- <div class="mb-3">
        <label for="category" class="form-label">Select Category:</label>
        <select id="category" name="category" class="form-select">
            @foreach($category as $cat)
                <option value="{{url('category/'.$cat->id)}}">{{$cat->name}}</option>
            @endforeach
        </select>
    </div> --}}
   
    <!-- Blog Photos Section -->
    <div id="blog-container">
        @foreach($show as $blog)
            <div class="blog-item">
                <img src="{{ asset($blog->image) }}" alt="{{ $blog->names }}" class="card-img-top">
                {{-- <div class="p-3">
                    <h3 class="card-title">{{ $blog->pname }}</h3>
                    <p class="card-text" >{{Str::limit($blog->desc,100)}}<br/>
                    <a href="">See More</a></p> --}}
                    

                    {{-- <div class="card">
                        <h3 class="card-title">{{ $blog->pname }}</h3>
                        <p class="card-text" id="blogDesc{{ $blog->id }}">
                            {{ Str::limit($blog->desc, 100) }}
                            <span class="full-description" style="display: none;">{{ $blog->desc }}</span>
                            <br/>
                            <a href="javascript:void(0);" onclick="toggleDescription({{ $blog->id }})">See More</a>
                        </p> --}}
                        <div class="card">
                            <h3 class="card-title">{{ $blog->pname }}</h3>
                            <p class="card-text" id="blogDesc{{ $blog->id }}">
                        
                                <span class="truncated-text">
                                    {{ Str::limit($blog->desc, 100) }}
                                </span>
                        
                                <span class="full-description" style="display: none;">
                                    {{ $blog->desc }}
                                </span>
                        
                                <br/>
                        
                                <a href="javascript:void(0);" onclick="toggleDescription({{ $blog->id }})" id="seeMoreLink{{ $blog->id }}"><b>Read More</b></a>
                            </p>


                    <div class="interaction-icons">
                        <SPAN class="like-button btn" data-blog-id="{{ $blog->id }}"><i class="fas fa-thumbs-up"></i> Like</SPAN>
                        <SPAN class="share-button btn" data-blog-id="{{ $blog->id }}"><i class="fas fa-share"></i> Share</SPAN>
                        <SPAN class="comment-button btn" data-blog-id="{{ $blog->id }}"><i class="fas fa-comment"></i> Comment</SPAN>
                    </div>
                    {{-- <div class="count-info mt-3">
                        <p><i class="fas fa-thumbs-up"></i> Likes: {{ $blog->likes }}</p>
                        <p><i class="fas fa-share"></i> Shares: {{ $blog->shares }}</p>
                        <p><i class="fas fa-comment"></i> Comments: {{ $blog->comments }}</p>
                    </div> --}}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script>
    function toggleDescription(blogId) {
        var truncatedDesc = document.querySelector('#blogDesc' + blogId + ' .truncated-text');
        var fullDesc = document.querySelector('#blogDesc' + blogId + ' .full-description');
        var seeMoreLink = document.getElementById('seeMoreLink' + blogId);

        if (truncatedDesc.style.display !== 'none') {
            truncatedDesc.style.display = 'none';
            fullDesc.style.display = 'inline';
            seeMoreLink.innerHTML = '<b>Read Less</b>';
        } else {
            truncatedDesc.style.display = 'inline';
            fullDesc.style.display = 'none';
            seeMoreLink.innerHTML = '</b>Read More</b>';
        }
    }
</script>