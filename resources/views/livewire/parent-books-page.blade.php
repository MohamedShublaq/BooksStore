<div class="row">
    <div class="col-12 col-lg-3">
        <div class="accordion" id="accordionExample">
            @livewire('categories-accordion' , ['categories' => $categories])

            @livewire('publishers-accordion')

            @livewire('year-accordion')
        </div>
    </div>
    <div class="col-12 col-lg-9">

        {{-- Start Swiper Categories --}}
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($categories as $category)
                    <div class="swiper-slide swiper-slide_category">{{$category->name}}</div>
                @endforeach
            </div>
        </div>
        {{-- End Swiper Categories --}}

        @livewire('list-books')
    </div>
</div>
