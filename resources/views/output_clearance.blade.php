<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clearance Form</title>

    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <div id="printJS-form" class="overflow-auto px-4 md:px-6">
        <h1 style="text-align: center; font-weight:bold; font-size: 48px">Arusha Technical College</h1>
        <h1 style="text-align: center; font-weight:bold; font-size: 20px">"Skills makes the difference"</h1>
        <div class="center" style="width: 100%; display: flex">
            <img src="{{asset('img/atc_logo.jpg')}}" style="width: 300px; margin: 0 auto;" alt="LOGO">
        </div>
        <h1 style="text-align: center; font-size: 32px">Clearance Form</h1>


        <div style="width: 800px; margin: 2em auto" class="w-full bg-white px-12 py-8 shadow-lg">
            <table border="1" style="border-collapse: collapse; width: 100%" class="table-fixed w-full">
                <thead class="border-b border-solid border-gray-300 py-4 font-bold">
                    <td class="w-1/6">S/No.</td>
                    <td class="w-2/6">Responsible Officer</td>
                    <td class="w-2/6"></td>
                    <td class="w-1/6">Status</td>
                </thead>
                <tbody>
                    <tr class="bg-gray-200 py-2">
                        <td class="w-1/6">1</td>
                        <td class="w-2/6">Head of Department</td>
                        <td class="w-2/6">

                        </td>
                        <td class="w-1/6">
                            Approved
                        </td>
                    </tr>
                    {{-- head of department general --}}
                    <tr class="bg-gray-200 py-2">
                        <td class="w-1/6">2</td>
                        <td class="w-2/6">Head of Department GST</td>
                        <td class="w-2/6">


                        </td>
                        <td class="w-1/6">
                            Approved
                        </td>
                    </tr>
                    {{-- workshop manager --}}
                    <tr class="bg-gray-200 py-2">
                        <td class="w-1/6">3</td>
                        <td class="w-2/6">Workshop Managers Concerned</td>
                        <td class="w-2/6">

                        </td>
                        <td class="w-1/6">
                            Approved
                    <tr class="bg-gray-200 py-2">
                        <td class="w-1/6">3</td>
                        <td class="w-2/6">Laboratory Manager Concerned</td>
                        <td class="w-2/6">

                        </td>
                        <td class="w-1/6">
                            Approved
                        </td>
                    </tr>

                    {{-- workshop manager --}}
                    <tr class="bg-gray-200 py-2">
                        <td class="w-1/6">4</td>
                        <td class="w-2/6">Classmaster </td>
                        <td class="w-2/6">

                        </td>
                        <td class="w-1/6">
                            Approved
                    </tr>
                    {{-- workshop manager --}}
                    <tr class="bg-gray-200 py-2">
                        <td class="w-1/6">5</td>
                        <td class="w-2/6">Librarian </td>
                        <td class="w-2/6">

                        </td>
                        <td class="w-1/6">
                            Approved
                        </td>
                    </tr>
                    {{-- workshop manager --}}
                    <tr class="bg-gray-200 py-2">
                        <td class="w-1/6">6</td>
                        <td class="w-2/6">Sports Master </td>
                        <td class="w-2/6">

                        </td>
                        <td class="w-1/6">
                            Approved
                        </td>
                    </tr>

                    {{-- workshop manager --}}
                    <tr class="bg-gray-200 py-2">
                        <td class="w-1/6">7</td>
                        <td class="w-2/6">Cateress </td>
                        <td class="w-2/6">

                        </td>
                        <td class="w-1/6">
                            Approved
                        </td>
                    </tr>

                    {{-- workshop manager --}}
                    <tr class="bg-gray-200 py-2">
                        <td class="w-1/6">8</td>
                        <td class="w-2/6">Waden/Matron</td>
                        <td class="w-2/6">

                        </td>
                        <td class="w-1/6">
                            Approved
                        </td>
                    </tr>
                    {{-- workshop manager --}}
                    <tr class="bg-gray-200 py-2">
                        <td class="w-1/6">9</td>
                        <td class="w-2/6">Registrar</td>
                        <td class="w-2/6">

                        </td>
                        <td class="w-1/6">
                            Approved
                        </td>
                    </tr>
                    {{-- workshop manager --}}
                    <tr class="bg-gray-200 py-2">
                        <td class="w-1/6">10</td>
                        <td class="w-2/6">Bursar</td>
                        <td class="w-2/6">

                        </td>
                        <td class="w-1/6">
                            Approved
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="width: 800px; margin: 2em auto; display: flex; justify-content: space-between">
            <div>
                <div>.....................</div>
                Signature
            </div>
            <img src="{{asset('img/stamp.jpg')}}" width="200" />
            <div>
                <div>.....................</div>
                Date
            </div>
        </div>

    </div>
</body>

</html>