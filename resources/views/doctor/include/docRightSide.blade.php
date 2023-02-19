<div class="info-box-col mb-3 pb-1">
    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Admin Notice
        Board</h6>
    <!-- accordion -->
    <div class="accordion accordion-flush" id="accordionFlushExample">
        @foreach($notices as $key=>$notice)
            <div class="accordion-item mb-0">
                <h2 class="accordion-header" id="flush-heading{{$key + 1}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{$key + 1}}" aria-expanded="false"
                            aria-controls="flush-collapse{{$key + 1}}">
                        {{$notice->title}}
                    </button>
                </h2>
                <div id="flush-collapse{{$key + 1}}" class="accordion-collapse collapse"
                     aria-labelledby="flush-heading{{$key + 1}}"
                     data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        {{$notice->description}}
                    </div>
                </div>
            </div>
        @endforeach
        {{-- <div class="accordion-item">--}}
        {{-- <h2 class="accordion-header" id="flush-headingTwo">--}}
        {{-- <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">--}}
        {{-- Notice #2--}}
        {{-- </button>--}}
        {{-- </h2>--}}
        {{-- <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">--}}
        {{-- <div class="accordion-body">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam quibusdam, nihil et magnam sunt odio quasi dolores modi ex id porro doloribus? Facilis perferendis numquam odio? Laboriosam, et? Voluptates, possimus?</div>--}}
        {{-- </div>--}}
        {{-- </div>--}}
        {{-- <div class="accordion-item">--}}
        {{-- <h2 class="accordion-header" id="flush-headingThree">--}}
        {{-- <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">--}}
        {{-- Notice #3--}}
        {{-- </button>--}}
        {{-- </h2>--}}
        {{-- <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">--}}
        {{-- <div class="accordion-body">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod doloremque reiciendis laboriosam labore magnam. Voluptatum pariatur delectus, eligendi omnis incidunt quibusdam vitae accusamus maiores iusto modi ratione eum. Sit, excepturi?</div>--}}
        {{-- </div>--}}
        {{-- </div>--}}
    </div>
    <!-- accordion end -->

    <!--  -->
    <!--  -->
</div>
<div class="info-box-col info-box-col-ad mb-3">
    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Ad</h6>
    <div id="carouselExampleControls" class="carousel carousel-dark  slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/slider_img/ad_slider_1.jpg')}}" class="d-block w-100"
                     alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/slider_img/ad_slider_2.png')}}" class="d-block w-100"
                     alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/slider_img/ad_slider_3.jpg')}}" class="d-block w-100"
                     alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>
<!-- <div class="info-box-col mb-3">
        <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Upcoming Events</h6>
    </div> -->
