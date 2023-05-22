@if ($errors->any())
    <div class="p-4 text-white bg-purple-600 rounded-lg w-2/4" id="error-mssg">
        <h4 class="mb-4 font-semibold">
            Verifique los campos del formulario
        </h4>
        <p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </p>
    </div>
@endif