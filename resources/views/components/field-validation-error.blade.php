@if ($errors->has($field))
    @php
        $messages = $errors->getMessages();
    @endphp
    @foreach ($messages[$field] ?? [] as $message)
        <div>
            <span class="text-danger">{{ $message }}</span>
        </div>
    @endforeach
@endif
