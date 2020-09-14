<!-- start blog  -->
<div data-related="blogs" class="blog" id="blog_section">
    <div class="container">
        <h1>blog</h1>
        <p class="summrize">{{ Str::limit(setting()->blog_des , $limit = 200, $end = '...') }}</p>
        <div class="row blog__container">
            
        </div>
        <a class="blogs__load-btn" href="#">Load More</a>
    </div>
</div>
<!-- end blog  -->

