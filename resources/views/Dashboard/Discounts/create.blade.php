@extends('adminlte::page')

@section('title', 'Dashboard/Discounts')

@section('content_header')
    <h1 class="text-center">{{__('discounts.Create New Discount')}}</h1>
@stop

@section('content')
    <div class="card mx-auto">
        <div class="card-body">
            <form action="{{ route('admin.discounts.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input name="code" id="code" label="{{__('discounts.Code')}}"
                                fgroup-class="mb-0" required>
                            </x-adminlte-input>
                            <x-adminlte-button class="align-self-center" id="generate-code" label="{{__('discounts.Generate')}}" theme="outline-primary" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input name="quantity" label="{{__('discounts.Quantity')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input name="percentage" label="{{ __('discounts.Percentage') }}%"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <x-adminlte-input name="expiry_date" type="datetime-local" label="{{__('discounts.Expiry Date')}}"
                                fgroup-class="mb-4" required>
                            </x-adminlte-input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <x-adminlte-button label="{{__('actions.save')}}" theme="success" icon="fas fa-save" type="submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
<script>
    document.getElementById('generate-code').addEventListener('click', async function (event) {
        event.preventDefault();

        const codeInput = document.getElementById('code');

        // Function to generate a random code
        const generateCode = () => {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let result = '';
            for (let i = 0; i < 10; i++) {
                result += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return result;
        };

        // Generate and validate the code
        let isUnique = false;
        let newCode = '';
        while (!isUnique) {
            newCode = generateCode();

            // Check uniqueness via an API request
            const response = await fetch("{{ route('admin.discounts.checkUniqueCode') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ code: newCode }),
            });

            const data = await response.json();
            isUnique = data.unique;
        }

        // Set the value of the code input
        codeInput.value = newCode;
    });
</script>
@stop
