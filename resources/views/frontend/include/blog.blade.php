<!-- start blog  -->
<div class="blog" id="blog_section">
    <div class="container">
        <h1>blog</h1>
        <p class="summrize">{{ Str::limit(setting()->blog_des , $limit = 200, $end = '...') }}</p>
        <div class="row blog__container">
            
        </div>
        <button class="loading"><a href="#">Load More</a></button>
    </div>
</div>
<!-- end blog  -->

