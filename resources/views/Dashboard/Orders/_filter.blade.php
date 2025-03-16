<div class="mb-4">
    <form method="GET" action="{{ route('admin.orders.index') }}">
        <div class="row">
            <div class="col-3">
                <div class="form-group mb-3">
                    <x-adminlte-input name="first_name" value="{{ request('first_name') }}" label="{{ __('users.firstName') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <x-adminlte-input name="last_name" value="{{ request('last_name') }}" label="{{ __('users.lastName') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <x-adminlte-input name="email" value="{{ request('email') }}" label="{{ __('users.email') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <x-adminlte-input name="phone" value="{{ request('phone') }}" label="{{ __('users.phone') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group mb-3">
                    <x-adminlte-input name="number" value="{{ request('number') }}" label="{{ __('orders.number') }}" placeholder="{{__('actions.search')}}"/>
                </div>
            </div>
            @php
                $cash = App\Enums\PaymentType::Cash->value;
                $visa = App\Enums\PaymentType::Visa->value;
            @endphp
            <div class="col-3">
                <div class="form-group mb-3">
                    <label for="payment_type">{{ __('orders.paymentType') }}</label>
                    <x-adminlte-select name="payment_type" id="payment_type">
                        <option selected disabled value="">{{ __('actions.choose') }}</option>
                        <option value="{{$cash}}" {{ request('payment_type') == (string) $cash ? 'selected' : '' }}>
                            {{ __('orders.cash') }}
                        </option>
                        <option value="{{$visa}}" {{ request('payment_type') == (string) $visa ? 'selected' : '' }}>
                            {{ __('orders.visa') }}
                        </option>
                    </x-adminlte-select>
                </div>
            </div>
            @php
                $paid = App\Enums\PaymentStatus::Paid->value;
                $unpaid = App\Enums\PaymentStatus::Unpaid->value;
            @endphp
            <div class="col-3">
                <div class="form-group mb-3">
                    <label for="payment_status">{{ __('orders.paymentStatus') }}</label>
                    <x-adminlte-select name="payment_status" id="payment_status">
                        <option selected disabled value="">{{ __('actions.choose') }}</option>
                        <option value="{{$paid}}" {{ request('payment_status') == (string) $paid ? 'selected' : '' }}>
                            {{ __('orders.paid') }}
                        </option>
                        <option value="{{$unpaid}}" {{ request('payment_status') == (string) $unpaid ? 'selected' : '' }}>
                            {{ __('orders.unpaid') }}
                        </option>
                    </x-adminlte-select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group mb-3">
                    <label for="shipping_area">{{ __('orders.shippingArea') }}</label>
                    <x-adminlte-select name="shipping_area" id="shipping_area">
                        <option selected disabled value="">{{ __('actions.choose') }}</option>
                        @foreach ($shippingAreas as $sh)
                            <option value="{{ $sh->id }}"
                                {{ request('shipping_area') == $sh->id ? 'selected' : '' }}>
                                {{ $sh->name }}
                            </option>
                        @endforeach
                    </x-adminlte-select>
                </div>
            </div>
        </div>
        @include('Dashboard.partials.filterButtons')
    </form>
</div>
