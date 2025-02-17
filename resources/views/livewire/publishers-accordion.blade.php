<div class="accordion-item my-3">
    <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Publishers
        </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
        data-bs-parent="#accordionExample">
        <div class="accordion-body d-flex flex-column gap-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex gap-3 align-items-center">
                    <input type="checkbox" name="publishers" id="publishers" />
                    <label for="publishers">All Publishers</label>
                </div>
                <p>({{$publishers->count()}})</p>
            </div>
            @foreach ($publishers as $publisher)
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex gap-3 align-items-center">
                        <input type="checkbox" name="publishers" id="publishers" value="{{$publisher->id}}" wire:model.live="publishersIds" />
                        <label>{{$publisher->name}}</label>
                    </div>
                    <p>({{$publisher->books_count}})</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
