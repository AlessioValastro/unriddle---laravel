<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href={{ asset('images/vector4.svg') }}>
    <link rel="stylesheet" href={{ asset('css/login.css') }}>
    <title>Checkout | Unriddle</title>
</head>

<body>
    <section class="get-started">
        <div class="get-started__content">
            <a href="/pricing"><img src='{{ asset('images/profile/vector2.svg') }}' alt="" id="exit-cross"></a>
            <div class="get-started__content--left">
                <div class="get-started__left--intro">
                    <img src={{ asset('images/vector4.svg') }} alt="unriddle-logo" />
                    <h2>Are you ready to change your plan?</h2>
                    <p>Do it now!</p>
                </div>
                @if ($plan->id > $ex_plan->id)
                    <form name="checkout" method="post" class="get-started__left--login" autocomplete="off"
                        action={{ route('payment') }}>
                        @csrf
                        <label for="username">{{ $username }}</label>
                        <label for="plan">You are upgrading from a {{ $ex_plan->name }} to a
                            <strong>{{ $plan->name }} plan</strong>.
                        </label>
                        <ul>
                            <h3>Your new features:</h3>
                            @foreach ($plan->featuresArray as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        <label for="price">Total: ${{ $plan->monthly_price - $ex_plan->monthly_price }}</label>
                        <label for="prossimo-rinnovo">Al prossimo rinnovo : ${{ $plan->monthly_price }}</label>

                        <input type="hidden" name="plan_name" value="{{ $plan->name }}">
                        <input type="submit" class="submit-button"></input>
                    </form>
                @elseif($plan->id < $ex_plan->id)
                    <form name="checkout" method="post" class="get-started__left--login" autocomplete="off"
                        action={{ route('payment') }}>
                        @csrf
                        <label for="username">{{ $username }}</label>
                        <label for="plan">You are downgrading from a {{ $ex_plan->name }} to a
                            <strong>{{ $plan->name }} plan</strong>.
                        </label>
                        <ul>
                            <h3>Features you can't use anymore:</h3>
                            @foreach ($ex_plan->featuresArray as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        <label for="price">Total: $0</label>
                        <label for="prossimo-rinnovo">Al prossimo rinnovo : ${{ $plan->monthly_price }}</label>
                        <input type="hidden" name="plan_name" value="{{ $plan->name }}">
                        <input type="submit" class="submit-button"></input>
                    </form>
                @else
                    <h3>Wait! You alredy have a {{$plan->name}} plan.</h3>
                    <p>Go back.</p>
                @endif
            </div>
        </div>
    </section>
</body>

</html>
