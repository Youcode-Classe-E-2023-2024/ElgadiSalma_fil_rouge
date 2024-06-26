<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaStock </title>
    <style>
        /* Body */
        .container {
            display: grid;
            grid-template-columns: auto;
            gap: 0px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 6rem
        }

        hr {
            height: 1px;
            background-color: rgba(16, 86, 82, .75);
            ;
            border: none;
        }

        .card {
            width: 70%;
            background: rgb(255, 250, 235);
            box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01), 0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09), 0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
        }

        .title {
            width: 100%;
            height: 40px;
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 20px;
            border-bottom: 1px solid rgba(16, 86, 82, .75);
            ;
            font-weight: 700;
            font-size: 11px;
            color: #000000;
        }

        /* Cart */
        .cart {
            border-radius: 19px 19px 0px 0px;
        }

        .cart .steps {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .cart .steps .step {
            display: grid;
            gap: 10px;
        }

        .cart .steps .step span {
            font-size: 13px;
            font-weight: 600;
            color: #000000;
            margin-bottom: 8px;
            display: block;
        }

        .cart .steps .step p {
            font-size: 11px;
            font-weight: 600;
            color: #000000;
        }

        /* Promo */
        .promo form {
            display: grid;
            grid-template-columns: 1fr 80px;
            gap: 10px;
            padding: 0px;
        }

        .input_field {
            width: auto;
            height: 36px;
            padding: 0 0 0 12px;
            border-radius: 5px;
            outline: none;
            border: 1px solid rgb(16, 86, 82);
            background-color: rgb(251, 243, 228);
            transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        }

        .input_field:focus {
            border: 1px solid transparent;
            box-shadow: 0px 0px 0px 2px rgb(251, 243, 228);
            background-color: rgb(201, 193, 178);
        }

        .promo form button {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 10px 18px;
            gap: 10px;
            width: 100%;
            height: 36px;
            background: rgba(16, 86, 82, .75);
            box-shadow: 0px 0.5px 0.5px #F3D2C9, 0px 1px 0.5px rgba(239, 239, 239, 0.5);
            border-radius: 5px;
            border: 0;
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 15px;
            color: #000000;
        }

        /* Checkout */
        .payments .details {
            display: grid;
            grid-template-columns: 10fr 1fr;
            padding: 0px;
            gap: 5px;
        }

        .payments .details span:nth-child(odd) {
            font-size: 12px;
            font-weight: 600;
            color: #000000;
            margin: auto auto auto 0;
        }

        .payments .details span:nth-child(even) {
            font-size: 13px;
            font-weight: 600;
            color: #000000;
            margin: auto 0 auto auto;
        }

        .checkout .footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 10px 10px 20px;
            background-color: rgba(16, 86, 82, .5);
        }

        .price {
            position: relative;
            font-size: 22px;
            color: #2B2B2F;
            font-weight: 900;
        }

        .checkout .checkout-btn {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 150px;
            height: 36px;
            background: rgba(16, 86, 82, .55);
            box-shadow: 0px 0.5px 0.5px rgba(16, 86, 82, .75), 0px 1px 0.5px rgba(16, 86, 82, .75);
            ;
            border-radius: 7px;
            border: 1px solid rgb(16, 86, 82);
            ;
            color: #000000;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="card cart">
            <label class="title">My Pharmacy Infos</label>
            <form action="{{ route('pharma.add') }}" method="POST">
                @csrf
                <div class="steps">
                    <div class="step">
                        <div>
                            <span>Ville de la pharmacie :</span>
                            <select name="city_id" id="city_id" style="background: none; border: none; height: 2rem; color: #000000;">
                                <option disabled selected>Choisissez une ville</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" style="color: #000000;">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <hr>
                        <div>
                            <span>Adresse de la pharmacie :</span>
                            <input type="text" placeholder="Adresse" name="adresse" value="{{ old('adresse') }}"
                                style="background: none; border: none; width: 80%; height:2rem;">
                            @error('adresse')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <hr>
                        <div>
                            <span>Nom de la pharmacie :</span>
                            <input type="text" name="name" placeholder="Adresse" value="{{ old('name') }}"
                                style="background: none;border: none; width: 80%; height:2rem;">
                            @error('name')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <hr>
                        <div>
                            <span>Capitale de la pharmacie :</span>
                            <input type="number" name="capitale" placeholder="capitale" value="{{ old('capitale') }}"
                                style="background: none;border: none; width: 80%; height:2rem;">
                            @error('capitale')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <hr>
                        <div class="promo">
                            <span>LoGo de la pharmacie :</span>
                            <input type="file" name="logo" placeholder="Enter votre logo" class="input_field d-flex"
                                style="width: 95%;">
                            @error('logo')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <hr>
                    </div>
                </div>
                
        </div>

        <div class="card checkout">
            <div class="footer">
                <button class="checkout-btn " type="submit  " style="width: 99%">Checkout</button>
            </div>
        </div>
        </form>
    </div>
</body>

</html>
