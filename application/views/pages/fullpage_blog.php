<?php $this->load->view('partials/header_pages2.php'); ?>
<section class="inner_page_head">
	<div class="container_fuild">
		<div class="row">
			<div class="col-md-12">
				<div class="full">
					<h3>Full Page Blog</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="blog_content">
	<div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="<?= base_url('layouts/images/article/' . $value->images) ?>" title="" alt="">
                        </div>
                        <div class="article-title">
                            <h6><a href="#"><?= $value->topic_article ?></a></h6>
                            <h2><?= $value->title ?></h2>
                            <div class="media">
                                <div class="avatar">
                                    <img src="<?= base_url('layouts/images/user.png') ?>" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <label><?= $value->author ?></label>
                                    <span><?= date('d-m-Y', strtotime($value->date)) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
							<?= $value->description ?>
                        </div>
                        <div class="nav tag-cloud">
                            <a href="#"><?= $value->topic_article ?></a>
                        </div>
                    </article>
                    <!-- <div class="contact-form article-comment">
                        <h4>Leave a Reply</h4>
                        <form id="contact-form" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Name" id="name" placeholder="Name *" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Email" id="email" placeholder="Email *" class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" placeholder="Your message *" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send">
                                        <button class="px-btn theme"><span>Submit</span> <i class="arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> -->
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="widget-body">
							<?php foreach($latest as $val) { ?>
								<div class="latest-post-aside media">
									<div class="lpa-left media-body">
										<div class="lpa-title">
											<h5><a href="<?= base_url('Pages/full_blog/' . $val->slug) ?>"><?= $val->title ?></a></h5>
										</div>
										<div class="lpa-meta">
											<a class="name" href="#">
												<?= $val->author ?>
											</a>
											<a class="date" href="#">
											<?= date('d-m-Y', strtotime($val->date)) ?>
											</a>
										</div>
									</div>
									<div class="lpa-right">
										<a href="<?= base_url('Pages/full_blog/' . $val->slug) ?>">
											<img src="<?= base_url('layouts/images/article/' . $val->images) ?>" title="" alt="">
										</a>
									</div>
								</div>
							<?php } ?>
                        </div>
                    </div>
                    <!-- End Latest Post -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('partials/footer_pages.php'); ?>
