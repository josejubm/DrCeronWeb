<?php require "partials/header.php" ?>

    <div id="hero" class="hero overlay subpage-hero blog-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Blog</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Blog</li>
                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">

        <section class="site-section subpage-site-section section-blog">
            <div class="container">
                <div class="row">

                    <div class="col-md-8">
                        <article class="blog-post">
                            <a href="blog-post.html">
                                <img src="assets/img/portfolio-1.jpg" class="img-res" alt="">
                            </a>
                            <div class="post-content">
                                <h3 class="post-title"><a href="blog-post.html">12 Essential Free Sketch Plugins</a></h3>
                                <p>Sketch Measure helps designers organize and outline their work for developers, project managers, and other team members</p>
                                <div class="text-right">
                                    <a class="read-more" href="blog-post.html">Read more</a>
                                </div>
                                <div class="post-meta">
                                    <span class="post-author">
                                        <a href="#"><img class="img-res" src="assets/img/author.jpg" alt="">John Smith</a>
                                    </span>
                                    <span class="post-date">
                                        <a href=""><i class="fa fa-calendar" aria-hidden="true"></i>September 21, 2016</a>
                                        </span>
                                    <span class="post-category">
                                        <a href=""><i class="fa fa-folder" aria-hidden="true"></i>Web Design</a>
                                    </span>
                                </div><!-- /.post-meta -->
                            </div><!-- /.post-content -->
                        </article><!-- /.blog-post -->

                        <div class="ui-pagination mt-50">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <ul class="pagination">
                                        <li><a href="#">&lt;&lt;</a></li>
                                        <li><a href="#">&lt;</a></li>
                                        <li class="more"><a href="#">...</a></li>
                                        <li><a href="#">31</a></li>
                                        <li class="active"><a href="#">32</a></li>
                                        <li><a href="#">33</a></li>
                                        <li class="more"><a href="#">...</a></li>
                                        <li><a href="#">&gt;</a></li>
                                        <li><a href="#">&gt;&gt;</a></li>
                                    </ul><!-- /.pagination -->               
                                </div>
                            </div>
                        </div><!-- /.ui-pagination -->
                    </div>

                    <aside class="col-md-4">
                        <div class="sidebar">
                            <div class="widget search-form">
                                <h4 class="widget-title">Search the blog</h4>
                                <form class="form-group">
                                    <input type="text" class="form-control" placeholder="Search" required>
                                    <button class="btn btn-green" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div><!-- /.search-form -->
                            <div class="widget widget-recent-posts">
                                <h4 class="widget-title">Recent posts</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#">Inside The Lipsum</a></li>
                                    <li><a href="#">Oscar Wilde</a></li>
                                    <li><a href="#">Jeffrey Ween</a></li>
                                    <li><a href="#">Responsive Design</a></li>
                                    <li><a href="#">Development</a></li>
                                </ul>
                            </div><!-- /.widget-recent-posts -->
                            <div class="widget widget-categories">
                                <h4 class="widget-title">Categories</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#">Inside The Lipsum <span>12</span></a></li>
                                    <li><a href="#">Oscar Wilde<span>4</span></a></li>
                                    <li><a href="#">Jeffrey Ween<span>2</span></a></li>
                                    <li><a href="#">Responsive Design<span>1</span></a></li>
                                    <li><a href="#">Development<span>9</span></a></li>
                                </ul>
                            </div><!-- /.widget-categories -->
                            <div class="widget widget-tags">
                                <h4 class="widget-title">Tags</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#">Web Design</a></li>
                                    <li><a href="#">Web Development</a></li>
                                    <li><a href="#">PSD Template</a></li>
                                    <li><a href="#">Responsive Design</a></li>
                                    <li><a href="#">Development</a></li>
                                </ul>
                            </div><!-- /.widget-tags -->
                        </div><!-- /.sidebar -->
                    </aside>
                </div>
            </div>
        </section><!-- /.section-portfolio -->

    <?php require "partials/footer.php" ?>