@extends('admin.app')
@section('content')
<div class="row">
    <div class="col-12 col-lg-8 m-auto">
    <form class="multisteps-form__form mb-8">
    
    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
    <h5 class="font-weight-bolder">Product Information</h5>
    <div class="multisteps-form__content">
    <div class="row mt-3">
    <div class="col-12 col-sm-6">
    <label>Name</label>
    <input class="multisteps-form__input form-control" type="text" placeholder="eg. Off-White" />
    </div>
    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
    <label>Weight</label>
    <input class="multisteps-form__input form-control" type="text" placeholder="eg. 42" />
    </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
    <label class="mt-4">Description</label>
    <p class="form-text text-muted text-xs ms-1 d-inline">
    (optional)
    </p>
    <div id="edit-deschiption" class="h-50">
    <p>Some initial <strong>bold</strong> text</p>
    </div>
    </div>
    <div class="col-sm-6 mt-sm-0 mt-4">
    <label class="mt-4">Category</label>
    <select class="form-control" name="choices-category" id="choices-category">
    <option value="Choice 1" selected="">Clothing</option>
    <option value="Choice 2">Real Estate</option>
    <option value="Choice 3">Electronics</option>
    <option value="Choice 4">Furniture</option>
    <option value="Choice 5">Others</option>
    </select>
    <label>Sizes</label>
    <select class="form-control" name="choices-sizes" id="choices-sizes">
    <option value="Choice 1" selected="">Medium</option>
    <option value="Choice 2">Small</option>
    <option value="Choice 3">Large</option>
    <option value="Choice 4">Extra Large</option>
    <option value="Choice 5">Extra Small</option>
    </select>
    </div>
    </div>
    <div class="button-row d-flex mt-4">
    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
    </div>
    </div>
    </div>
    
    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
    <h5 class="font-weight-bolder">Media</h5>
    <div class="multisteps-form__content">
    <div class="row mt-3">
    <div class="col-12">
    <label>Product images</label>
    <div action="/file-upload" class="form-control dropzone" id="productImg"></div>
    </div>
    </div>
    <div class="button-row d-flex mt-4">
    <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
    </div>
    </div>
    </div>
    
    <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
    <h5 class="font-weight-bolder">Socials</h5>
    <div class="multisteps-form__content">
    <div class="row mt-3">
    <div class="col-12">
    <label>Shoppify Handle</label>
    <input class="multisteps-form__input form-control" type="text" placeholder="@argon" />
    </div>
    <div class="col-12 mt-3">
    <label>Facebook Account</label>
    <input class="multisteps-form__input form-control" type="text" placeholder="https://..." />
    </div>
    <div class="col-12 mt-3">
    <label>Instagram Account</label>
    <input class="multisteps-form__input form-control" type="text" placeholder="https://..." />
    </div>
    </div>
    <div class="row">
    <div class="button-row d-flex mt-4 col-12">
    <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
    </div>
    </div>
    </div>
</div>
@endsection