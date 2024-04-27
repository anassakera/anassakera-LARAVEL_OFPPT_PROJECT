@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Account') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('create_accounts') }}">
                            @csrf

                            <!-- Select Account Type -->
                            <div class="form-group">
                                <label for="account_type">{{ __('Account Type') }}</label>
                                <select id="account_type" class="form-control" name="account_type" required>
                                    <option value="Super_Admin">Super_Admin</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>

                            <!-- Generate PIN -->
                            <div class="form-group">
                                <label for="pin">{{ __('PIN') }}</label>
                                <div class="input-group">
                                    <input id="pin" type="text" class="form-control" name="pin" required readonly>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary" onclick="generatePIN()">Generate</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Hidden Fields for Random Data -->
                            @php
                                $faker = Faker\Factory::create();
                                $name = $faker->name;
                                $phone = $faker->phoneNumber;
                                $email = $faker->unique()->safeEmail;
                                $password = bcrypt($faker->password);
                                $account_type = 'User';
                                $pin = '123456';
                            @endphp

                            <input id="name" type="hidden" class="form-control" name="name" value="{{ $name }}" required readonly>
                            <input id="phone" type="hidden" class="form-control" name="phone" value="{{ $phone }}" required readonly>
                            <input id="email" type="hidden" class="form-control" name="email" value="{{ $email }}" required readonly>
                            <input id="password" type="hidden" class="form-control" name="password" value="{{ $password }}" required readonly>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function generatePIN() {
            var pinField = document.getElementById('pin');
            var pin = Math.floor(100000 + Math.random() * 900000);
            pinField.value = pin;
        }
    </script>
@endsection
