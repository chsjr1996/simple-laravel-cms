@if ($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-12 alert alert-danger">
            <h2>Some errors in your request...</h2>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
