@include('layouts.header')
<a href="{{url('/')}}" class="close">EXIT</a>
        @if(session('success'))
        <div id="success-alert" class="alert alert-success">	
            {{session('success')}} 
        </div>
        @elseif(session('error'))
        <div id="error-alert" class="alert alert-danger">	
            {{session('error')}} 
        </div>
        @endif
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body class="category">
    <h1>CATEGORY : {{ $selectedCategory->name }}</h1>
    <div id="blog-container">
        @foreach($show as $blog)
            <div class="blog-item">
                <img src="{{ asset($blog->image) }}" alt="{{ $blog->names }}" class="card-img-top">
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
                        <span class="like-button btn" data-blog-id="{{ $blog->id }}"><i class="fas fa-thumbs-up"></i> Like</span>


                        <span class="comment-button btn" data-blog-id="{{ $blog->id }}"><i class="fas fa-comment"></i> Comment</span><br/>
                        <a href="#" class="text view-comments-link" data-blog-id="{{ $blog->id }}">View all comments</a>
                        <form action="{{route('comment')}}" method="post">
                            @csrf
                            <div class="comment-box" id="comment-box-{{ $blog->id }}">
                                <textarea placeholder="Write a comment..." class="comment-textarea" name="comment"></textarea>
                                <input type="hidden" name="blogid" value="{{ $blog->id }}"/>
                                <button class="comment-submit-btn" data-blog-id="{{ $blog->id }}">Add Comment</button>
                            </div>
                        </form>
                    </div>
                    <div class="all-comments" id="all-comments-{{ $blog->blogid }}" style="display: none;">
                        @foreach($comments as $comment)
                            <div class="comment">
                                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}</p>
                                {{-- Add any additional information you want to display --}}
                            </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
<script>
//category page 
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
// document.addEventListener('DOMContentLoaded', function () {
//         // Add event listener to toggle visibility of all comments
//         document.querySelector('.view-comments-link').addEventListener('click', function (event) {
//             event.preventDefault();
//             var blogId = this.getAttribute('data-blog-id');
//             var allCommentsDiv = document.getElementById('all-comments-' + blogId);
            
//             // Toggle the visibility of comments
//             allCommentsDiv.style.display = allCommentsDiv.style.display === 'none' ? 'block' : 'none';
//         });
//     });
    // document.addEventListener('DOMContentLoaded', function () {
    //     // Add event listener to toggle visibility of all comments
    //     document.querySelector('.view-comments-link').addEventListener('click', function (event) {
    //         event.preventDefault();
    //         var blogId = this.getAttribute('data-blog-id');
    //         var allCommentsDiv = document.getElementById('all-comments-' + blogId);
    //         allCommentsDiv.style.display = allCommentsDiv.style.display === 'none' ? 'block' : 'none';
    //     });
    // });
</script>
<style>
    .comment-box {
    display: none;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 10px;
    border-radius: 5px;
}

.comment-textarea {
    width: 100%;
    margin-bottom: 5px;
}

.comment-submit-btn {
    background-color: #3490dc;
    color: #ffffff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 3px;
}

</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listener to the comment button
        document.querySelectorAll('.comment-button').forEach(function(commentButton) {
            commentButton.addEventListener('click', function () {
                // Get the associated comment box
                var blogId = this.getAttribute('data-blog-id');
                var commentBox = document.getElementById('comment-box-' + blogId);

                // Toggle the visibility of the comment box
                commentBox.style.display = commentBox.style.display === 'none' ? 'block' : 'none';
            });
        });
        $(document).ready(function(){
            $("#success-alert").fadeTo(2000, 200).slideUp(200, function(){
                $("#success-alert").slideUp(200);
            });
        });

        // Automatically remove error message after 5 seconds
        $(document).ready(function(){
            $("#error-alert").fadeTo(2000, 200).slideUp(200, function(){
                $("#error-alert").slideUp(200);
            });
        });
    });
</script>
