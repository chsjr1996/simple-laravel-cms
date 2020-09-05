@if (session('title') && session('message'))
    <div class="row justify-content-center alert-container">
        <div class="col-md-12">
            <div class="alert alert-success">
                <div class="d-flex justify-content-between">
                    <h2>{{ session('title') }}</h2>
                    <p class="cm-js-close-alert" style="cursor: pointer">X</p>
                </div>
                <p>{{ session('message') }}</p>
            </div>
        </div>
    </div>
@endif
