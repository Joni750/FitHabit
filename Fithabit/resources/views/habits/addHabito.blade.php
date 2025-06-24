
{{-- <link rel="stylesheet" href="{{asset("css/habitos.css")}}"> --}}
<link rel="stylesheet" href="{{asset("css/addHabit.css")}}">

<section id="habitList" class="bgHabitoBody text-light ">
    <div class="d-flex justify-content-around align-items-center">

        <div class="text-light">
                <h1 class="text-center my-3">
                    {{__('habit.title2')}}
                </h1>
        </div>
        <div class="text-light h-2 fw-bolder">
            <span id ="equis" onclick="cerrarHabito()" class="click">X</span>
        </div>

    </div>

    @foreach ($habits as $habit)

    <!-- meter un nuevo habito -->
    <div class="bgHabito my-4 rounded-4 shadow-lg rounded ">
        <div class="d-flex align-items-center justify-content-between p-3">
            <div class="w-25">
                <img src="{{asset($habit->image)}}" alt="">
            </div>
            <div class="w-75 d-flex align-items-center justify-content-between">
                <p class="habitParrafo">{{$habit->name}}</p>

                <input type="hidden" name="id_habit" value="{{ $habit->id }}">
                {{-- para la validacion de si esta o no el habito en la bd, podemos agarrar de la sesion
                    el habito o hacer una verificacion en el controller --}}
                <button onclick="eleccion('{{$habit->name}}')" type="submit" class="plus mx-2">&#x2B;</button>
                {{-- </form> --}}
            </div>

        </div>
    </div>
    @endforeach
    </section>
    <script>

        const eleccion = (name) => {
            //

            /*
            Casos del Switch:
                - Beber agua -> BEBER AGUA
                - Lavarse los dientes -> LAVARSE LOS DIENTES
                - Hacer ejercicio -> HACER EJERCICIO
                - Leer -> LEER
                - Dormir -> DORMIR
                - Ducharse -> DUCHARSE
                - Comer -> COMER
                - Estudiar -> ESTUDIAR
                - Trabajar -> TRABAJAR
                - Descansar -> DESCANSAR
                - Limpiar -> LIMPIAR
            */
            switch (name) {
// ========================================== CASOS EN ESPAÑOL ========================================== ✔

                case "BEBER AGUA":
                Swal.fire({
                title: "Beber agua",
                text: "¿Cuantos litros de agua quieres beber al día?",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "¡Su hábito ha sido añadido!",
            text: "¡Puedes probar con los demás hábitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;


/*======================================================================================================================== ✔*/
case "LAVARSE LOS DIENTES":
                Swal.fire({
                title: "Lavarse los dientes",
                text: "¿Cuántas veces te lavas los dientes al día?",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[1].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);

                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "¡Su hábito ha sido añadido!",
            text: "¡Puedes probar con los demás hábitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
            }
});


                    break;


/*======================================================================================================================== ✔*/
case "HACER EJERCICIO":
                Swal.fire({
                title: "Hacer ejercicio",
                text: "¿Cuántos minutos al día quieres hacer ejercicio?",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "120",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[2].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "¡Su hábito ha sido añadido!",
            text: "¡Puedes probar con los demás hábitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;


/*======================================================================================================================== ✔*/
case "LEER":
                Swal.fire({
                title: "Leer",
                text: "¿Cuántas páginas quieres leer por día?",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "60",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[3].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "¡Su hábito ha sido añadido!",
            text: "¡Puedes probar con los demás hábitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;


/*======================================================================================================================== ✔*/
case "DORMIR":
                Swal.fire({
                title: "Dormir",
                text: "¿Cuántas horas quieres dormir al día?",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "15",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[4].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "¡Su hábito ha sido añadido!",
            text: "¡Puedes probar con los demás hábitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;


/*======================================================================================================================== ✔*/
case "DUCHARSE":
                Swal.fire({
                title: "Ducharse",
                text: "¿Cuántas veces te quieres duchar al día? (sé responsable con el agua gastada :))",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[5].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "¡Su hábito ha sido añadido!",
            text: "¡Puedes probar con los demás hábitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;


/*========================================================================================================================*/
/*======================================================================================================================== ✔*/
case "COMER":
                Swal.fire({
                title: "Comer",
                text: "¿Cuántas comidas quieres hacer al día?",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[6].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "¡Su hábito ha sido añadido!",
            text: "¡Puedes probar con los demás hábitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;


/*========================================================================================================================*/
/*======================================================================================================================== ✔*/
case "ESTUDIAR":
                Swal.fire({
                title: "Estudiar",
                text: "¿Cuántos minutos al día gustaría estudiar?",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "180",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[7].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "¡Su hábito ha sido añadido!",
            text: "¡Puedes probar con los demás hábitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;


/*========================================================================================================================*/
/*======================================================================================================================== ✔*/
case "TRABAJAR":
                Swal.fire({
                title: "Trabajar",
                text: "¿Cuántas horas quieres trabajar al día?",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[8].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "¡Su hábito ha sido añadido!",
            text: "¡Puedes probar con los demás hábitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;


/*========================================================================================================================*/
/*======================================================================================================================== ✔*/
case "DESCANSAR":
                Swal.fire({
                title: "Descansar",
                text: "¿Cuántos minutos te gustaría descansar al día?",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "120",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[9].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "¡Su hábito ha sido añadido!",
            text: "¡Puedes probar con los demás hábitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;


/*========================================================================================================================*/
/*======================================================================================================================== ✔*/
case "LIMPIAR":
                Swal.fire({
                title: "Limpiar",
                text: "¿Cuántas veces quieres limpiar al día?",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "25",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[10].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Su habito ha sido añadido!",
            text: "¡Puedes probar con los demas habitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;

                    case "LAVARSE LAS MANOS":
                Swal.fire({
                title: "Lavarse las manos",
                text: "¿Cuántas veces al día quieres lavarte las manos?",
                input: "range",
                confirmButtonText: "Aceptar",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[10].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Su habito ha sido añadido!",
            text: "¡Puedes probar con los demas habitos que te ofrecemos :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Aceptar",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;

// ========================================== FIN DE LOS CASOS EN ESPAÑOL ==========================================



// ========================================== CASOS EN INGLES ==========================================✔

case "DRINK WATER":
                Swal.fire({
                title: "Drink water :)",
                text: "How many liters of water do you want to drink per day?",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error -> ",error);
                    }
                });
            Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;


/*======================================================================================================================== ✔*/
case "BRUSH YOUR TEETH":
                Swal.fire({
                title: "Brush your teeth",
                text: "How often do you want to brush your teeth per day?",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[1].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;


/*======================================================================================================================== ✔*/
case "DO EXERCISE":
                Swal.fire({
                title: "Do exercise",
                text: "How many minutes you want to do exercise per day??",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "120",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[2].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;


/*========================================================================================================================✔ */
case "READ":
                Swal.fire({
                title: "Read",
                text: "How many pages you desire to read per day?",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "60",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[3].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;


/*======================================================================================================================== ✔*/
case "SLEEP":
                Swal.fire({
                title: "Sleep",
                text: "How many hours you want to sleep per day?",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "15",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[4].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                       },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;


/*======================================================================================================================== ✔*/
case "TAKE A SHOWER":
                Swal.fire({
                title: "Take a shower",
                text: "How often you want to take a shower per day? ( be responsable with the water that you spend :) )",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[5].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;


/*========================================================================================================================*/
/*======================================================================================================================== ✔*/
case "EAT":
                Swal.fire({
                title: "Eat",
                text: "How many times you want to eat per day?",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[6].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;


/*========================================================================================================================*/
/*======================================================================================================================== ✔*/
case "STUDY":
                Swal.fire({
                title: "Study",
                text: "How many minutes you want to invest studying per day?",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "180",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[7].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;


/*========================================================================================================================*/
/*======================================================================================================================== ✔*/
case "WORK":
                Swal.fire({
                title: "Work",
                text: "How many hours you want to invest working per day?",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[8].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;


/*========================================================================================================================*/
/*======================================================================================================================== ✔*/
case "REST":
                Swal.fire({
                title: "Rest",
                text: "How many minutes you want to spend resting per day?",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "120",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[9].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        // location.reload();
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;


/*========================================================================================================================*/
/*======================================================================================================================== ✔*/
case "CLEAN":
                Swal.fire({
                title: "Clean",
                text: "How many times you want to clean per day?",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "25",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[10].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;

                    case "WASH YOUR HANDS":
                Swal.fire({
                title: "Wash your hands",
                text: "How many times a day do you want to clean your hands?",
                input: "range",
                confirmButtonText: "Accept",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[10].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
                Swal.fire({
            title: "Your habit was added succesfully!",
            text: "You can try our other habits :)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Accept",
            })
            .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
            });
    }
});


                    break;

// ========================================== FIN DE LOS CASOS EN INGLES ==========================================



// ========================================== CASOS EN EUSKERA ==========================================

case "URA EDAN":
                Swal.fire({
                title: "Ura edan",
                text: "Zenbat litro ur edango duzu egunean?",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;
                    case "HORTZAK GARBITZEA":
                Swal.fire({
                title: "Hortzak garbitzea",
                text: "Egunean zenbat aldiz garbitzen dituzu hortzak?",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;
                    case "KIROL EGITEA":
                Swal.fire({
                title: "Kirol egitea",
                text: "Zenbat ariketa minutu egin nahi duzu egunean?",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "120",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;
                    case "IRAKURRI":
                Swal.fire({
                title: "Irakurri",
                text: "Zenbat orri irakurri nahi dituzu egunean?",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "60",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;

                    case "LO EGIN":
                Swal.fire({
                title: "Lo egin",
                text: "Zenbat ordu lo egin nahi duzu egunean?",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "15",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;

                    case "DUTXA HARTZEA":
                Swal.fire({
                title: "Dutxa hartzea",
                text: "Zenbat aldiz dutxatu nahi duzu egunean? Gastatutako uraz arduratu:)",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;

                    case "JATEA":
                Swal.fire({
                title: "Jatea",
                text: "Zenbat otordu egin nahi dituzu egunean?",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;

                    case "IKASI":
                Swal.fire({
                title: "Ikasi",
                text: "Zenbat minutu gustatuko litzaizuke egunean ikastea?",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "180",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;

                    case "LAN EGIN":
                Swal.fire({
                title: "Lan egin",
                text: "Zenbat ordu lan egin behar duzu egunean?",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;

                    case "ATSEDEN HARTZEA":
                Swal.fire({
                title: "Atseden hartzea",
                text: "Zenbat minutu gustatuko litzaizuke egunean atseden hartzea?",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "120",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;

                    case "GARBITU":
                Swal.fire({
                title: "Garbitu",
                text: "Zenbat aldiz garbitu nahi duzu egunean?",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "25",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;

                    case "ESKUAK GARBITU":
                Swal.fire({
                title: "Eskuak garbitu",
                text: "Zenbat aldiz garbitu nahi dituzu eskuak egunean?",
                input: "range",
                confirmButtonText: "Onartu",
                showConfirmButton: true,
                 inputAttributes: {
                    min: "1",
                    max: "10",
                    step: "1",
                },
                inputValue: "8",
                customClass: {
                input: 'divInput',
                }}
                )
                .then((result) => {
                if (result.isConfirmed) {
                    //agarrar la cantidad y el id del habito y pasarlo a el controlador de los habitos
                 //id del habito
                 let id_agua = document.getElementsByName("id_habit")[0].value;
                // cantidad / numero de veces / repeticiones / horas...
                let cantidad = document.querySelector("input[type = 'range']").value;

                //comprobacion
                console.log("ID Habito ->", id_agua);
                console.log( "CantidadValue ->", cantidad);
                $.ajax({
                    type: "POST",
                    url: "{{ route('add.habit') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id_habit: id_agua,
                        quantity: cantidad,
                    },
                    dataType: "json",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                    },
                    error: function(error){
                        console.log("error-> ",error);
                    }
                });
            Swal.fire({
            title: "Zure etxaldea gehitu da!",
            text: "Eskaintzen dizkizugun gainerako bizipenekin proba dezakezu:)!",
            icon: "success",
            showConfirmButton: true,
            confirmButtonText : "Onartu",
        })
                .then((responseConfirm) =>{
                    if(responseConfirm.isConfirmed){
                    location.reload();
                    }
                });
    }
});


                    break;
// ========================================== FIN DE LOS CASOS EN EUSKERA ==========================================


/*========================================================================================================================*/

                default:
                Swal.fire({
                title: "Introduce un valor",
                text: "ªªªª? 😁",
                input: "range",
                inputAttributes: {
                    min: "0",
                    max: "15",
                    step: "1",

                }
            });

                    break;


            }
        }

            </script>

