<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Categories
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
        data-bs-parent="#accordionExample">
        <div class="accordion-body d-flex flex-column gap-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex gap-3 align-items-center">
                    <input type="checkbox" name="categories" id="categories" />
                    <label for="categories">All Categories</label>
                </div>
                <p>({{$categories->count()}})</p>
            </div>
            @foreach ($categories as $category)
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex gap-3 align-items-center">
                        <input type="checkbox" value="{{$category->id}}" wire:model.live="categoriesIds" />
                        <label>{{$category->name}}</label>
                    </div>
                    <p>({{$category->books_count}})</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
