@extends('layouts.app')

@section('title', 'detail-kegiatan')

@section('content')
<div role="main" class="main">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 order-lg-2">
                <aside class="sidebar">
                    <h5 class="font-weight-bold pt-4">Tags</h5>
                    <ul class="nav nav-list flex-column mb-5">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Design (2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Photos (4)</a>
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Animals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Business</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sports</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">People</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Videos (3)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lifestyle (2)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Technology (1)</a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="col-lg-9 order-lg-1">
                <div class="blog-posts single-post">
                    <article class="post post-large blog-single-post border-0 m-0 p-0">
                        <div class="row">
                            <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                                <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark nav-lg d-block overflow-hidden" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'autoHeight': true}" style="height: 510px">
                                    <div>
                                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                                            <img src="img/projects/project-short.jpg" class="border-radius-0" alt="" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                                            <img src="img/projects/project-short-2.jpg" class="border-radius-0" alt="" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
                                            <img src="img/projects/project-short-3.jpg" class="img-fluid border-radius-0" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="post-date ml-0">
                            <span class="day bg-color-grey">10</span>
                            <span class="month">Jan</span>
                        </div>

                        <div class="post-content ml-0">
                            <h2 class="font-weight-bold">
                                <a href="blog-post.html">Class aptent taciti sociosqu ad litora torquent</a>
                            </h2>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i> By Admin
                                </span>
                                <span><i class="far fa-folder"></i>
                                    <a href="#">Lifestyle</a>, <a href="#">Design</a>
                                </span>
                            </div>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Curabitur lectus lacus, rutrum sit amet placerat et,
                                bibendum nec mauris. Duis molestie, purus eget placerat
                                viverra, nisi odio gravida sapien, congue tincidunt nisl
                                ante nec tellus. Vestibulum ante ipsum primis in faucibus
                                orci luctus et ultrices posuere cubilia Curae; Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit. Fusce
                                sagittis, massa fringilla consequat blandit, mauris ligula
                                porta nisi, non tristique enim sapien vel nisl.
                                Suspendisse vestibulum lobortis dapibus. Vestibulum ante
                                ipsum primis in faucibus orci luctus et ultrices posuere
                                cubilia Curae; Praesent nec tempus nibh. Donec mollis
                                commodo metus et fringilla. Etiam venenatis, diam id
                                adipiscing convallis, nisi eros lobortis tellus, feugiat
                                adipiscing ante ante sit amet dolor. Vestibulum vehicula
                                scelerisque facilisis. Sed faucibus placerat bibendum.
                                Maecenas sollicitudin commodo justo, quis hendrerit leo
                                consequat ac. Proin sit amet risus sapien, eget interdum
                                dui. Proin justo sapien, varius sit amet hendrerit id,
                                egestas quis mauris.
                            </p>
                            <p>
                                Ut ac elit non mi pharetra dictum nec quis nibh.
                                Pellentesque ut fringilla elit. Aliquam non ipsum id leo
                                eleifend sagittis id a lorem. Sociis natoque penatibus et
                                magnis dis parturient montes, nascetur ridiculus mus.
                                Aliquam massa mauris, viverra et rhoncus a, feugiat ut
                                sem. Quisque ultricies diam tempus quam molestie vitae
                                sodales dolor sagittis. Praesent commodo sodales purus.
                                Maecenas scelerisque ligula vitae leo adipiscing a
                                facilisis nisl ullamcorper. Vestibulum ante ipsum primis
                                in faucibus orci luctus et ultrices posuere cubilia Curae;
                            </p>
                            <p>
                                Curabitur non erat quam, id volutpat leo. Nullam pretium
                                gravida urna et interdum. Suspendisse in dui tellus. Cras
                                luctus nisl vel risus adipiscing aliquet. Phasellus
                                convallis lorem dui. Quisque hendrerit, lectus ut accumsan
                                gravida, leo tellus porttitor mi, ac mattis eros nunc vel
                                enim. Nulla facilisi. Nam non nulla sed nibh sodales
                                auctor eget non augue. Pellentesque sollicitudin
                                consectetur mauris, eu mattis mi dictum ac. Etiam et
                                sapien eu nisl dapibus fermentum et nec tortor.
                            </p>
                            <p>
                                Curabitur nec nulla lectus, non hendrerit lorem. Quisque
                                lorem risus, porttitor eget fringilla non, vehicula sed
                                tortor. Proin enim quam, vulputate at lobortis quis,
                                condimentum at justo. Phasellus nec nisi justo. Ut luctus
                                sagittis nulla at dapibus. Aliquam ullamcorper commodo
                                elit, quis ornare eros consectetur a. Curabitur nulla dui,
                                fermentum sed dapibus at, adipiscing eget nisi. Aenean
                                iaculis vehicula imperdiet. Donec suscipit leo sed metus
                                vestibulum pulvinar. Phasellus bibendum magna nec tellus
                                fringilla faucibus. Phasellus mollis scelerisque volutpat.
                                Ut sed molestie turpis. Phasellus ultrices suscipit
                                tellus, ac vehicula ligula condimentum et.
                            </p>
                            <p>
                                Aenean metus nibh, molestie at consectetur nec, molestie
                                sed nulla. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Aliquam nec euismod urna. Donec gravida
                                pharetra ipsum, non volutpat ipsum sagittis a. Phasellus
                                ut convallis ipsum. Sed nec dui orci, nec hendrerit massa.
                                Curabitur at risus suscipit massa varius accumsan. Proin
                                eu nisi id velit ultrices viverra nec condimentum magna.
                                Ut porta orci quis nulla aliquam at dictum mi viverra.
                                Maecenas ultricies elit in tortor scelerisque facilisis.
                                Mauris vehicula porttitor lacus, vel pretium est semper
                                non. Ut accumsan rhoncus metus non pharetra. Quisque
                                luctus blandit nisi, id tempus tellus pulvinar eu. Nam
                                ornare laoreet mi a molestie. Donec sodales scelerisque
                                congue.
                            </p>

                            <div class="post-block mt-5 post-share">
                                <h4 class="mb-3">Share this Post</h4>

                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style">
                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                    <a class="addthis_button_tweet"></a>
                                    <a class="addthis_button_pinterest_pinit"></a>
                                    <a class="addthis_counter addthis_pill_style"></a>
                                </div>
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
                                <!-- AddThis Button END -->
                            </div>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection