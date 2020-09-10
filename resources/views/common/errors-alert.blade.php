@if ($errors->any())
    <div class="row justify-content-center alert-container">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <div class="d-flex justify-content-between">
                    <h2>{{ __('Some errors in your request...') }}</h2>
                    <p class="cm-js-close-alert" style="cursor: pointer">X</p>
                </div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
