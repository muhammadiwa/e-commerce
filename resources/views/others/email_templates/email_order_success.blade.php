@extends('others.email_templates.email_layout.master')

@section('email_style')
    <style type="text/css">
        body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            padding: 0 12px;
            font-family: 'Montserrat', sans-serif;
            background-color: #f6f7fb;
            display: block;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        p {
            margin: 15px 0;
        }

        h5 {
            color: #444;
            text-align: left;
            font-weight: 400;
        }

        img.img-fluid {
            max-width: 100%;
            height: auto;
        }

        .text-center {
            text-align: center
        }

        .title {
            color: #444444;
            font-size: 22px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        table {
            margin-top: 30px
        }

        table.top-0 {
            margin-top: 0;
        }

        table.order-template,
        .order-template th,
        .order-template td {
            border: 1px solid #eeeeee;
            border-collapse: collapse;
        }

        .order-template th {
            font-size: 16px;
            padding: 15px;
            text-align: left;
        }

        .footer-social-icon tr td img {
            margin-left: 5px;
            margin-right: 5px;
        }

        .temp-social td {
            display: inline-block;
        }

        .temp-social td i {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #5c61f2;
            border: 1px solid #5c61f2;
            transition: all 0.5s ease;
        }

        .temp-social td i:hover {
            background-color: #5c61f2;
            color: #ffffff;
        }

        .temp-social td:nth-child(n+2) {
            margin-left: 15px;
        }

        .main-bg-light {
            background-color: rgba(62, 95, 206, 0.03);
        }

        .deliver-status {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .deliver-status li {
            font-size: 20px;
            font-weight: 600;
            width: 145px;
            position: relative;
        }

        .deliver-status li h6 {
            font-size: 14px;
            margin-top: 10px;
            margin-bottom: 0;
            color: #717171;
            font-weight: 600;
            text-transform: capitalize;
        }

        .deliver-status li::before {
            content: "";
            position: absolute;
            top: 28%;
            left: 0;
            width: 100%;
            height: 5px;
            background-color: #5c61f2;
        }

        .deliver-status li:first-child::before,
        .deliver-status li:last-child::before {
            width: 50%
        }

        .deliver-status li:first-child::before,
        .deliver-status li:nth-child(2)::before {
            right: 0;
            left: unset;
        }

        .deliver-status li:nth-child(3)::before,
        .deliver-status li:last-child::before {
            background-color: #eeb82f;
        }

        .deliver-status li .order-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-left: auto;
            margin-right: auto;
            background-color: #eeb82f;
            position: relative;
            display: flex;
        }

        .deliver-status li .order-icon {
            color: #eeb82f;
        }

        .deliver-status li .order-icon i {
            margin: auto;
            font-size: 14px;
        }

        .deliver-status li .order-icon.active {
            background-color: #5c61f2;
        }

        .deliver-status li .order-icon.active i {
            color: #ffffff;
        }

        .temp-check {
            fill: #61ae41;
            height: 120px;
            margin-bottom: 15px;
        }

        @media only screen and (max-width: 767px) {
            body {
                width: 93%;
            }

            .order-template tbody tr:nth-child(n+2) td img {
                width: 40px;
            }

            .temp-check {
                height: 80px;
            }

            .temp-social td i {
                width: 32px !important;
                height: 32px !important;
            }

            .temp-social td:nth-child(n+2) {
                margin-left: 6px !important;
            }

            .deliver-status li {
                width: 120px;
            }

            .deliver-status li .order-icon {
                width: 30px;
                height: 30px;
            }

            .main-section tbody td>table td img {
                width: 200px;
            }

            .main-section {
                padding: 30px 20px !important;
            }

            .deliver-status li h6 {
                font-size: 13px;
            }

            .main-section tbody td table:nth-child(2) {
                margin: 30px auto 0;
            }
        }

        @media only screen and (max-width: 575px) {
            .temp-check {
                height: 70px;
            }

            .main-section tbody td>table td img {
                width: 120px;
            }

            .deliver-status li .order-icon {
                width: 22px;
                height: 22px;
            }

            .deliver-status li::before {
                top: 20%;
            }

            .deliver-status li {
                width: 105px;
            }

            .deliver-status li h6 {
                font-size: 12px;
            }

            .content-detail tbody tr {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .content-detail tbody tr td:nth-child(2) {
                display: none;
            }

            .order-template tbody tr td:nth-child(3),
            .order-template tbody tr th:nth-child(3) {
                display: none;
            }

            .main-section {
                padding: 30px 10px !important;
            }
        }

        @media only screen and (max-width: 480px) {
            .order-template th {
                font-size: 12px;
            }

            .order-template tbody tr td:nth-child(2) {
                padding-left: 1px !important;
            }

            .deliver-status li {
                width: 75px;
            }

            .content-detail tbody tr td {
                width: 70% !important;
            }

            .main-section {
                padding: 20px 8px !important;
                margin-top: 20px;
            }
        }

        @media only screen and (max-width: 360px) {
            body {
                width: 90%;
            }

            .deliver-status li::before {
                top: 15%;
            }

            .order-template tbody tr td {
                width: 10px;
            }

            .order-template th {
                padding: 10px 3px !important;
            }

            .deliver-status li {
                width: 65px;
            }

            .main-section tbody td table:nth-child(2) {
                margin: 15px 0 0;
            }

            .user-info h5 {
                padding: 12px !important;
            }
        }
    </style>
@endsection

@section('email_body')

    <body style="margin: 20px auto;">
        <table class="main-section" align="center" border="0" cellpadding="0" cellspacing="0"
            style="padding:30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%; border-radius:10px;">
            <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td><img class="img-fluid" src="{{ asset('assets/images/email-template/delivery.png') }}"
                                            alt="" style=";margin-bottom: 30px; border-radius:10px;"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <svg class="temp-check" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewbox="0 0 489.327 489.327" style="enable-background:new 0 0 489.327 489.327;"
                                            xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path
                                                        d="M478.483,273.213l-9.2-12.6c-7.6-10.4-7.7-24.5-0.3-35.1l9-12.7c10.4-14.8,5.6-35.3-10.4-43.9l-13.7-7.4                          c-11.4-6.1-17.6-18.8-15.5-31.5l2.6-15.4c3-17.8-10.3-34.3-28.4-35l-15.6-0.7c-12.9-0.5-24-9.3-27.6-21.7l-4.3-15                          c-5-17.4-24.1-26.4-40.8-19.2l-14.3,6.2c-11.9,5.1-25.6,2.1-34.3-7.6l-10.4-11.6c-12.1-13.5-33.2-13.3-45.1,0.3l-10.2,11.8                          c-8.5,9.7-22.2,13-34.1,8.1l-14.4-5.9c-16.7-6.9-35.7,2.4-40.5,19.9l-4.1,15c-3.3,12.6-14.2,21.5-27.1,22.2l-15.6,0.9                          c-18.1,1-31.1,17.7-27.8,35.4l2.8,15.3c2.3,12.7-3.7,25.5-15,31.7l-13.6,7.6c-15.8,8.8-20.4,29.4-9.7,44l9.2,12.6                          c7.6,10.4,7.7,24.5,0.3,35.1l-9,12.7c-10.4,14.8-5.6,35.3,10.4,43.9l13.7,7.4c11.4,6.1,17.6,18.8,15.5,31.5l-2.7,15.3                          c-3,17.8,10.3,34.3,28.4,35l15.6,0.7c12.9,0.5,24,9.3,27.6,21.7l4.3,15c5,17.4,24.1,26.4,40.8,19.2l14.3-6.2                          c11.9-5.1,25.6-2.1,34.3,7.5l10.4,11.6c12.1,13.5,33.2,13.3,45.1-0.3l10.2-11.8c8.5-9.7,22.2-13,34.1-8.1l14.4,5.9                          c16.7,6.9,35.7-2.4,40.5-19.9l4.1-15c3.4-12.4,14.4-21.3,27.3-22.1l15.6-0.9c18.1-1,31.1-17.7,27.8-35.4l-2.8-15.3                          c-2.3-12.7,3.7-25.5,15-31.7l13.6-7.6C484.583,308.513,489.083,287.813,478.483,273.213z M244.683,402.713                          c-87.2,0-157.9-70.7-157.9-157.9s70.7-157.9,157.9-157.9s157.9,70.7,157.9,157.9S331.883,402.713,244.683,402.713z">
                                                    </path>
                                                    <path
                                                        d="M224.483,249.013l-14-14.1c-8.3-8.4-21.9-8.4-30.3-0.1l0,0c-8.4,8.3-8.4,21.9-0.1,30.3l14,14.1l15.6,15.6                          c8.1,8.2,21.3,8.2,29.5,0.1l15.6-15.5l54.4-54.1c8.4-8.3,8.4-21.9,0.1-30.3l0,0c-8.3-8.4-21.9-8.4-30.3-0.1L224.483,249.013z">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="title">thank you</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="color:#717171;">Payment Is Successfully Processsed And Your Order Is On
                                            The Way</p>
                                        <p style="color:#717171;">Transaction ID:267676GHERT105467</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="border-top:1px solid #eeeeee;height:1px;margin-top: 30px;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 style="text-transform: capitalize;font-style: italic;color: #444444;">order
                                            delivered </h2>
                                        <ul class="deliver-status">
                                            <li>
                                                <div class="order-icon active"><i class="fa fa-check"></i></div>
                                                <h6>order confirmed</h6>
                                            </li>
                                            <li>
                                                <div class="order-icon active"><i class="fa fa-check"></i></div>
                                                <h6>order shipped</h6>
                                            </li>
                                            <li>
                                                <div class="order-icon"><i class="fa fa-check"></i></div>
                                                <h6>out for delivery</h6>
                                            </li>
                                            <li>
                                                <div class="order-icon"><i class="fa fa-check"></i></div>
                                                <h6>out delivered</h6>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <h2 class="title">YOUR ORDER DETAILS</h2>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="order-template" border="0" cellpadding="0" cellspacing="0" align="left">
                            <tbody>
                                <tr align="left">
                                    <th>PRODUCT</th>
                                    <th style="padding-left: 15px;">DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                    <th>PRICE </th>
                                </tr>
                                <tr>
                                    <td><img class="img-fluid" src="{{ asset('assets/images/email-template/4.png') }}" alt=""
                                            width="130"></td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="margin-top: 15px;">AirPods Pro Case, Soft Silicone Skin Case.</h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>1</span></h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>$1000</b></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img class="img-fluid" src="{{ asset('assets/images/email-template/1.png') }}" alt=""
                                            width="130"></td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="margin-top: 15px;">Black Mobile Vision 1 Pro with No Cost EMI/Additional
                                            Exchange Offers.</h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top: 10px;">QTY : <span>1</span></h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color:#444;margin-top:15px"><b>$5000</b></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"
                                        style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">
                                        Total:</td>
                                    <td class="price" colspan="3"
                                        style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;">
                                        <b>$6000.00</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"
                                        style="line-height: 49px;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">
                                        Discount :</td>
                                    <td class="price" colspan="3"
                                        style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right; border-left:unset;">
                                        <b>$10</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"
                                        style="line-height: 49px;font-family: Arial;font-size: 13px;color: #000000;padding-left: 20px;text-align:left;border-right: unset;">
                                        Gift Wripping: </td>
                                    <td class="price" colspan="3"
                                        style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right; border-left:unset;">
                                        <b>$60</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"
                                        style="line-height: 49px;font-size: 13px;color: #000000;                  padding-left: 20px;text-align:left;border-right: unset;">
                                        Shipping :</td>
                                    <td class="price" colspan="3"
                                        style="                  line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;">
                                        <b>$30</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"
                                        style="line-height: 49px;font-size: 13px;color: #000000;                  padding-left: 20px;text-align:left;border-right: unset;">
                                        TOTAL PAID :</td>
                                    <td class="price" colspan="3"
                                        style="line-height: 49px;text-align: right;padding-right: 28px;font-size: 13px;color: #000000;text-align:right;border-left: unset;">
                                        <b>$6100</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="content-detail" cellpadding="0" cellspacing="0" border="0" align="left"
                            style="width: 100%;margin-top: 30px;    margin-bottom: 30px;">
                            <tbody>
                                <tr>
                                    <td
                                        style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%; border:1px solid #eeeeee;border-radius:10px;">
                                        <h5
                                            style="font-size:16px; font-weight: 500;color: #000; line-height: 16px; padding:15px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 0;font-weight:600;">
                                            DELIVERY ADDRESS</h5>
                                        <p
                                            style="text-align: left;font-weight: normal; font-size: 14px; color:#717171;line-height: 21px;    margin-top: 0;margin-bottom:0; padding:15px;">
                                            | 268 Cambridge Lane New Albany,<br> IN 47150268 Cambridge Lane <br>New Albany,
                                            IN 47150</p>
                                    </td>
                                    <td class="user-info" width="57" height="25"><img class="img-fluid"
                                            src="{{ asset('assets/images/email-template/space.jpg') }}" alt=" " height="25"
                                            width="57"></td>
                                    <td class="user-info"
                                        style="font-size: 13px; font-weight: 400; color: #444444; letter-spacing: 0.2px;width: 50%; border: 1px solid #eeeeee ;border-radius:10px;">
                                        <h5
                                            style="font-size: 16px;font-weight: 500;color: #000; line-height: 16px; padding:15px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 0;font-weight:600;">
                                            SHIPPING ADDRESS</h5>
                                        <p
                                            style="text-align: left;font-weight: normal; font-size: 14px; color:#717171;line-height: 21px;    margin-top: 0;margin-bottom:0; padding:15px;">
                                            | 268 Cambridge Lane New Albany,<br> IN 47150268 Cambridge Lane <br>New Albany,
                                            IN 47150</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="temp-social main-bg-light text-center" align="center" border="0"
                            cellpadding="0" cellspacing="0" width="100%"
                            style=" margin-top:30px; border-radius:10px;">
                            <tbody>
                                <tr>
                                    <td style="padding: 30px;">
                                        <div>
                                            <h4 class="title" style="margin:0; text-align:center;">Follow us</h4>
                                        </div>
                                        <table class="footer-social-icon" border="0" cellpadding="0" cellspacing="0"
                                            align="center" style="margin-top:20px;">
                                            <tbody>
                                                <tr class="temp-social">
                                                    <td><a href="https://www.facebook.com"><i
                                                                class="fa fa-facebook"></i></a></td>
                                                    <td><a href="https://www.youtube.com/"><i
                                                                class="fa fa-youtube-play"></i></a></td>
                                                    <td><a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
                                                    </td>
                                                    <td><a href="https://accounts.google.com/"><i
                                                                class="fa fa-google-plus"></i></a></td>
                                                    <td><a href="https://www.linkedin.com"><i class="fa fa-linkedin">
                                                            </i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div style="border-top: 1px solid #eeeeee; margin: 20px auto 0;"></div>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                            style="margin: 20px auto 0;">
                                            <tbody>
                                                <tr>
                                                    <td><a href="javascript:void(0)"
                                                            style="color: #5c61f2;font-size:14px;text-transform: capitalize;font-weight:600;">Want
                                                            to change how you receive these emails?</a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="font-size:14px; margin:8px 0; color:#717171;">2022 - 23
                                                            CopyRight by Themeforest powered by PixelStrap</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)"
                                                            style="color: #5c61f2;font-size: 14px;text-transform: capitalize;font-weight:600; margin:0;">Unsubscribe</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
@endsection
