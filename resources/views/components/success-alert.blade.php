@if (session('title') && session('message'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success">
                <h2>{{ session('title') }}</h2>
                <p>{{ session('message') }}</p>
            </div>
        </div>
    </div>
@endif
