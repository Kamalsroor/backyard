<!-- start blog  -->
<div data-related="blogs" class="blog" id="blog_section">
    <div class="container">
        <h1>blog</h1>
        <p class="summrize">{{ Str::limit(setting()->blog_des , $limit = 200, $end = '...') }}</p>
        <div class="row blog__container">
            
        </div>
        <button type="button" class="blogs__load-btn">Load More</button>
    </div>
</div>
<!-- end blog  -->

